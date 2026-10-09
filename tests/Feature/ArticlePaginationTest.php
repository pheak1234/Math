<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlePaginationTest extends TestCase
{
    use RefreshDatabase;

    public function test_articles_index_displays_8_articles_per_page_and_paginates_when_over_8(): void
    {
        for ($i = 1; $i <= 12; $i++) {
            Article::create([
                'title' => "Math Article {$i}",
                'slug' => "math-article-{$i}",
                'category' => 'វិធីសាស្ត្រ',
                'summary' => "Summary for article {$i}",
                'content' => "<p>Full content for article {$i}</p>",
                'author' => 'Author X',
                'read_time' => '5 នាទី',
                'published_at' => now()->subDays($i),
            ]);
        }

        $response = $this->get(route('articles.index'));

        $response->assertStatus(200);
        $response->assertViewHas('articles', function ($articles) {
            return $articles->count() === 8 && $articles->total() === 12 && $articles->hasPages();
        });

        // Page 2
        $responsePage2 = $this->get(route('articles.index', ['page' => 2]));
        $responsePage2->assertStatus(200);
        $responsePage2->assertViewHas('articles', function ($articles) {
            return $articles->count() === 4 && $articles->total() === 12;
        });
    }

    public function test_articles_can_be_filtered_by_category(): void
    {
        Article::create([
            'title' => 'Method Article 1',
            'slug' => 'method-article-1',
            'category' => 'វិធីសាស្ត្រ',
            'summary' => 'Method summary',
            'content' => '<p>Method content</p>',
            'published_at' => now(),
        ]);

        Article::create([
            'title' => 'Finance Article 1',
            'slug' => 'finance-article-1',
            'category' => 'ហិរញ្ញវត្ថុ',
            'summary' => 'Finance summary',
            'content' => '<p>Finance content</p>',
            'published_at' => now(),
        ]);

        // Filter by វិធីសាស្ត្រ
        $responseMethod = $this->get(route('articles.index', ['category' => 'វិធីសាស្ត្រ']));
        $responseMethod->assertStatus(200);
        $responseMethod->assertViewHas('articles', function ($articles) {
            return $articles->count() === 1 && $articles->first()->title === 'Method Article 1';
        });

        // Filter by ហិរញ្ញវត្ថុ
        $responseFinance = $this->get(route('articles.index', ['category' => 'ហិរញ្ញវត្ថុ']));
        $responseFinance->assertStatus(200);
        $responseFinance->assertViewHas('articles', function ($articles) {
            return $articles->count() === 1 && $articles->first()->title === 'Finance Article 1';
        });
    }

    public function test_single_article_can_be_viewed_with_details_and_related_articles(): void
    {
        $article = Article::create([
            'title' => 'Main Calculus Article',
            'slug' => 'main-calculus-article',
            'category' => 'ទ្រឹស្ដីបទ',
            'summary' => 'Calculus summary',
            'content' => '<p>Deep explanation of Calculus theorems</p>',
            'author' => 'Dr. Math',
            'read_time' => '6 នាទី',
            'published_at' => now(),
        ]);

        $related = Article::create([
            'title' => 'Related Theorem Article',
            'slug' => 'related-theorem-article',
            'category' => 'ទ្រឹស្ដីបទ',
            'summary' => 'Related summary',
            'content' => '<p>Related theorem</p>',
            'published_at' => now(),
        ]);

        $response = $this->get(route('articles.show', $article->id));

        $response->assertStatus(200);
        $response->assertSee('Main Calculus Article');
        $response->assertSee('Deep explanation of Calculus theorems');
        $response->assertViewHas('relatedArticles', function ($relatedArticles) use ($related) {
            return $relatedArticles->contains('id', $related->id);
        });
    }
}
