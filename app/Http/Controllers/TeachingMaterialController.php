<?php

namespace App\Http\Controllers;

use App\Models\TeachingMaterial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeachingMaterialController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('category', 'all');
        $search = $request->query('q', '');

        $query = TeachingMaterial::query();

        if ($category !== 'all' && ! empty($category)) {
            $query->where('category', $category);
        }

        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('specifications', 'like', "%{$search}%");
            });
        }

        $materials = $query->latest('is_featured')->latest('id')->paginate(8)->withQueryString();

        $counts = [
            'all' => TeachingMaterial::count(),
            'ឧបករណ៍វាស់ស្ទង់' => TeachingMaterial::where('category', 'ឧបករណ៍វាស់ស្ទង់')->count(),
            'ធរណីមាត្រ' => TeachingMaterial::where('category', 'ធរណីមាត្រ')->count(),
            'សៀវភៅជំនួយ' => TeachingMaterial::where('category', 'សៀវភៅជំនួយ')->count(),
            'សម្ភារៈពិសោធន៍' => TeachingMaterial::where('category', 'សម្ភារៈពិសោធន៍')->count(),
        ];

        return view('teaching-materials', compact('materials', 'category', 'search', 'counts'));
    }

    public function show(TeachingMaterial $teachingMaterial): View
    {
        $related = TeachingMaterial::where('id', '!=', $teachingMaterial->id)
            ->where('category', $teachingMaterial->category)
            ->limit(4)
            ->get();

        return view('teaching-materials-detail', [
            'material' => $teachingMaterial,
            'related' => $related,
        ]);
    }
}
