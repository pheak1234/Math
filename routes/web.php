<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TeachingMaterialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');

Route::post('/logout', function () {
    Auth::logout();

    return redirect('/');
})->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/dashboard/profile', [DashboardController::class, 'updateProfile'])->middleware('auth')->name('dashboard.profile.update');

Route::get('/', function () {
    $recentArticles = \App\Models\Article::orderByDesc('priority')
        ->latest('published_at')
        ->take(4)
        ->get();
        
    $recentBooks = \App\Models\Book::orderByDesc('priority')->latest()->take(5)->get();
    
    $recentMaterials = \App\Models\TeachingMaterial::latest()->take(5)->get();
        
    return view('welcome', compact('recentArticles', 'recentBooks', 'recentMaterials'));
});

Route::get('/mathematics', function () {
    $exams = \App\Models\MathExam::with(['questions.options'])
        ->where('is_popular', true)
        ->orderByDesc('priority')
        ->latest()
        ->get();
        
    return view('math-test', compact('exams'));
});

Route::post('/mathematics/submit', function (Illuminate\Http\Request $request) {
    if (!Auth::check()) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }
    
    $exam = \App\Models\MathExam::findOrFail($request->exam_id);
    $score = $request->score;
    
    $attempt = \App\Models\ExamAttempt::create([
        'user_id' => Auth::id(),
        'math_exam_id' => $exam->id,
        'score' => $score,
        'status' => 'completed',
        'completed_at' => now(),
    ]);
    
    return response()->json(['success' => true, 'attempt_id' => $attempt->id]);
})->middleware('auth');


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::post('/books/{book}/add', [BookController::class, 'addToLibrary'])->middleware('auth')->name('books.add');
Route::post('/books/{book}/init-order', [OrderController::class, 'initBookOrder'])->name('books.init-order');
Route::post('/books/{book}/order', [OrderController::class, 'storeBookOrder'])->name('books.order');
Route::post('/books/{book}/review', [BookController::class, 'storeReview'])->middleware('auth')->name('books.review');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/teaching-materials', [TeachingMaterialController::class, 'index'])->name('teaching-materials.index');
Route::get('/teaching-materials/{teachingMaterial}', [TeachingMaterialController::class, 'show'])->name('teaching-materials.show');
Route::post('/teaching-materials/{material}/order', [OrderController::class, 'store'])->name('teaching-materials.order');

Route::get('/classes', [ClassroomController::class, 'index'])->name('classes.index');
Route::get('/classes/{classroom}', [ClassroomController::class, 'show'])->name('classes.show');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/read-book/{book}', [BookController::class, 'read'])->middleware('auth')->name('books.read');
Route::post('/books/{book}/progress', [BookController::class, 'updateProgress'])->middleware('auth')->name('books.progress');

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

// Telegram Webhook & Setup
use App\Http\Controllers\TelegramWebhookController;
use App\Models\Order;
use Illuminate\Support\Facades\Http;

Route::post('/telegram/webhook', [TelegramWebhookController::class, 'handle'])->name('telegram.webhook');

Route::get('/orders/check-status/{orderCode}', function ($orderCode) {
    $order = Order::where('order_code', $orderCode)->first();
    if (! $order) {
        return response()->json(['status' => 'not_found']);
    }

    return response()->json([
        'status' => $order->status,
        'is_paid' => $order->status === 'completed',
    ]);
})->name('orders.check-status');

Route::get('/telegram/set-webhook', function () {
    $token = env('TELEGRAM_BOT_TOKEN');
    if (! $token) {
        return response()->json(['error' => 'TELEGRAM_BOT_TOKEN is not set in .env'], 400);
    }

    $url = request('url', url('/telegram/webhook'));
    $response = Http::post("https://api.telegram.org/bot{$token}/setWebhook", [
        'url' => $url,
    ]);

    return $response->json();
});
