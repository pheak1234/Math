<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramPaymentService
{
    /**
     * Send order notification with interactive confirmation buttons to Admin Telegram
     */
    public function sendAdminOrderNotification(Order $order): void
    {
        $telegramToken = env('TELEGRAM_BOT_TOKEN');
        $telegramChatId = env('TELEGRAM_CHAT_ID');

        if (! $telegramToken || ! $telegramChatId) {
            Log::warning('Telegram token or chat ID not set for admin order notification');

            return;
        }

        $itemTitle = $order->book ? $order->book->title : ($order->teachingMaterial ? $order->teachingMaterial->name : 'ទំនិញ');
        $itemType = $order->book_id ? '📖 សៀវភៅ (Book)' : '📦 សម្ភារៈឧបទេស (Teaching Material)';
        $paymentMethod = $order->payment_method === 'khqr' ? 'KHQR (ស្កេនទូទាត់)' : 'បង់ប្រាក់ពេលទទួល (COD)';

        $message = "🛒 *ការបញ្ជាទិញថ្មីរង់ចាំការយល់ព្រម (New Order #{$order->order_code})*\n\n";
        $message .= "🔖 *លេខកូដវិក្កយបត្រ:* `{$order->order_code}`\n";
        $message .= "📂 *ប្រភេទ:* {$itemType}\n";
        $message .= "🛍️ *ទំនិញ/ចំណងជើង:* {$itemTitle}\n";
        $message .= "👤 *អតិថិជន:* {$order->customer_name}\n";
        $message .= "📞 *លេខទូរស័ព្ទ:* `{$order->customer_phone}`\n";
        if ($order->customer_address) {
            $message .= "📍 *អាសយដ្ឋាន:* {$order->customer_address}\n";
        }
        $message .= "🔢 *ចំនួន:* {$order->quantity}\n";
        $message .= '💰 *ទឹកប្រាក់:* $'.number_format($order->total_price, 2)."\n";
        $message .= "💳 *វិធីសាស្ត្រ:* {$paymentMethod}\n";
        if ($order->notes) {
            $message .= "📝 *ចំណាំ:* {$order->notes}\n";
        }
        $message .= "\n👇 *សូមចុចប៊ូតុងខាងក្រោមដើម្បីបញ្ជាក់ ឬបដិសេធ៖*";

        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => '✅ យល់ព្រម (Confirm / Approve)', 'callback_data' => 'approve_order:'.$order->order_code],
                    ['text' => '❌ បដិសេធ (Reject)', 'callback_data' => 'reject_order:'.$order->order_code],
                ],
            ],
        ];

        try {
            $receiptPath = $order->payment_receipt ? storage_path('app/public/'.$order->payment_receipt) : null;

            if ($receiptPath && file_exists($receiptPath)) {
                Http::attach('photo', file_get_contents($receiptPath), basename($receiptPath))
                    ->post("https://api.telegram.org/bot{$telegramToken}/sendPhoto", [
                        'chat_id' => $telegramChatId,
                        'caption' => $message,
                        'parse_mode' => 'Markdown',
                        'reply_markup' => json_encode($keyboard),
                    ]);
            } else {
                Http::post("https://api.telegram.org/bot{$telegramToken}/sendMessage", [
                    'chat_id' => $telegramChatId,
                    'text' => $message,
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode($keyboard),
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('Error sending Telegram admin order notification: '.$e->getMessage());
        }
    }

    /**
     * Process Callback Query from Telegram Inline Buttons
     */
    public function processCallbackQuery(array $callbackQuery): array
    {
        $callbackId = $callbackQuery['id'] ?? null;
        $data = $callbackQuery['data'] ?? '';
        $from = $callbackQuery['from'] ?? [];
        $adminName = $from['first_name'] ?? 'Admin';
        $msg = $callbackQuery['message'] ?? null;
        $chatId = $msg['chat']['id'] ?? null;
        $messageId = $msg['message_id'] ?? null;

        Log::info('Processing Telegram Callback Query:', ['data' => $data, 'admin' => $adminName]);

        if (str_starts_with($data, 'approve_order:')) {
            $orderCode = substr($data, strlen('approve_order:'));
            $order = Order::where('order_code', $orderCode)->first();

            if (! $order) {
                $this->answerCallbackQuery($callbackId, "❌ រកមិនឃើញ Order #{$orderCode}");

                return ['status' => 'not_found'];
            }

            if ($order->status === 'completed') {
                $this->answerCallbackQuery($callbackId, "ℹ️ Order #{$orderCode} ត្រូវបានយល់ព្រមរួចរាល់ហើយ!");

                return ['status' => 'already_completed'];
            }

            $order->status = 'completed';
            $order->notes = trim(($order->notes ? $order->notes."\n" : '')."Approved by {$adminName} on ".now());
            $order->save();

            // Grant book reading access
            if ($order->book_id && $order->user_id) {
                $user = User::find($order->user_id);
                if ($user) {
                    $user->books()->syncWithoutDetaching([
                        $order->book_id => [
                            'status' => 'reading',
                            'progress' => 0,
                        ],
                    ]);
                }
            }

            $this->answerCallbackQuery($callbackId, "✅ បានយល់ព្រមលើការបញ្ជាទិញ #{$orderCode} រួចរាល់!");

            $originalText = $msg['caption'] ?? ($msg['text'] ?? '');
            $itemTitle = $order->book ? $order->book->title : ($order->teachingMaterial ? $order->teachingMaterial->name : 'ទំនិញ');
            $updatedText = "✅ *ការបញ្ជាទិញ #{$order->order_code} ត្រូវបានយល់ព្រម (Approved)*\n\n";
            $updatedText .= "📦 *ទំនិញ/សៀវភៅ:* {$itemTitle}\n";
            $updatedText .= "👤 *អតិថិជន:* {$order->customer_name}\n";
            $updatedText .= "📞 *លេខទូរស័ព្ទ:* {$order->customer_phone}\n";
            $updatedText .= '💰 *ទឹកប្រាក់:* $'.number_format($order->total_price, 2)."\n";
            $updatedText .= "👮 *អនុម័តដោយ:* {$adminName}\n";
            $updatedText .= '⏰ *កាលបរិច្ឆេទ:* '.now()->format('d M, h:i A')."\n\n";
            $updatedText .= '✨ *សិទ្ធិអានសៀវភៅត្រូវបានបើកជូនអតិថិជនរួចរាល់ក្នុងបណ្ណាល័យ!*';

            if (isset($msg['photo'])) {
                $this->editMessageCaption($chatId, $messageId, $updatedText);
            } else {
                $this->editMessageText($chatId, $messageId, $updatedText);
            }

            return ['status' => 'approved', 'order_code' => $orderCode];
        }

        if (str_starts_with($data, 'reject_order:')) {
            $orderCode = substr($data, strlen('reject_order:'));
            $order = Order::where('order_code', $orderCode)->first();

            if (! $order) {
                $this->answerCallbackQuery($callbackId, "❌ រកមិនឃើញ Order #{$orderCode}");

                return ['status' => 'not_found'];
            }

            $order->status = 'cancelled';
            $order->notes = trim(($order->notes ? $order->notes."\n" : '')."Rejected by {$adminName} on ".now());
            $order->save();

            $this->answerCallbackQuery($callbackId, "❌ បានបដិសេធការបញ្ជាទិញ #{$orderCode}!");

            $itemTitle = $order->book ? $order->book->title : ($order->teachingMaterial ? $order->teachingMaterial->name : 'ទំនិញ');
            $updatedText = "❌ *ការបញ្ជាទិញ #{$order->order_code} ត្រូវបានបដិសេធ (Rejected)*\n\n";
            $updatedText .= "📦 *ទំនិញ/សៀវភៅ:* {$itemTitle}\n";
            $updatedText .= "👤 *អតិថិជន:* {$order->customer_name}\n";
            $updatedText .= '💰 *ទឹកប្រាក់:* $'.number_format($order->total_price, 2)."\n";
            $updatedText .= "👮 *បដិសេធដោយ:* {$adminName}\n";
            $updatedText .= '⏰ *កាលបរិច្ឆេទ:* '.now()->format('d M, h:i A');

            if (isset($msg['photo'])) {
                $this->editMessageCaption($chatId, $messageId, $updatedText);
            } else {
                $this->editMessageText($chatId, $messageId, $updatedText);
            }

            return ['status' => 'rejected', 'order_code' => $orderCode];
        }

        return ['status' => 'ignored'];
    }

    /**
     * Process an incoming text message from Telegram (either via Webhook or Polling)
     */
    public function processMessage(string $text, $chatId = null, $messageId = null): array
    {
        Log::info('Processing Telegram message:', ['text' => $text, 'chat_id' => $chatId]);

        // 1. Check for manual/bill reference format:
        // Example: BK12345, #BK12345, TM12345, #TM-12345, /approve BK12345
        if (preg_match('/(?:confirm|approve|\/approve)?\s*(BK|TM)[-_ ]?(\d{5})/i', $text, $codeMatches)) {
            $orderCode = strtoupper($codeMatches[1].$codeMatches[2]);

            return $this->handleOrderCode($orderCode, $chatId, $messageId);
        }

        // 2. Check for ABA PayWay notification format:
        if (preg_match('/\$([0-9]+(?:\.[0-9]+)?)\s+paid by\s+([\s\S]+?)\s+on\s+[\s\S]+?Trx\.?\s*ID:\s*([0-9]+)/i', $text, $abaMatches)) {
            $amount = (float) $abaMatches[1];
            $payer = trim($abaMatches[2]);
            $trxId = trim($abaMatches[3]);

            $apv = null;
            if (preg_match('/APV:\s*([0-9]+)/i', $text, $apvMatches)) {
                $apv = trim($apvMatches[1]);
            }

            return $this->handleAbaPayment($amount, $trxId, $payer, $apv, $chatId, $messageId);
        }

        return ['status' => 'ignored', 'reason' => 'No recognized pattern in message'];
    }

    /**
     * Handle automated ABA PayWay notification
     */
    protected function handleAbaPayment(float $amount, string $trxId, string $payer, ?string $apv, $chatId, $messageId): array
    {
        $existingOrder = Order::where('notes', 'like', "%Trx. ID: {$trxId}%")->first();
        if ($existingOrder) {
            if ($chatId) {
                $this->sendMessage($chatId, "ℹ️ ប្រតិបត្តិការ Trx. ID: `{$trxId}` ត្រូវបានបញ្ជាក់រួចរាល់ហើយពីមុន សម្រាប់វិក្កយបត្រ #{$existingOrder->order_code}។", $messageId);
            }

            return ['status' => 'already_processed', 'order_code' => $existingOrder->order_code];
        }

        $order = Order::where('status', 'pending')
            ->where('total_price', $amount)
            ->where('created_at', '>=', now()->subMinutes(60))
            ->latest()
            ->first();

        if (! $order) {
            $order = Order::where('status', 'pending')
                ->where('total_price', $amount)
                ->latest()
                ->first();
        }

        if (! $order) {
            if ($chatId) {
                $msg = '⚠️ *ទទួលបានការទូទាត់ពី ABA PayWay* 💰 $'.number_format($amount, 2)."\n";
                $msg .= "👤 ពី: {$payer}\n";
                $msg .= "🧾 Trx. ID: `{$trxId}`".($apv ? " (APV: {$apv})" : '')."\n\n";
                $msg .= '_ប៉ុន្តែមិនមានការបញ្ជាទិញ Pending ដែលត្រូវគ្នានឹងទឹកប្រាក់នេះទេក្នុងប្រព័ន្ធ។_';
                $this->sendMessage($chatId, $msg, $messageId);
            }

            return ['status' => 'no_matching_order', 'amount' => $amount, 'trx_id' => $trxId];
        }

        $this->completeOrder($order, $trxId, $apv, $payer);

        $itemTitle = $order->book ? $order->book->title : ($order->teachingMaterial ? $order->teachingMaterial->name : 'ទំនិញ');
        $reply = "🎉 *ការទូទាត់ ABA ត្រូវបានបញ្ជាក់ដោយស្វ័យប្រវត្តិ! (Auto Confirmed)*\n\n";
        $reply .= "🔖 *លេខកូដវិក្កយបត្រ:* #{$order->order_code}\n";
        $reply .= "📦 *ទំនិញ/សៀវភៅ:* {$itemTitle}\n";
        $reply .= "👤 *អតិថិជន:* {$order->customer_name}\n";
        $reply .= "💳 *អ្នកបង់ (ABA):* {$payer}\n";
        $reply .= '💰 *ទឹកប្រាក់:* $'.number_format($amount, 2)."\n";
        $reply .= "🧾 *Trx. ID:* `{$trxId}`".($apv ? " (APV: {$apv})" : '')."\n\n";

        if ($order->book_id) {
            $reply .= '✨ *សិទ្ធិអានសៀវភៅត្រូវបានបើកជូនអតិថិជនរួចរាល់ក្នុងបណ្ណាល័យ (Book Access Granted)!*';
        } else {
            $reply .= '✨ *ការបញ្ជាទិញត្រូវបានផ្លាស់ប្តូរទៅជា Completed រួចរាល់!*';
        }

        if ($chatId) {
            $this->sendMessage($chatId, $reply, $messageId);
        }

        return ['status' => 'success', 'order_code' => $order->order_code, 'trx_id' => $trxId];
    }

    /**
     * Handle manual order code reference
     */
    protected function handleOrderCode(string $orderCode, $chatId, $messageId): array
    {
        $order = Order::where('order_code', $orderCode)->first();
        if (! $order) {
            return ['status' => 'not_found', 'order_code' => $orderCode];
        }

        if ($order->status === 'completed') {
            if ($chatId) {
                $this->sendMessage($chatId, "ℹ️ ការបញ្ជាទិញ #{$orderCode} ត្រូវបានបញ្ជាក់រួចរាល់ហើយពីមុន។", $messageId);
            }

            return ['status' => 'already_completed', 'order_code' => $orderCode];
        }

        $this->completeOrder($order, 'MANUAL-REF', null, 'Admin / Customer Reference');

        $itemTitle = $order->book ? $order->book->title : ($order->teachingMaterial ? $order->teachingMaterial->name : 'ទំនិញ');
        $reply = "🎉 *ការទូទាត់ត្រូវបានបញ្ជាក់ដោយជោគជ័យ!*\n\n";
        $reply .= "🔖 *លេខកូដវិក្កយបត្រ:* #{$order->order_code}\n";
        $reply .= "📦 *ទំនិញ/សៀវភៅ:* {$itemTitle}\n";
        $reply .= "👤 *អតិថិជន:* {$order->customer_name}\n";
        $reply .= '💰 *ទឹកប្រាក់:* $'.number_format($order->total_price, 2)."\n\n";

        if ($order->book_id) {
            $reply .= '✨ *សិទ្ធិអានសៀវភៅត្រូវបានបើកជូនអតិថិជនរួចរាល់ក្នុងបណ្ណាល័យ (Book Access Granted)!*';
        } else {
            $reply .= '✨ *ការបញ្ជាទិញត្រូវបានផ្លាស់ប្តូរទៅជា Completed រួចរាល់!*';
        }

        if ($chatId) {
            $this->sendMessage($chatId, $reply, $messageId);
        }

        return ['status' => 'success', 'order_code' => $orderCode];
    }

    /**
     * Complete order and grant access
     */
    protected function completeOrder(Order $order, string $trxId, ?string $apv, string $payer): void
    {
        $order->status = 'completed';
        $note = "Payment Verified. Ref: {$trxId}".($apv ? ", APV: {$apv}" : '').", By: {$payer}";
        $order->notes = trim(($order->notes ? $order->notes."\n" : '').$note);
        $order->save();

        if ($order->book_id && $order->user_id) {
            $user = User::find($order->user_id);
            if ($user) {
                $user->books()->syncWithoutDetaching([
                    $order->book_id => [
                        'status' => 'reading',
                        'progress' => 0,
                    ],
                ]);
            }
        }
    }

    /**
     * Answer callback query
     */
    public function answerCallbackQuery($callbackQueryId, string $text): void
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        if (! $token || ! $callbackQueryId) {
            return;
        }

        try {
            Http::post("https://api.telegram.org/bot{$token}/answerCallbackQuery", [
                'callback_query_id' => $callbackQueryId,
                'text' => $text,
                'show_alert' => true,
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to answer Telegram callback query: '.$e->getMessage());
        }
    }

    /**
     * Edit message text (and remove keyboard)
     */
    public function editMessageText($chatId, $messageId, string $text): void
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        if (! $token || ! $chatId || ! $messageId) {
            return;
        }

        try {
            Http::post("https://api.telegram.org/bot{$token}/editMessageText", [
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'text' => $text,
                'parse_mode' => 'Markdown',
                'reply_markup' => json_encode(['inline_keyboard' => []]),
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to edit Telegram message text: '.$e->getMessage());
        }
    }

    /**
     * Edit message caption (and remove keyboard)
     */
    public function editMessageCaption($chatId, $messageId, string $caption): void
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        if (! $token || ! $chatId || ! $messageId) {
            return;
        }

        try {
            Http::post("https://api.telegram.org/bot{$token}/editMessageCaption", [
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'caption' => $caption,
                'parse_mode' => 'Markdown',
                'reply_markup' => json_encode(['inline_keyboard' => []]),
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to edit Telegram message caption: '.$e->getMessage());
        }
    }

    /**
     * Send message via Telegram Bot API
     */
    public function sendMessage($chatId, string $text, $replyToMessageId = null): void
    {
        $telegramToken = env('TELEGRAM_BOT_TOKEN');
        if (! $telegramToken || ! $chatId) {
            return;
        }

        $payload = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'Markdown',
        ];

        if ($replyToMessageId) {
            $payload['reply_to_message_id'] = $replyToMessageId;
        }

        try {
            Http::post("https://api.telegram.org/bot{$telegramToken}/sendMessage", $payload);
        } catch (\Throwable $e) {
            Log::error('Failed to send Telegram message:', ['error' => $e->getMessage()]);
        }
    }
}
