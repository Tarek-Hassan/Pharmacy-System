<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyResquest extends FormRequest
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
            'pharmacy_name' => 'required|unique:pharmacies',
            'email' => 'required|unique:pharmacies|email',
            'national_id' => 'required',
            'address_id' => 'required',
            'priority' => 'required',
            'password'=>'required|min:6|',
            'img'=>'mimes:jpeg,jpg',

        ];
    }

    public function messages()
    {
        return [
            'pharmacy_name.required' => 'Please enter the pharmacy name ',
            'pharmacy_name.unique' => 'Sorry,This name is already exist!',
            'email.required' => 'Please Fill out This Field!',
            'email.unique' => 'Sorry,This Email is already exist!',
            'email.email' => 'Please enter a valid Email',
            'password.required' => 'Please Fill out This Field!',
            'password.min' => 'Your password is too short',
             'national_id'=>'Please Fill out This Field!',
             'img'=>'Uploaded file is not a valid image. Only JPG and JPEG  files are allowed'
          
           ]; 
    } 
}
