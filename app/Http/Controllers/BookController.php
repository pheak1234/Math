<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $tab = $request->query('tab', 'all');
        $query = Book::with('reviews')->latest();

        if ($tab === 'free') {
            $query->where('price', 0);
        } elseif ($tab === 'premium') {
            $query->where('price', '>', 0);
        }

        $books = $query->paginate(10)->withQueryString();

        $counts = [
            'all' => Book::count(),
            'free' => Book::where('price', 0)->count(),
            'premium' => Book::where('price', '>', 0)->count(),
        ];

        return view('books', compact('books', 'tab', 'counts'));
    }

    public function show(Book $book): View
    {
        $book->load(['reviews.user']);

        $inLibrary = false;
        $hasRead = false;
        $userReview = null;

        if (Auth::check()) {
            $user = Auth::user();
            $inLibrary = $user->books()->where('book_id', $book->id)->exists();
            $hasRead = $user->hasReadBook($book);
            $userReview = $book->reviews->where('user_id', $user->id)->first();
        }

        return view('book-detail', compact('book', 'inLibrary', 'hasRead', 'userReview'));
    }

    public function addToLibrary(Book $book): RedirectResponse
    {
        $user = Auth::user();

        if (! $user->books()->where('book_id', $book->id)->exists()) {
            $user->books()->attach($book->id, [
                'status' => 'reading',
                'progress' => 0,
                'last_read_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'សៀវភៅត្រូវបានបន្ថែមទៅក្នុងបណ្ណាល័យរបស់អ្នកដោយជោគជ័យ!');
    }

    public function storeReview(Request $request, Book $book): RedirectResponse
    {
        $user = Auth::user();

        if (! $user->hasReadBook($book)) {
            return back()->with('error', 'អ្នកអាចវាយតម្លៃ និងផ្តល់មតិយោបល់បាន លុះត្រាតែអ្នកបានអានសៀវភៅនេះរួច។');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::updateOrCreate(
            [
                'user_id' => $user->id,
                'book_id' => $book->id,
            ],
            [
                'rating' => $validated['rating'],
                'comment' => $validated['comment'],
            ]
        );

        return back()->with('success', 'អរគុណសម្រាប់ការវាយតម្លៃ និងមតិយោបល់របស់អ្នក!');
    }

    public function read(Book $book)
    {
        $user = Auth::user();

        // Ensure user actually owns or has access to the book. For now, assuming they do if they reach here,
        // but it's good practice to check if it's attached.
        if (! $user->books()->where('book_id', $book->id)->exists() && $book->price > 0 && ! $user->orders()->where('book_id', $book->id)->where('status', 'completed')->exists()) {
            return redirect()->route('books.show', $book)->with('error', 'អ្នកមិនទាន់មានសិទ្ធិអានសៀវភៅនេះទេ។');
        }

        $userBook = $user->books()->where('book_id', $book->id)->first();
        $currentProgress = $userBook ? $userBook->pivot->progress : 0;

        return view('read-book', compact('book', 'currentProgress'));
    }

    public function updateProgress(Request $request, Book $book)
    {
        $user = Auth::user();

        $request->validate([
            'progress' => 'required|integer|min:0|max:100',
        ]);

        $progress = $request->progress;

        // Update pivot
        $user->books()->syncWithoutDetaching([
            $book->id => [
                'progress' => $progress,
                'status' => $progress >= 100 ? 'completed' : 'reading',
                'last_read_at' => now(),
            ],
        ]);

        return response()->json(['success' => true]);
    }
}
