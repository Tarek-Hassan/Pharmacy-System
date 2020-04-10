<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            //
            'name' => [ 'string', 'max:255'],
            'password' => [ 'string', 'min:8', 'confirmed'],
            // 'profile_pic'=>['required'],
            'profile_pic.*'=>[ 'image|mimes:jpeg,jpg']
        ];
    }
}
