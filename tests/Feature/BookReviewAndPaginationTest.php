<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReviewAndPaginationTest extends TestCase
{
    use RefreshDatabase;

    public function test_books_index_displays_10_books_per_page_and_paginates_when_over_10(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            Book::create([
                'title' => "Math Book {$i}",
                'author' => "Author {$i}",
                'price' => $i,
                'description' => "Description {$i}",
            ]);
        }

        $response = $this->get(route('books.index'));

        $response->assertStatus(200);
        $response->assertViewHas('books', function ($books) {
            return $books->count() === 10 && $books->total() === 15 && $books->hasPages();
        });
    }

    public function test_books_filter_tabs_and_counts(): void
    {
        Book::create([
            'title' => 'Free Book 1',
            'author' => 'Author Free',
            'price' => 0.00,
            'description' => 'Free math book',
        ]);
        Book::create([
            'title' => 'Premium Book 1',
            'author' => 'Author Paid',
            'price' => 5.00,
            'description' => 'Premium math book',
        ]);

        // Default / all tab
        $responseAll = $this->get(route('books.index'));
        $responseAll->assertStatus(200);
        $responseAll->assertViewHas('tab', 'all');
        $responseAll->assertViewHas('counts', ['all' => 2, 'free' => 1, 'premium' => 1]);
        $responseAll->assertViewHas('books', fn ($books) => $books->count() === 2);

        // Free tab
        $responseFree = $this->get(route('books.index', ['tab' => 'free']));
        $responseFree->assertStatus(200);
        $responseFree->assertViewHas('tab', 'free');
        $responseFree->assertViewHas('books', fn ($books) => $books->count() === 1 && $books->first()->title === 'Free Book 1');

        // Premium tab
        $responsePremium = $this->get(route('books.index', ['tab' => 'premium']));
        $responsePremium->assertStatus(200);
        $responsePremium->assertViewHas('tab', 'premium');
        $responsePremium->assertViewHas('books', fn ($books) => $books->count() === 1 && $books->first()->title === 'Premium Book 1');
    }

    public function test_user_who_has_read_book_can_rate_and_comment(): void
    {
        $user = User::factory()->create();
        $book = Book::create([
            'title' => 'Geometry Master',
            'author' => 'Author X',
            'price' => 10.00,
            'description' => 'Great math book',
        ]);

        $user->books()->attach($book->id, [
            'status' => 'reading',
            'progress' => 20,
            'last_read_at' => now(),
        ]);

        $response = $this->actingAs($user)->post(route('books.review', $book->id), [
            'rating' => 5,
            'comment' => 'សៀវភៅនេះល្អខ្លាំងណាស់ ងាយស្រួលយល់!',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('reviews', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'rating' => 5,
            'comment' => 'សៀវភៅនេះល្អខ្លាំងណាស់ ងាយស្រួលយល់!',
        ]);

        $this->assertEquals(5.0, $book->averageRating());
    }

    public function test_user_who_has_not_read_book_cannot_rate_or_comment(): void
    {
        $user = User::factory()->create();
        $book = Book::create([
            'title' => 'Calculus Book',
            'author' => 'Author Y',
            'price' => 15.00,
            'description' => 'Calculus',
        ]);

        $response = $this->actingAs($user)->post(route('books.review', $book->id), [
            'rating' => 4,
            'comment' => 'Should not be allowed without reading',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');

        $this->assertDatabaseMissing('reviews', [
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);
    }

    public function test_guest_cannot_submit_review(): void
    {
        $book = Book::create([
            'title' => 'Trigonometry Book',
            'author' => 'Author Z',
            'price' => 5.00,
            'description' => 'Trigonometry',
        ]);

        $response = $this->post(route('books.review', $book->id), [
            'rating' => 5,
            'comment' => 'Guest comment',
        ]);

        $response->assertRedirect('/login');
        $this->assertEquals(0, Review::count());
    }

    public function test_review_validation_rules(): void
    {
        $user = User::factory()->create();
        $book = Book::create([
            'title' => 'Physics Book',
            'author' => 'Author P',
            'price' => 12.00,
            'description' => 'Physics',
        ]);

        $user->books()->attach($book->id, [
            'status' => 'reading',
            'progress' => 10,
            'last_read_at' => now(),
        ]);

        $response = $this->actingAs($user)->post(route('books.review', $book->id), [
            'rating' => 6, // invalid > 5
            'comment' => '', // required
        ]);

        $response->assertSessionHasErrors(['rating', 'comment']);
    }
}
