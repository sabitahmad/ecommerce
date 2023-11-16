<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Utility\Helpers;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        $attributes = Attribute::all();

        return view('admin.product.add-product', compact('categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {


        $productData = $request->all();

        $filenames = [];

        foreach ($productData['product_images'] as $item) {
            $filenames[] = json_decode($item)[0];
        }

        $imageNames = json_encode($filenames);


        if ($productData['product_type'] == 'variable' && $request->filled('variations')) {

            $attributesByName = Attribute::pluck('id', 'attribute_name')->toArray();
            $variations = $productData['variations'];

            $product = Product::create([
                'name' => $productData['product_name'],
                'slug' => $productData['product_slug'],
                'long_description' => $productData['product_description'],
                'type' => $productData['product_type'],
                'status' => $productData['product_status'],
                'tags' => $productData['product_tags'],
                'thumbnail' => $productData['thumbnail'],
                'product_images' => $imageNames,
                'category_id' => $request->has('product_sub_category') ? $productData['product_sub_category'] : $productData['product_category']
            ]);

            // You can access the variations like this:
            foreach ($variations['price'] as $index => $price) {
                $attributes = json_decode($variations['attributes'][$index], true);
                $quantity = $variations['quantity'][$index];

                $skuCode = str($productData['product_name']);
                $skuOptions = [];

                foreach ($attributes as $name => $value) {
                    $skuCode .= ' ' . $value . ' ' . $name;

                    if (!array_key_exists($name, $attributesByName)) {

                        return back()->with('error', 'Attribute '. $name . ' not found');
                    }

                    $attributeOption = AttributeValue::where('attribute_id' ,$attributesByName[$name])->where('attribute_value', $value)->value('id');

                    if (!$attributeOption) {
                        return back()->with('error', 'Attribute Value ' . $name . ' => ' . $value . ' not found');
                    }

                    $skuOptions[] = $attributeOption;
                }

                $variation = $product->variants()->create([
                    'price' => $price,
                    'sku' => str()->slug($skuCode),
                    'quantity' => $quantity
                ]);

                $variation->attributeOptions()->attach($skuOptions);
            }

        } else {

            $product = Product::create([
                'name' => $productData['product_name'],
                'slug' => $productData['product_slug'],
                'long_description' => $productData['product_description'],
                'regular_price' => $productData['product_price'],
                'type' => $productData['product_type'],
                'status' => $productData['product_status'],
                'discount_type' => $productData['product_discount_type'],
                'discount_price' => $productData['product_discount'],
                'sku' => $productData['product_sku'],
                'tags' => $productData['product_tags'],
                'stock' => $productData['product_stock'],
                'thumbnail' => $productData['thumbnail'],
                'product_images' => $imageNames,
                'category_id' => $request->has('product_sub_category') ? $productData['product_sub_category'] : $productData['product_category']
            ]);

        }
        if ($product) {

            return redirect(route('products.create'))->with('success', 'Product Created Successfully');

        } else {
            return back()->with('error', 'Failed to create the product');
        }
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
    public function edit(Product $product)
    {

        $attributes = Attribute::all();
        $categories = Category::where('parent_id', null)->get();
        return view('admin.product.edit-product', compact('product', 'attributes', 'categories'));

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

    public function checkSlugUnique(Request $request) {

        $slug = $request->input('slug');
        $model = Product::where('slug', $slug)->first();
        if ($model) {
            $suggestedSlug = Helpers::generateUniqueSlug($slug);
            return response()->json([
                'unique' => false,
                'suggestedSlug' => $suggestedSlug,
            ]);
        } else {
            return response()->json(['unique' => true]);
        }

    }



}
