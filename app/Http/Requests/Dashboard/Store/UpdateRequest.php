<?php

namespace App\Http\Requests\Dashboard\Store;

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
            'name' => ['sometimes', 'required', 'string', 'max:255', 'unique:stores,name,' . $this->store->id],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:1024', 'mimes:jpg,jpeg,png'],
        ];
    }
}
