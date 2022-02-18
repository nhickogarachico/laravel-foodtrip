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
            "area" => ['required'],
            "area.id" => ['required', 'gt:0'],
            "area.area" => ['required', 'string'],
            "locality" => ['required'],
            "locality.id" => ['required', 'gt:0'],
            "locality.locality" => ['required', 'string'],
            "location" => ['required'],
            "location.id" => ['required', 'gt:0'],
            "location.location" => ['required', 'string'],
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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'restaurantOutletName.required' => 'Restaurant outlet name is required',
            'area.required' => 'Area is required',
            'area.gt' => 'Area is required',
            'locality.required' => 'Locality is required',
            'locality.gt' => 'Locality is required',
            'location.required' => 'Location is required',
            'location.gt' => 'Location is required',
            'addressLongitude.required' => 'Click your address on the map',
            'addressLatitude.required' => 'Click your address on the map',
            
        ];
    }
}
