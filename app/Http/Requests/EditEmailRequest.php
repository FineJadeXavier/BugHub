<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEmailRequest extends FormRequest
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
            'email_current' => 'exists:users,email',
            'email' => 'required|email|unique:users',
            'email_again' => 'same:email',
        ];
    }

    public function messages()
    {
        return [
            'email_current.exists' => '验证邮箱不匹配！',
            'email.required' => '新邮箱地址已存在！',
            'email.email' => '新邮箱地址格式不正确！',
            'email.unique' => '新邮箱地址已存在！',
            'email_again.same' => '新邮箱地址不相同！',
        ];
    }
}
