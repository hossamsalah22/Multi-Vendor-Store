<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255', 'unique:products,name,' . $this->product->id],
            'image' => ['nullable', 'image', 'max:1024'],
            'quantity' => ['sometimes', 'required', 'numeric', 'min:0'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'compare_price' => ['nullable', 'numeric', 'gt:price'],
            'description' => ['sometimes', 'required', 'string', 'max:5000'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'store_id' => ['sometimes', 'required', 'exists:stores,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'category',
            'store_id' => 'store',
        ];
    }
}
