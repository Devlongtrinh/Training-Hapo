<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'user_name' => 'required|max:50|alpha_dash',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('message_vi.user_name_required'),
            'user_name.max' => __('message_vi.user_name_max'),
            'user_name.alpha_dash' => __('message_vi.user_name_alpha_dash'),
            'password.required' => __('message_vi.password_required'),
            'password.min' => __('message_vi.password_min'),
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'Tên tài khoản',
            'password' => 'Mật khẩu',
        ];
    }
}
