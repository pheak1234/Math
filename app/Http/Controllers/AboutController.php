<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\TeachingMaterial;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::with('classrooms')->get();

        $stats = [
            'books_count' => Book::count(),
            'articles_count' => Article::count(),
            'materials_count' => TeachingMaterial::count(),
            'classrooms_count' => Classroom::count(),
            'teachers_count' => Teacher::count(),
        ];

        return view('about', compact('teachers', 'stats'));
    }
}
