<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Throwable;

class AttributeValueController extends Controller {
    public function index(Attribute $attribute)
    {
        $attribute_values = $attribute->attributeValues()->paginate(10);

        return view('admin.attribute.value.edit', ['attribute' => $attribute, 'attribute_values' => $attribute_values]);
    }

    public function store(Request $request, $id)
    {
        $attribute = Attribute::findOrFail($id);

        $rules = [
            'value_name' => ['required', 'string'],
        ];

        if ($attribute->attribute_type == 'color') {
            $rules['color_code'] = ['required'];
        }

        $request->validate($rules);

        $attribute_value = AttributeValue::create([
            'attribute_value' => $request->value_name,
            'color' => $attribute->attribute_type == 'color' ? $request->color_code : null,
            'attribute_id' => $attribute->id
        ]);

        if ($attribute_value) {

            return redirect()->back()->with('success', 'Attribute value created successfully');
        } else {
            return back()->with('error', 'Something went wrong');

        }

    }

    public function edit($id)
    {
        $attribute_value = AttributeValue::findOrFail($id);

        return response()->json($attribute_value);
    }

    /**
     * @throws Throwable
     */
    public function destroy(AttributeValue $attributeValue)
    {

        $attributeValue->deleteOrFail();

        return redirect()->back()->with('success', 'Attribute value deleted successfully');

    }

    public function get_attribute_values($attributeId)
    {
        $attribute = Attribute::with('attributeValues')->find($attributeId);

        if (!$attribute) {
            return response()->json(['error' => 'Attribute not found'], 404);
        }

        return response()->json($attribute->attributeValues);
    }

}
