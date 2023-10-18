<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(Admin::class)->ignore($this->user()->id)],
            'phone_number' => ['required', 'numeric', 'digits:11', Rule::unique(Admin::class)->ignore($this->user()->id)],
            'image' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ];
    }
}
