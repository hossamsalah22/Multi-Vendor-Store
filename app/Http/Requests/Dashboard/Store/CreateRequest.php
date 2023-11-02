<?php

namespace App\Http\Requests\Dashboard\Store;

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
            'description_en' => ['required', 'string', 'max:255'],
            'description_ar' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];

        if (request()->method() == 'POST') {
            $data['name_en'] = ['required', 'string', 'max:255', Rule::unique('stores', 'name->en')
                ->where('name->en', request('name_en'))
                ->whereNull('deleted_at')];
            $data['name_ar'] = ['required', 'string', 'max:255', Rule::unique('stores', 'name->ar')
                ->where('name->ar', request('name_ar'))
                ->whereNull('deleted_at')];
            $data['description_en'] = ['required', 'string', 'max:255'];
            $data['description_ar'] = ['required', 'string', 'max:255'];
            $data['image'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }

        return $data;
    }
}
