<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
            'name' => 'required|unique:area|min:3',
            'address' => 'required|unique:area|min:3',
    ];
    }
    public function messages()
    {
        return [
            'name.min'=>'AREA_NAME SHOULD BE MORE THAN 3 CHAR',
            'name.required'=>'AREA_NAME IS REQUIRED (NOT EMPTY)',
            'name.unique'=>'AREA_NAME SHOULD BE UNIQUE',

            'address.min'=>'AREA_ADDRESS SHOULD BE MORE THAN 3 CHAR',
            'address.required'=>'AREA_ADDRESS IS REQUIRED (NOT EMPTY)',
            'address.unique'=>'AREA_ADDRESS SHOULD BE UNIQUE',
    

    
        ];
    }
}
