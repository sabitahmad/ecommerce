<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_name' => ['required'],
            'product_slug' => ['required' , 'unique:products,slug'],
            'product_description' => ['nullable'],
            'product_price' => ['nullable', 'numeric'],
            'product_type' => ['required'],
            'product_status' => ['required'],
            'product_discount_type' => ['required'],
            'product_discount' => ['nullable', 'numeric'],
            'product_sku' => ['required'],
            'product_tags' => ['nullable', 'json'],
            'product_category' => ['required'],
            'product_stock' => ['numeric', 'nullable'],
            'product_sub_category' => ['nullable', 'numeric'],
            'thumbnail' => ['required', 'string'],
            'product_images.*' => ['required', 'json'],
            'variations' => ['required_if:product_type,variable'],
            'variations.price' => ['required_if:product_type,variable'],
            'variations.attributes.*' => ['required_if:product_type,variable', 'json'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'product_name.required' => 'Insert product name',
            'product_slug.required' => 'Insert product slug'
        ];
    }

    public function authorize(): bool
    {
        dump($this->all());
        return true;
    }
}
