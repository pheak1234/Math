<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\TeachingMaterial;
use App\Models\User;
use App\Services\TelegramPaymentService;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request, TeachingMaterial $material)
    {
        $validated = $request->validate([
            'order_code' => 'nullable|string|max:50',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'customer_address' => 'nullable|string|max:500',
            'quantity' => 'required|integer|min:1|max:100',
            'notes' => 'nullable|string|max:1000',
            'payment_method' => 'required|string|in:khqr,cod',
            'payment_receipt' => 'nullable|image|max:5120', // Max 5MB
        ]);

        $receiptPath = null;
        if ($request->hasFile('payment_receipt')) {
            $receiptPath = $request->file('payment_receipt')->store('receipts', 'public');
        }

        $order = new Order;
        $order->order_code = $validated['order_code'] ?? ('TM'.rand(10000, 99999));
        $order->teaching_material_id = $material->id;
        $order->user_id = Auth::id(); // Nullable, fine if guest
        $order->customer_name = $validated['customer_name'];
        $order->customer_phone = $validated['customer_phone'];
        $order->customer_address = $validated['customer_address'] ?? null;
        $order->quantity = $validated['quantity'];
        $order->total_price = ($material->price ?? 0) * $validated['quantity'];
        $order->payment_method = $validated['payment_method'];
        $order->payment_receipt = $receiptPath;
        $order->notes = $validated['notes'] ?? null;
        $order->status = 'pending';

        $order->save();

        // 1. Send Filament Database Notification to all admins
        $admins = User::where('is_admin', true)->get();
        Notification::make()
            ->title("ការបញ្ជាទិញថ្មី (#{$order->order_code})")
            ->body("អតិថិជន: {$order->customer_name} បានកម្ម៉ង់ទិញ {$material->name}")
            ->success()
            ->sendToDatabase($admins);

        // 2. Send Interactive Telegram Notification to Admin
        app(TelegramPaymentService::class)->sendAdminOrderNotification($order);

        return redirect()->back()->with('order_success', 'ការបញ្ជាទិញរបស់អ្នកត្រូវបានទទួលជោគជ័យ! យើងនឹងទាក់ទងទៅអ្នកក្នុងពេលឆាប់ៗនេះ។');
    }

    public function initGroupOrder(Request $request)
    {
        $cartItems = $request->input('cart_items', '[]');
        $items = is_string($cartItems) ? json_decode($cartItems, true) : $cartItems;

        if (! is_array($items) || empty($items)) {
            return response()->json(['success' => false, 'message' => 'Cart is empty'], 422);
        }

        $totalQuantity = 0;
        $calculatedTotal = 0;
        $summaryLines = [];
        $firstMaterialId = null;

        foreach ($items as $item) {
            $tmId = $item['id'] ?? null;
            $tm = $tmId ? TeachingMaterial::find($tmId) : null;
            $qty = max(1, (int) ($item['quantity'] ?? 1));
            $price = $tm && $tm->price > 0 ? (float) $tm->price : (float) ($item['price'] ?? 0);
            $name = $tm ? $tm->name : ($item['name'] ?? 'សម្ភារៈ');

            if (! $firstMaterialId && $tm) {
                $firstMaterialId = $tm->id;
            }

            $lineTotal = $price * $qty;
            $totalQuantity += $qty;
            $calculatedTotal += $lineTotal;

            $summaryLines[] = "• {$name} x {$qty} ($".number_format($lineTotal, 2).')';
        }

        $user = Auth::user();
        $orderCode = $request->input('order_code');
        $order = null;

        if (! empty($orderCode)) {
            $order = Order::where('order_code', $orderCode)->first();
        }

        if (! $order) {
            $order = new Order;
            $order->order_code = $orderCode ?: ('TM'.rand(10000, 99999));
        }

        $order->teaching_material_id = $firstMaterialId;
        $order->user_id = $user ? $user->id : null;
        $order->customer_name = $user ? $user->name : ($request->input('customer_name') ?: 'ភ្ញៀវ');
        $order->customer_phone = $user ? ($user->phone ?? '012345678') : ($request->input('customer_phone') ?: '012345678');
        $order->quantity = $totalQuantity;
        $order->total_price = max(0.01, $calculatedTotal);
        $order->payment_method = 'khqr';
        $order->notes = '📦 សម្ភារៈបង្រៀន (Group Order '.count($items)." មុខ):\n".implode("\n", $summaryLines);
        $order->status = 'pending';
        $order->save();

        return response()->json([
            'success' => true,
            'order_code' => $order->order_code,
            'total_price' => (float) $order->total_price,
        ]);
    }

    public function storeGroupOrder(Request $request)
    {
        $validated = $request->validate([
            'order_code' => 'nullable|string|max:50',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'customer_address' => 'nullable|string|max:500',
            'notes' => 'nullable|string|max:1000',
            'payment_method' => 'required|string|in:khqr,cod',
            'payment_receipt' => 'nullable|image|max:5120',
            'cart_items' => 'required|string',
        ]);

        $items = json_decode($validated['cart_items'], true);
        if (! is_array($items) || empty($items)) {
            return redirect()->back()->with('error', 'កន្ត្រកទំនិញទទេ មិនអាចបញ្ជាទិញបានទេ។');
        }

        $receiptPath = null;
        if ($request->hasFile('payment_receipt')) {
            $receiptPath = $request->file('payment_receipt')->store('receipts', 'public');
        }

        $totalQuantity = 0;
        $calculatedTotal = 0;
        $summaryLines = [];
        $firstMaterialId = null;

        foreach ($items as $item) {
            $tmId = $item['id'] ?? null;
            $tm = $tmId ? TeachingMaterial::find($tmId) : null;
            $qty = max(1, (int) ($item['quantity'] ?? 1));
            $price = $tm && $tm->price > 0 ? (float) $tm->price : (float) ($item['price'] ?? 0);
            $name = $tm ? $tm->name : ($item['name'] ?? 'សម្ភារៈ');

            if (! $firstMaterialId && $tm) {
                $firstMaterialId = $tm->id;
            }

            $lineTotal = $price * $qty;
            $totalQuantity += $qty;
            $calculatedTotal += $lineTotal;

            $summaryLines[] = "• {$name} x {$qty} ($".number_format($lineTotal, 2).')';
        }

        $fullNotes = '📦 សម្ភារៈបង្រៀន (Group Order '.count($items)." មុខ):\n".implode("\n", $summaryLines);
        if (! empty($validated['notes'])) {
            $fullNotes .= "\n\n📝 ចំណាំ: ".$validated['notes'];
        }

        $order = null;
        if (! empty($validated['order_code'])) {
            $order = Order::where('order_code', $validated['order_code'])->first();
        }

        if (! $order) {
            $order = new Order;
            $order->order_code = $validated['order_code'] ?? ('TM'.rand(10000, 99999));
            $order->status = 'pending';
        }

        $order->teaching_material_id = $firstMaterialId;
        $order->user_id = Auth::id();
        $order->customer_name = $validated['customer_name'];
        $order->customer_phone = $validated['customer_phone'];
        $order->customer_address = $validated['customer_address'] ?? null;
        $order->quantity = $totalQuantity;
        $order->total_price = $calculatedTotal;
        $order->payment_method = $validated['payment_method'];
        if ($receiptPath) {
            $order->payment_receipt = $receiptPath;
        }
        $order->notes = $fullNotes;
        $order->save();

        // 1. Send Filament Database Notification to all admins
        $admins = User::where('is_admin', true)->get();
        Notification::make()
            ->title("ការបញ្ជាទិញជាកញ្ចប់ថ្មី (#{$order->order_code})")
            ->body("អតិថិជន: {$order->customer_name} បានកម្ម៉ង់ទិញសម្ភារៈ ".count($items).' មុខ សរុប $'.number_format($calculatedTotal, 2))
            ->success()
            ->sendToDatabase($admins);

        // 2. Send Telegram Notification
        app(TelegramPaymentService::class)->sendAdminOrderNotification($order);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'order_code' => $order->order_code,
                'message' => 'ការបញ្ជាទិញជាកញ្ចប់របស់អ្នកត្រូវបានទទួលជោគជ័យ!',
            ]);
        }

        return redirect()->back()->with('order_success', 'ការបញ្ជាទិញជាកញ្ចប់របស់អ្នកត្រូវបានទទួលជោគជ័យ! យើងនឹងរៀបចំដឹកជញ្ជូនជូនអ្នកក្នុងពេលឆាប់ៗនេះ។');
    }

    public function initBookOrder(Request $request, Book $book)
    {
        $user = Auth::user();

        // Check if there is an existing pending order for this user and book created in the last 30 minutes
        $order = null;
        if ($user) {
            $order = Order::where('user_id', $user->id)
                ->where('book_id', $book->id)
                ->where('status', 'pending')
                ->where('created_at', '>=', now()->subMinutes(30))
                ->latest()
                ->first();
        }

        if (! $order) {
            $order = new Order;
            $order->order_code = 'BK'.rand(10000, 99999);
            $order->book_id = $book->id;
            $order->user_id = $user ? $user->id : null;
            $order->customer_name = $user ? $user->name : ($request->input('customer_name') ?: 'ភ្ញៀវ');
            $order->customer_phone = $user ? ($user->phone ?? '012345678') : ($request->input('customer_phone') ?: '012345678');
            $order->quantity = 1;
            $order->total_price = $book->price ?? 0.01;
            $order->payment_method = 'khqr';
            $order->status = 'pending';
            $order->save();
        }

        return response()->json([
            'success' => true,
            'order_code' => $order->order_code,
            'total_price' => (float) $order->total_price,
            'book_title' => $book->title,
        ]);
    }

    public function storeBookOrder(Request $request, Book $book)
    {
        $validated = $request->validate([
            'order_code' => 'nullable|string|max:50',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'payment_method' => 'required|string|in:khqr',
            'payment_receipt' => 'nullable|image|max:5120',
        ]);

        $receiptPath = null;
        if ($request->hasFile('payment_receipt')) {
            $receiptPath = $request->file('payment_receipt')->store('receipts', 'public');
        }

        $order = null;
        if (! empty($validated['order_code'])) {
            $order = Order::where('order_code', $validated['order_code'])->first();
        }

        if (! $order) {
            $order = new Order;
            $order->order_code = $validated['order_code'] ?? ('BK'.rand(10000, 99999));
            $order->book_id = $book->id;
            $order->status = 'pending';
        }

        $order->user_id = Auth::id(); // Nullable, fine if guest
        $order->customer_name = $validated['customer_name'];
        $order->customer_phone = $validated['customer_phone'];
        $order->quantity = 1;
        $order->total_price = $book->price ?? 0;
        $order->payment_method = $validated['payment_method'];
        if ($receiptPath) {
            $order->payment_receipt = $receiptPath;
        }

        $order->save();

        // 1. Send Filament Database Notification to all admins
        $admins = User::where('is_admin', true)->get();
        Notification::make()
            ->title("ការបញ្ជាទិញសៀវភៅថ្មី (#{$order->order_code})")
            ->body("អតិថិជន: {$order->customer_name} បានកម្ម៉ង់ទិញសៀវភៅ {$book->title}")
            ->success()
            ->sendToDatabase($admins);

        // 2. Send Interactive Telegram Notification with Confirm/Reject Buttons to Admin
        app(TelegramPaymentService::class)->sendAdminOrderNotification($order);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'order_code' => $order->order_code,
                'message' => 'ការបញ្ជាទិញត្រូវបានបញ្ជូនទៅ Admin រួចរាល់!',
            ]);
        }

        return redirect()->back()->with('order_success', 'ការបញ្ជាទិញរបស់អ្នកត្រូវបានទទួលជោគជ័យ! យើងនឹងទាក់ទងទៅអ្នកក្នុងពេលឆាប់ៗនេះដើម្បីបើកសិទ្ធិអាន។');
    }
}
