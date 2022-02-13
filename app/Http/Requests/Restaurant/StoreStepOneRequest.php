<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class StoreStepOneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'restaurantName' => 'required',
            'mobileNumbers' => ['array', 'nullable'],
            'telephoneNumbers' => ['array', 'nullable'],
            'website' => 'nullable',
            'restaurantCategories' => ['required', 'array']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'restaurantName.required' => 'Restaurant name is required',
            'restaurantCategories.required' => 'Restaurant category is required',
        ];
    }
}
