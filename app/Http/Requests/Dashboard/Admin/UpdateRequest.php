<?php

namespace App\Http\Requests\Dashboard\Admin;

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
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'username' => ['sometimes', 'required', 'string', 'unique:admins,username,' . $this->admin->id, 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'unique:admins,email,' . $this->admin->id, 'max:255'],
            'phone_number' => ['sometimes', 'required', 'string', 'unique:admins,phone_number,' . $this->admin->id, 'max:255'],
            'store_id' => ['nullable', 'exists:stores,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ];
    }

    public function attributes(): array
    {
        return [
            'store_id' => 'store',
        ];
    }
}
