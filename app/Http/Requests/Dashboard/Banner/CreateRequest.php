<?php

namespace App\Http\Requests\Dashboard\Banner;

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
            'title_en' => 'required|max:191',
            'title_ar' => 'required|max:191',
            'description_en' => 'required|string|min:10',
            'description_ar' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];

        if (request()->method() == 'POST') {
            $data['title_en'] = ['required', 'max:191', Rule::unique('banners', 'title->en')
                ->where('title->en', request('title_en'))
                ->whereNull('deleted_at')
            ];
            $data['title_ar'] = ['required', 'max:191', Rule::unique('banners', 'title->ar')
                ->where('title->ar', request('title_ar'))
                ->whereNull('deleted_at')
            ];
            $data['description_en'] = ['required', 'string'];
            $data['description_ar'] = ['required', 'string'];
            $data['image'] = ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'];
        }

        return $data;
    }
}
