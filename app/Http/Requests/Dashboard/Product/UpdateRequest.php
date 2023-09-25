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
            'name' => ['required', 'string', 'max:255', 'unique:products,name,' . $this->product->id],
            'image' => ['nullable', 'image', 'max:1024'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string', 'max:5000'],
            'category_id' => ['required', 'exists:categories,id'],
            'store_id' => ['required', 'exists:stores,id'],
        ];
    }
}
