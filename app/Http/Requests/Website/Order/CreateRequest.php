<?php

namespace App\Http\Requests\Website\Order;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'addr.*.type' => 'required|in:billing,shipping',
            'addr.*.first_name' => 'required|string',
            'addr.*.last_name' => 'required|string',
            'addr.*.email' => 'nullable|email',
            'addr.*.phone_number' => 'required|integer',
            'addr.*.address' => 'required|string',
            'addr.*.city' => 'required|string',
            'addr.*.state' => 'nullable|string',
            'addr.*.country' => 'required|string',
            'addr.*.postal_code' => 'nullable|string',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'addr.*.type' => 'address type',
            'addr.*.first_name' => 'first name',
            'addr.*.last_name' => 'last name',
            'addr.*.email' => 'email',
            'addr.*.phone_number' => 'phone number',
            'addr.*.address' => 'address',
            'addr.*.city' => 'city',
            'addr.*.state' => 'state',
            'addr.*.country' => 'country',
            'addr.*.postal_code' => 'postal code',
        ];
    }
}
