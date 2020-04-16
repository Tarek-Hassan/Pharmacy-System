<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'delivery_address' => 'required|min:3',
            'quantity' => 'required',
            
    ];
    }
    public function messages()
    {
        return [
            'delivery_address.min'=>'delivery_address SHOULD BE MORE THAN 3 CHAR',
            'delivery_address.required'=>'AREA_NAME IS REQUIRED (NOT EMPTY)',

            
            'quantity.required'=>'password IS REQUIRED (NOT EMPTY)',

          
    

    
        ];
    }
}
