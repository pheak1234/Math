<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Order;
use App\Models\TeachingMaterial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardOrderHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_dashboard(): void
    {
        $response = $this->get(route('dashboard', ['tab' => 'orders']));
        $response->assertRedirect(route('login'));
    }

    public function test_user_can_view_orders_tab_with_own_and_phone_matched_orders(): void
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

        $material = TeachingMaterial::create([
            'name' => 'បន្ទាត់ត្រីកោណមាត្រ',
            'category' => 'ឧបករណ៍វាស់ស្ទង់',
            'grade_level' => 'គ្រប់កម្រិតថ្នាក់',
            'description' => 'បន្ទាត់សម្រាប់បង្រៀនធរណីមាត្រ',
            'price' => 5.50,
        ]);

        // Order 1: Linked via user_id
        $order1 = Order::create([
            'order_code' => 'ORD-1001',
            'user_id' => $user->id,
            'book_id' => $book->id,
            'customer_name' => $user->name,
            'customer_phone' => '012345678',
            'customer_address' => 'Phnom Penh',
            'quantity' => 1,
            'total_price' => 15.00,
            'payment_method' => 'aba_khqr',
            'status' => 'approved',
        ]);

        // Order 2: Linked via phone before login
        $order2 = Order::create([
            'order_code' => 'ORD-1002',
            'user_id' => null,
            'teaching_material_id' => $material->id,
            'customer_name' => 'Guest Sopheak',
            'customer_phone' => '012345678',
            'customer_address' => 'Kandal',
            'quantity' => 2,
            'total_price' => 11.00,
            'payment_method' => 'cod',
            'status' => 'pending',
        ]);

        // Order 3: Different user
        $otherOrder = Order::create([
            'order_code' => 'ORD-9999',
            'user_id' => null,
            'customer_name' => 'Other Person',
            'customer_phone' => '098765432',
            'customer_address' => 'Siem Reap',
            'quantity' => 1,
            'total_price' => 20.00,
            'payment_method' => 'aba_khqr',
            'status' => 'approved',
        ]);

        $response = $this->actingAs($user)->get(route('dashboard', ['tab' => 'orders']));

        $response->assertOk();
        $response->assertSee('ORD-1001');
        $response->assertSee('ORD-1002');
        $response->assertDontSee('ORD-9999');
        $response->assertSee('គណិតវិទ្យាថ្នាក់ទី១២');
        $response->assertSee('បន្ទាត់ត្រីកោណមាត្រ');
        $response->assertSee('$15.00');
        $response->assertSee('$11.00');

        $this->assertTrue($order1->isSuccessful());
        $this->assertTrue($order2->isPending());
        $this->assertEquals('គណិតវិទ្យាថ្នាក់ទី១២', $order1->item_name);
        $this->assertEquals('បន្ទាត់ត្រីកោណមាត្រ', $order2->item_name);
    }
}
