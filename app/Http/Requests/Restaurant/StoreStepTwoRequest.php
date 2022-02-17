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
            "restaurantOutletName" => 'required',
            "area" => 'required',
            "locality" => 'required',
            "location" => 'required',
            'fullAddress' => 'nullable',
            'addressLongitude' => ['required', 'numeric'],
            'addressLatitude' => ['required', 'numeric'],
            'openingHours' => ['required', 'array'],
            'openingHours.*.dayOfTheWeek' => ['required','integer'],
            'openingHours.*.closed' => ['required', 'boolean'],
            'openingHours.*.hours' => ['required', 'array'],
            'openingHours.*.hours.*.openingHour' => ['required', 'string'],
            'openingHours.*.hours.*.openingMinute' => ['required', 'string'],
            'openingHours.*.hours.*.closingHour' => ['required', 'string'],
            'openingHours.*.hours.*.closingHour' => ['required', 'string'],
            'openingHours.*.hours.*.validFrom' => ['nullable','string'],
            'openingHours.*.hours.*.validThrough' => ['nullable', 'string'],
            'mobileNumbers' => ['nullable', 'array'],
            'telephoneNumbers' => ['nullable', 'array']
        ];
    }
}
