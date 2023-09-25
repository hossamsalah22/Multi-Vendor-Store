<?php

namespace App\Http\Requests\Dashboard\Store;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:stores,name,' . $this->store->id],
            'description' => ['nullable', 'string'],
            'image' => ['image', 'max:1024', 'mimes:jpg,jpeg,png'],
        ];
    }
}
