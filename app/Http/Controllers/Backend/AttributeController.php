<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();

        return view('admin.attribute.index', ['attributes' => $attributes]);

    }

    public function store(Request $request)
    {

        $request->validate([
           'attribute_name' => ['required', 'unique:attributes'],
            'attribute_type' => ['required']
        ]);

        $attribute = Attribute::create([
           'attribute_name' =>  $request->attribute_name,
            'attribute_type' => $request->attribute_type
        ]);

        if ($attribute) {
            return back()->with('success', 'Attribute created successfully');
        }else {
            return back()->with('error', 'Something went wrong!');
        }

    }

    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        return response()->json($attribute);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'attribute_name' => 'required',
        ]);

        $attribute = Attribute::findOrFail($id);

        if ($attribute) {

            $attribute->update([
               'attribute_name' => $request->attribute_name
            ]);

            return back()->with('success', 'Attribute updated successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }

    }

    public function delete(Attribute $attribute)
    {
        if ($attribute->attributeValues->isNotEmpty()) {

            return back()->with('error', 'Cant delete remove attribute values first');

        } else {

            $attribute->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');

        }

    }
}
