<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $data = [
            'name_en' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string', 'max:5000'],
            'description_ar' => ['required', 'string', 'max:5000'],
            'category_id' => ['nullable'],
            'store_id' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'compare_price' => ['nullable', 'numeric', 'gt:price'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'images' => ['nullable', 'array', 'max:5'],
        ];

        if (request()->method() == 'POST') {
            $data['name_en'] = ['required', 'string', 'max:255', Rule::unique('products', 'name->en')
                ->where('name->en', request('name_en'))->whereNull('deleted_at')];
            $data['name_ar'] = ['required', 'string', 'max:255', Rule::unique('products', 'name->ar')
                ->where('name->ar', request('name_ar'))->whereNull('deleted_at')];
            $data['description_en'] = ['required', 'string', 'max:5000'];
            $data['description_ar'] = ['required', 'string', 'max:5000'];
            $data['category_id'] = ['nullable', Rule::exists('categories', 'id')
                ->where('id', request('category_id'))->whereNull('deleted_at')];
            $data['store_id'] = ['required', Rule::exists('stores', 'id')
                ->where('id', request('store_id'))->whereNull('deleted_at')];
            $data['price'] = ['required', 'numeric', 'min:0'];
            $data['compare_price'] = ['nullable', 'numeric', 'gt:price'];
            $data['quantity'] = ['required', 'numeric', 'min:0'];
            $data['images'] = ['nullable', 'array', 'max:5'];
        }

        return $data;
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
