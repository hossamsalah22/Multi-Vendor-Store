<?php

namespace App\Http\Requests\Dashboard\Admin;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:admins,email', 'max:255'],
            'phone_number' => ['required', 'string', 'phone_number', 'unique:admins,phone_number', 'max:255'],
            'store_id' => ['nullable', 'exists:stores,id'],
        ];
    }
}
