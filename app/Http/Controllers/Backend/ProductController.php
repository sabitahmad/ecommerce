<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('admin.product.products');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::where('parent_id', null)->get();
        $sub_categorys = Category::where('parent_id', 1)->get(); // Ajax dia daynamic korty hoby category select korle or under sub categorie gulo chole asbe

        return view('admin.product.add-product', compact('categorys','sub_categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
