<?php

namespace App\Http\Requests\Dashboard\Store;

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
            'name' => ['required', 'string', 'max:255', 'unique:stores,name'],
            'description' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:1024', 'mimes:jpg,jpeg,png'],
        ];
    }
}
