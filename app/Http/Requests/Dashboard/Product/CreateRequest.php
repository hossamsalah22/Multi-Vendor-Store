<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'image' => ['required', 'image', 'max:1024', 'mimes:jpg,jpeg,png'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string', 'max:5000'],
            'category_id' => ['required', 'exists:categories,id'],
            'store_id' => ['required', 'exists:stores,id'],
        ];
    }

    /**
     * attributes
     */
    public function attributes(): array
    {
        return [
            'category_id' => 'category',
            'store_id' => 'store',
        ];
    }
}
