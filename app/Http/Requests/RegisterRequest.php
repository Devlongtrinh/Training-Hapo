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
            'user_name' => 'required|regex:/^\S.*\S$/|alpha_dash|max:50|unique:users',
            'email' => 'required|regex:/^\S.*\S$/|email|max:50|unique:users',
            'password' => 'required|regex:/^\S.*\S$/|min:6',
            'password_confirm' => 'required|regex:/^\S.*\S$/|required_with:password|same:password',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('message.user_name_required'),
            'user_name.alpha_dash' => __('message.user_name_alpha_dash'),
            'user_name.max' => __('message.user_name_max'),
            'user_name.unique' => __('message.user_name_unique'),
            'email.required' => __('message.email_required'),
            'email.email' => __('message.email_email'),
            'email.max' => __('message.email_max'),
            'email.unique' => __('message.email_unique'),
            'password.required' => __('message.password_required'),
            'password.min' => __('message.password_min'),
            'password_confirm.required' => __('message.password_confirmation_required'),
            'password_confirm.same' => __('message.password_confirmation_same'),
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'Tên tài khoản',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirm' => 'Xác nhận lại mật khẩu',
        ];
    }
}
