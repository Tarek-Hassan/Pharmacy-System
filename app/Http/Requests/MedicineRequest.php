<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            'medicine_name' => 'required|min:3',
            'type' => 'required|min:3',
    ];
    }
    public function messages()
    {
        return [
            'medicine_name.min'=>'Medicine_Name SHOULD BE MORE THAN 3 CHAR',
            'medicine_name.required'=>'Medicine_Name IS REQUIRED (NOT EMPTY)',
            'medicine_name.unique'=>'Medicine_Name SHOULD BE UNIQUE',

            'type.min'=>'Type SHOULD BE MORE THAN 3 CHAR',
            'type.required'=>'Type IS REQUIRED (NOT EMPTY)',
            'type.unique'=>'Type SHOULD BE UNIQUE',
    

    
        ];
    }
 
}
