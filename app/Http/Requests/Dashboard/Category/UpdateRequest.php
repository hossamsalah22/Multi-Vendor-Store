<?php

namespace App\Http\Requests\Dashboard\Category;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'description_en' => ['nullable', 'string', 'max:255'],
            'description_ar' => ['nullable', 'string', 'max:255'],
            'parent_id' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'max:1024'],
        ];

        if (request()->method() == 'POST') {
            $data['name_en'] = ['required', 'string', 'max:255', Rule::unique('categories', 'name->en')
                ->where('name->en', request('name_en'))
                ->whereNull('deleted_at')
                ->ignore($this->category->id)
            ];
            $data['name_ar'] = ['required', 'string', 'max:255', Rule::unique('categories', 'name->ar')
                ->where('name->ar', request('name_ar'))
                ->whereNull('deleted_at')
                ->ignore($this->category->id)
            ];
            $data['description_en'] = ['nullable', 'string', 'max:255'];
            $data['description_ar'] = ['nullable', 'string', 'max:255'];
            $data['parent_id'] = ['nullable', 'integer', Rule::exists('categories', 'id')
                ->where('id', request('parent_id'))
                ->whereNull('deleted_at')
            ];
            $data['image'] = ['nullable', 'image', 'max:1024'];
        }

        return $data;
    }

    public function attributes(): array
    {
        return [
            'parent_id' => 'parent category',
        ];
    }
}
