<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class StoreStepTwoRequest extends FormRequest
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
            "restaurantOutlets" => ['required', 'array'],
            "restaurantOulets.*.restaurantOutletName" => 'required',
            "restaurantOutlets.*.area" => 'required',
            "restaurantOutlets.*.locality" => 'required',
            "restaurantOutlets.*.location" => 'required',
            'restaurantOutlets.*.fullAddress' => 'nullable',
            'restaurantOutlets.*.addressLongitude' => ['required', 'numeric'],
            'restaurantOutlets.*.addressLatitude' => ['required', 'numeric'],
            'restaurantOutlets.*.openingHours' => ['required', 'array'],
            'restaurantOutlets.*.openingHours.*.dayOfTheWeek' => ['required','integer'],
            'restaurantOutlets.*.openingHours.*.isClosed' => ['required', 'boolean'],
            'restaurantOutlets.*.openingHours.*.openingHour' => ['required', 'string'],
            'restaurantOutlets.*.openingHours.*.openingMinute' => ['required', 'string'],
            'restaurantOutlets.*.openingHours.*.closingHour' => ['required', 'string'],
            'restaurantOutlets.*.openingHours.*.closingHour' => ['required', 'string'],
            'restaurantOutlets.*.openingHours.*.validFrom' => ['nullable','date'],
            'restaurantOutlets.*.openingHours.*.validThrough' => ['nullable', 'date'],
            'restaurantOutlets.*.mobileNumbers' => ['nullable', 'array'],
            'restaurantOutlets.*.telephoneNumbers' => ['nullable', 'array']
        ];
    }
}
