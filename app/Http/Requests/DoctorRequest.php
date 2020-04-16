<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required|min:3',
            'national_id' => 'required|min:3',
    ];
    }
    public function messages()
    {
        return [
            'name.min'=>'doctor_name SHOULD BE MORE THAN 3 CHAR',
            'name.required'=>'doctor_name IS REQUIRED (NOT EMPTY)',
            

            
            'email.required'=>'email IS REQUIRED (NOT EMPTY)',
            'email.unique'=>'email SHOULD BE UNIQUE',

            'password.min'=>'password SHOULD BE MORE THAN 3 CHAR',
            'password.required'=>'password IS REQUIRED (NOT EMPTY)',

            'national_id.min'=>'national_id SHOULD BE MORE THAN 3 CHAR',
            'national_id.required'=>'national_id IS REQUIRED (NOT EMPTY)',
    

    
        ];
    }
}
