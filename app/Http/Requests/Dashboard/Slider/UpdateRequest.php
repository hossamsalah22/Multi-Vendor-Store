<?php

namespace App\Http\Requests\Dashboard\Slider;

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
            'title_ar' => 'required|max:191',
            'title_en' => 'required|max:191',
            'description_ar' => 'required',
            'description_en' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:10000',
        ];

        if (request()->method() == 'PUT') {
            $data['title_ar'] = ['required', 'max:191', Rule::unique('sliders', 'title->ar')
                ->where('title->ar', request('title_ar'))
                ->whereNull('deleted_at')
                ->ignore(request()->route('slider')->getTranslation('title', 'ar'), 'title->ar')
            ];

            $data['title_en'] = ['required', 'max:191', Rule::unique('sliders', 'title->en')
                ->where('title->en', request('title_en'))
                ->whereNull('deleted_at')
                ->ignore(request()->route('slider')->getTranslation('title', 'en'), 'title->en')
            ];

            $data['description_ar'] = ['required', 'max:191', Rule::unique('sliders', 'description->ar')
                ->where('description->ar', request('description_ar'))
                ->whereNull('deleted_at')
                ->ignore(request()->route('slider')->getTranslation('description', 'ar'), 'description->ar')
            ];

            $data['description_en'] = ['required', 'max:191', Rule::unique('sliders', 'description->en')
                ->where('description->en', request('description_en'))
                ->whereNull('deleted_at')
                ->ignore(request()->route('slider')->getTranslation('description', 'en'), 'description->en')
            ];

            $data['price'] = ['required', 'numeric'];
        }

        return $data;
    }
}
