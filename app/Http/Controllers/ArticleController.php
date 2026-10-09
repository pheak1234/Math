<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('category', 'all');
        $query = Article::query();

        if ($category !== 'all' && ! empty($category)) {
            $query->where('category', $category);
        }

        $articles = $query->latest('published_at')->latest('id')->paginate(8)->withQueryString();

        $categories = [
            'all' => 'ទាំងអស់',
            'វិធីសាស្ត្រ' => 'វិធីសាស្ត្រ',
            'ទ្រឹស្ដីបទ' => 'ទ្រឹស្ដីបទ',
            'ការរៀនសូត្រ' => 'ការរៀនសូត្រ',
            'ហិរញ្ញវត្ថុ' => 'ហិរញ្ញវត្ថុ',
        ];

        $counts = [
            'all' => Article::count(),
            'វិធីសាស្ត្រ' => Article::where('category', 'វិធីសាស្ត្រ')->count(),
            'ទ្រឹស្ដីបទ' => Article::where('category', 'ទ្រឹស្ដីបទ')->count(),
            'ការរៀនសូត្រ' => Article::where('category', 'ការរៀនសូត្រ')->count(),
            'ហិរញ្ញវត្ថុ' => Article::where('category', 'ហិរញ្ញវត្ថុ')->count(),
        ];

        return view('articles', compact('articles', 'category', 'categories', 'counts'));
    }

    public function show(Article $article): View
    {
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->latest('published_at')
            ->limit(4)
            ->get();

        if ($relatedArticles->isEmpty()) {
            $relatedArticles = Article::where('id', '!=', $article->id)
                ->latest('published_at')
                ->limit(4)
                ->get();
        }

        return view('article-detail', compact('article', 'relatedArticles'));
    }
}
