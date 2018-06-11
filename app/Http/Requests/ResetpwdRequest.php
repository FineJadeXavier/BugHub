<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetpwdRequest extends FormRequest
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
            'password'=>'required|min:6|max:20',
            'password_again' => 'same:password',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => '密码不能为空！',
            'password.min' => '密码不能小于6个字符！',
            'password.max' => '密码不能大于20个字符！',
            'password_again.same' => '再次输入不相同！',
            'captcha.required' => '验证码不能为空！',
            'captcha.captcha' => '验证码不正确！',
        ];
    }
}
