<?php

namespace Tests\Feature;

use App\Models\TeachingMaterial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeachingMaterialTest extends TestCase
{
    use RefreshDatabase;

    public function test_teaching_materials_index_loads_successfully_and_paginates(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            TeachingMaterial::create([
                'name' => "Material {$i}",
                'category' => 'ឧបករណ៍វាស់ស្ទង់',
                'grade_level' => 'គ្រប់កម្រិតថ្នាក់',
                'description' => "Description for material {$i}",
                'specifications' => "Specs {$i}",
                'image' => '/images/tool_ruler.svg',
            ]);
        }

        $response = $this->get(route('teaching-materials.index'));

        $response->assertStatus(200);
        $response->assertViewHas('materials', function ($materials) {
            return $materials->count() === 8 && $materials->total() === 10 && $materials->hasPages();
        });
    }

    public function test_teaching_materials_can_be_filtered_by_category(): void
    {
        TeachingMaterial::create([
            'name' => 'Steel Ruler',
            'category' => 'ឧបករណ៍វាស់ស្ទង់',
            'description' => 'Measurement ruler',
        ]);

        TeachingMaterial::create([
            'name' => 'Compass Set',
            'category' => 'ធរណីមាត្រ',
            'description' => 'Geometric compass',
        ]);

        $response = $this->get(route('teaching-materials.index', ['category' => 'ឧបករណ៍វាស់ស្ទង់']));

        $response->assertStatus(200);
        $response->assertViewHas('materials', function ($materials) {
            return $materials->count() === 1 && $materials->first()->name === 'Steel Ruler';
        });
    }

    public function test_teaching_materials_can_be_searched_by_keyword(): void
    {
        TeachingMaterial::create([
            'name' => 'Special Protractor Kit',
            'category' => 'ធរណីមាត្រ',
            'description' => 'Unique angle measurement kit',
        ]);

        TeachingMaterial::create([
            'name' => 'Ordinary Tape',
            'category' => 'ឧបករណ៍វាស់ស្ទង់',
            'description' => 'Tape measure',
        ]);

        $response = $this->get(route('teaching-materials.index', ['q' => 'Protractor']));

        $response->assertStatus(200);
        $response->assertViewHas('materials', function ($materials) {
            return $materials->count() === 1 && $materials->first()->name === 'Special Protractor Kit';
        });
    }

    public function test_single_teaching_material_detail_page_loads(): void
    {
        $material = TeachingMaterial::create([
            'name' => 'Geometry Polyhedron 3D',
            'category' => 'ធរណីមាត្រ',
            'grade_level' => 'ថ្នាក់ទី ៨ ដល់ ១២',
            'description' => 'Polyhedron set for classroom demonstrations',
            'specifications' => '12 transparent models',
        ]);

        $response = $this->get(route('teaching-materials.show', $material->id));

        $response->assertStatus(200);
        $response->assertSee('Geometry Polyhedron 3D');
        $response->assertSee('Polyhedron set for classroom demonstrations');
    }

    public function test_group_order_can_be_placed_successfully(): void
    {
        $mat1 = TeachingMaterial::create([
            'name' => 'Item 1',
            'price' => 5.00,
            'category' => 'ធរណីមាត្រ',
            'description' => 'First item',
        ]);

        $mat2 = TeachingMaterial::create([
            'name' => 'Item 2',
            'price' => 10.00,
            'category' => 'ឧបករណ៍វាស់ស្ទង់',
            'description' => 'Second item',
        ]);

        $cartItems = [
            ['id' => $mat1->id, 'name' => $mat1->name, 'price' => 5.00, 'quantity' => 2],
            ['id' => $mat2->id, 'name' => $mat2->name, 'price' => 10.00, 'quantity' => 1],
        ];

        $response = $this->post(route('teaching-materials.group-order'), [
            'order_code' => 'TM99999',
            'customer_name' => 'Sok Dara',
            'customer_phone' => '012999888',
            'customer_address' => 'Phnom Penh, Cambodia',
            'payment_method' => 'cod',
            'cart_items' => json_encode($cartItems),
        ]);

        $response->assertSessionHas('order_success');
        $this->assertDatabaseHas('orders', [
            'order_code' => 'TM99999',
            'customer_name' => 'Sok Dara',
            'customer_phone' => '012999888',
            'quantity' => 3,
            'total_price' => 20.00,
            'payment_method' => 'cod',
            'status' => 'pending',
        ]);
    }
}
