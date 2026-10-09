<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HeaderNavigationTest extends TestCase
{
    use RefreshDatabase;

    private array $menuTitles = [
        'ទំព័រដើម',
        'គណិតវិទ្យា',
        'សៀវភៅ',
        'អត្ថបទ',
        'សំភារៈបង្រៀន',
        'អំពីយើង',
        'ថ្នាក់បង្រៀន',
    ];

    /**
     * Test header presence on all main public pages.
     */
    public function test_all_public_pages_have_identical_header_menu(): void
    {
        $urls = [
            '/',
            '/mathematics',
            '/books',
            '/articles',
            '/teaching-materials',
            '/about',
            '/classes',
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);

            // Check branding
            $response->assertSee('ANONTAK');

            // Check all 7 navigation items
            foreach ($this->menuTitles as $title) {
                $response->assertSee($title);
            }

            // Check language switchers
            $response->assertSee('ភាសាខ្មែរ');
            $response->assertSee('ENG');

            // Check search and mobile menu container
            $response->assertSee('id="globalMobileMenu"', false);
            $response->assertSee('id="globalUserDropdown"', false);
        }
    }

    /**
     * Test header on authenticated dashboard page.
     */
    public function test_dashboard_page_has_identical_header_menu(): void
    {
        $user = User::factory()->create([
            'name' => 'Sopheak Test',
            'email' => 'sopheak@example.com',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);

        // Check branding
        $response->assertSee('ANONTAK');

        // Check all 7 navigation items
        foreach ($this->menuTitles as $title) {
            $response->assertSee($title);
        }

        // Check user name in dropdown trigger
        $response->assertSee('Sopheak Test');
        $response->assertSee('ចាកចេញ (Logout)');
    }
}
