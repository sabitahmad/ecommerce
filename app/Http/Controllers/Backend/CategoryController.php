<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utility\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Str;

class CategoryController extends Controller
{
    public function index_category(Request $request) {

        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $query = Category::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%");
                }
            })->whereNull('parent_id');
            $query_param = ['search' => $request['search']];
        } elseif($request->has('filter_status')) {
            $query = Category::whereNull('parent_id')->whereStatus($request->filter_status)->latest();
            $query_param = ['filter_status' => $request->filter_status];
        } else {
            $query = Category::whereNull('parent_id')->latest();
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
            'slug' => Str::slug($request->name),
            'status' => 'active',
        ]);

        return back()->with('success', 'Category created successfully');

    }

    public function index_subcategory(Request $request)
    {

        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $query = Category::with('children')->where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%");
                }
            })->whereNotNull('parent_id');
            $query_param = ['search' => $request['search']];
        } elseif ($request->has('filter_status')) {
            $query = Category::with('children')->where('status' , $request['filter_status'])->whereNotNull('parent_id')->latest();
            $query_param = ['filter_status' => $request['filter_status']];
        } else {
            $query = Category::with('children')->whereNotNull('parent_id')->latest();
        }

        $categories = $query->orderBy('name')->paginate(10)->appends($query_param);

        return view('admin.category.sub-category', compact('categories', 'search'));
    }


    public function store_subcategory(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255'],
            'parent_id' => ['required'],
        ],['name' => 'Category name is required', 'parent_id' => 'Select a main category']);

        $allCategories = Category::pluck('name')->toArray();

        if (in_array($request->name[0], $allCategories)) {

            return back()->with('error', 'Category already exists');

        }

        Category::create([
            'name' => $request->name,
            'description' => null,
            'image' => null,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'status' => 'active',
        ]);

        return back()->with('success', 'Sub Category created successfully');

    }

    public function destroy_category(Category $category)
    {

        if ($category->children->isNotEmpty()) {
            return redirect()->back()->with('error', 'Cannot delete a category with subcategories.');
        }

        if (Storage::disk('public')->exists('category/' . $category->image)) {
            Storage::disk('public')->delete('category/' . $category->image);
        }

        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    public function edit_category($id)
    {

        $category = Category::findOrFail($id);

        return response()->json($category);

    }

    public function update_category(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories')->ignore($id)],
        ]);


        $category =  Category::findOrFail($id);

        if ($category) {

            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $request->slug,
                'image' => $request->has('image') ? Helpers::update('category/', $category->image, $request->file('image')) : $category->image,
                'parent_id' => $request->has('parent_id') ? $request->parent_id : null,
                'status' => $request->status ? 'active' : 'deactivate'
            ]);

            return back()->with('success', ($category->parent_id == null) ? 'Category updated successfully' : 'Subcategory updated successfully');

        }

        return back()->with('error', 'Something went wrong!');

    }

    public function get_sub_categories(Request $request)
    {
        $mainCategoryId = $request->input('child_id');
        $subCategories = Category::where('parent_id', $mainCategoryId)->get();

        return response()->json($subCategories);
    }

}
