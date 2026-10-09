<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    public function index(Request $request): View
    {
        $teachers = Teacher::with('classrooms')->get();

        return view('classes', compact('teachers'));
    }

    public function show(Request $request, Classroom $classroom): JsonResponse|RedirectResponse
    {
        $classroom->load('teacher');

        if ($request->wantsJson()) {
            return response()->json($classroom);
        }

        return redirect()->route('classes.index');
    }
}
