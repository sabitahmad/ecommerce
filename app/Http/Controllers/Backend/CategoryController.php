<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utility\Helpers;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index_category(Request $request)
    {

        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $query = Category::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $query = Category::latest();
        }

        $categories = $query->orderBy('name')->paginate(10)->appends($query_param);

        return view('admin.category.category', compact('categories', 'search'));

    }

    public function store_category(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['nullable', 'image'],
        ]);

        $allCategories = Category::pluck('name')->toArray();

        if (in_array($request->name[0], $allCategories)) {

            return back()->with('error', 'Category already exists');

        }

        if (! empty($request->file('image'))) {
            $image_name = Helpers::upload('category/', $request->file('image'));
        } else {
            $image_name = 'category.svg';
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image_name,
            'status' => 'active',
        ]);

        return back()->with('success', 'Category created successfully');

    }
}
