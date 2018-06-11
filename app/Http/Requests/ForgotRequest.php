<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotRequest extends FormRequest
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
            'email' => 'required|email|max:60|exists:users,email',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '邮箱地址不能为空！',
            'email.email' => '邮箱格式不正确！',
            'email.max' => '你是真的皮！',
            'email.exists' => '邮箱不存在！',
            'captcha.required' => '验证码不能为空！',
            'captcha.captcha' => '验证码不正确！',
        ];
    }
}
