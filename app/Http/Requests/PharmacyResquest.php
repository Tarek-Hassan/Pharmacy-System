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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pharmacy_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'national_id' => 'required',
            'address_id' => 'required',
            'priority' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pharmacy_name.required' => 'Please enter the pharmacy name ',
            'email.required' => 'Please enter the email field',
            'email.email:rfc,dns' => 'Please enter a valid email address',
          
           ]; 
    } 
}
