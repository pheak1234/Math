<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderStatusNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_notify_user_stores_database_notification_for_approved_order(): void
    {
        $user = User::factory()->create([
            'phone' => '012345678',
        ]);

        $book = Book::create([
            'title' => 'គណិតវិទ្យាថ្នាក់ទី១២',
            'slug' => 'math-grade-12',
            'author' => 'Mr. Math',
            'price' => 15.00,
            'is_published' => true,
        ]);

        $order = Order::create([
            'order_code' => 'ORD-5555',
            'user_id' => $user->id,
            'book_id' => $book->id,
            'customer_name' => $user->name,
            'customer_phone' => '012345678',
            'customer_address' => 'Phnom Penh',
            'quantity' => 1,
            'total_price' => 15.00,
            'payment_method' => 'aba_khqr',
            'status' => 'completed',
        ]);

        $order->notifyUser('approved');

        $this->assertEquals(1, $user->notifications()->count());
        $notification = $user->notifications()->first();
        $this->assertEquals('approved', $notification->data['type']);
        $this->assertStringContainsString('ORD-5555', $notification->data['title']);
        $this->assertStringContainsString('គណិតវិទ្យាថ្នាក់ទី១២', $notification->data['body']);
    }

    public function test_order_notify_user_stores_database_notification_for_rejected_order_with_reason(): void
    {
        $user = User::factory()->create([
            'phone' => '099887766',
        ]);

        $order = Order::create([
            'order_code' => 'ORD-7777',
            'user_id' => null,
            'customer_name' => 'Guest User',
            'customer_phone' => '099887766',
            'customer_address' => 'Siem Reap',
            'quantity' => 1,
            'total_price' => 10.00,
            'payment_method' => 'aba_khqr',
            'status' => 'cancelled',
        ]);

        $order->notifyUser('rejected', 'បង្កាន់ដៃមិនត្រឹមត្រូវ');

        $user->refresh();
        $this->assertEquals(1, $user->notifications()->count());
        $notification = $user->notifications()->first();
        $this->assertEquals('rejected', $notification->data['type']);
        $this->assertStringContainsString('ORD-7777', $notification->data['title']);
        $this->assertStringContainsString('បង្កាន់ដៃមិនត្រឹមត្រូវ', $notification->data['body']);
    }

    public function test_user_can_fetch_notifications_via_api(): void
    {
        $user = User::factory()->create();

        $book = Book::create([
            'title' => 'សៀវភៅលំហាត់',
            'slug' => 'exercise-book',
            'author' => 'Mr. Math',
            'price' => 5.00,
        ]);

        $order = Order::create([
            'order_code' => 'ORD-8888',
            'user_id' => $user->id,
            'book_id' => $book->id,
            'customer_name' => $user->name,
            'customer_phone' => '012000000',
            'quantity' => 1,
            'total_price' => 5.00,
            'status' => 'completed',
        ]);

        $order->notifyUser('approved');

        $response = $this->actingAs($user)->getJson(route('notifications.index'));

        $response->assertOk();
        $response->assertJson([
            'unread_count' => 1,
        ]);
        $response->assertJsonFragment([
            'order_code' => 'ORD-8888',
        ]);
    }

    public function test_user_can_mark_notification_as_read(): void
    {
        $user = User::factory()->create();

        $order = Order::create([
            'order_code' => 'ORD-9999',
            'user_id' => $user->id,
            'customer_name' => $user->name,
            'customer_phone' => '012000000',
            'quantity' => 1,
            'total_price' => 5.00,
            'status' => 'completed',
        ]);

        $order->notifyUser('approved');
        $notification = $user->notifications()->first();

        $this->assertEquals(1, $user->unreadNotifications()->count());

        $response = $this->actingAs($user)->postJson(route('notifications.read', $notification->id));

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'unread_count' => 0,
        ]);

        $this->assertEquals(0, $user->fresh()->unreadNotifications()->count());
    }

    public function test_user_can_mark_all_notifications_as_read(): void
    {
        $user = User::factory()->create();

        for ($i = 1; $i <= 3; $i++) {
            $order = Order::create([
                'order_code' => "ORD-000{$i}",
                'user_id' => $user->id,
                'customer_name' => $user->name,
                'customer_phone' => '012000000',
                'quantity' => 1,
                'total_price' => 5.00,
                'status' => 'completed',
            ]);
            $order->notifyUser('approved');
        }

        $this->assertEquals(3, $user->unreadNotifications()->count());

        $response = $this->actingAs($user)->postJson(route('notifications.mark-all-read'));

        $response->assertOk();
        $response->assertJson([
            'success' => true,
            'unread_count' => 0,
        ]);

        $this->assertEquals(0, $user->fresh()->unreadNotifications()->count());
    }

    public function test_dashboard_displays_notification_alert_banner_when_unread(): void
    {
        $user = User::factory()->create();

        $book = Book::create([
            'title' => 'គណិតវិទ្យាថ្នាក់ទី១២',
            'slug' => 'math-grade-12',
            'author' => 'Mr. Math',
            'price' => 15.00,
        ]);

        $order = Order::create([
            'order_code' => 'ORD-ALERT-1',
            'user_id' => $user->id,
            'book_id' => $book->id,
            'customer_name' => $user->name,
            'customer_phone' => '012000000',
            'quantity' => 1,
            'total_price' => 15.00,
            'status' => 'completed',
        ]);

        $order->notifyUser('approved');

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertOk();
        $response->assertSee('ORD-ALERT-1');
        $response->assertSee('ការជូនដំណឹង');
        $response->assertSee('ត្រូវបានយល់ព្រម');
    }
}
