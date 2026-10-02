<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;

Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');

Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mathematics', function () {
    return view('math-test');
});

Route::get('/books', function () {
    return view('books');
});

Route::get('/books/detail', function () {
    return view('book-detail');
});

Route::get('/read-book', function () {
    return view('read-book');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});
