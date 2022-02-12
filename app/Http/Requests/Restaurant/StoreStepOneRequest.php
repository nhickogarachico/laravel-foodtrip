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
            'mobileNumber' => 'required',
            'telephoneNumber' => 'required',
            'website' => 'required',
            'restaurantCategories' => ['required', 'array']
        ];
    }
}
