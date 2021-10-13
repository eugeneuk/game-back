<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
            'oldpassword' => 'required',
            'password' => 'required|min:3|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'oldpassword.required' => 'We need your old password to continue.',
            'password.required' => 'We need new password.',
            'password.confirmed' => 'Password do not match.',
        ];
    }
}
