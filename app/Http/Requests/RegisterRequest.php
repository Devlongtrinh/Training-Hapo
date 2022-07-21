<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'user_name' => 'required|regex:/^\S.*\S$/|alpha_dash|max:50',
            'email' => 'required|regex:/^\S.*\S$/|email|max:50',
            'password' =>'required|regex:/^\S.*\S$/|min:6',
            'confirm_password' => 'required|regex:/^\S.*\S$/|required_with:password|same:pass',
        ];
    }
}
