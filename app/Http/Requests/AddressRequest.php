<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'street_name'=>'required|min:3',
            'building_number'=>'required|numeric',
            'floor_number'=>'required|numeric',
            'flat_number'=>'required|numeric',
            'is_main'=>'required|boolean',
            'user_id'=>'required'
    ];
    }
    public function messages()
    {
        return [
            'street_name.min'=>'Street Name SHOULD BE MORE THAN 3 CHAR',
            'street_name.required'=>'Street Name IS REQUIRED (NOT EMPTY)',

            'building_number.numeric'=>'Building Number SHOULD BE NUMERIC',
            'building_number.required'=>'Building Number IS REQUIRED (NOT EMPTY)',

            'floor_number.numeric'=>'Floor Number SHOULD BE NUMERIC',
            'floor_number.required'=>'Floor Number IS REQUIRED (NOT EMPTY)',

            'flat_number.numeric'=>'Flat Number SHOULD BE NUMERIC',
            'flat_number.required'=>'Flat Number IS REQUIRED (NOT EMPTY)',
        ];
    }
}
