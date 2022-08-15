<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'course_id' => 'required|integer',
            'comment' => 'required',
            'rate' => 'required|integer|between:1,5',
        ];
    }

    public function attributes()
    {
        return [
            'course_id' => __('artribute.course_id'),
            'comment' => __('artribute.comment'),
            'rate' => __('artribute.Rate'),
        ];
    }
}
