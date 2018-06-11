<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'nickname'=>'required|regex:/^[a-zA-Z\x4e00-\x9fa5_]{3,15}/u|unique:users',
            'password'=>'required|min:6|max:20',
            'email' => 'required|regex:/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => '昵称不能为空！',
            'nickname.regex' => '昵称不符合要求！',
            'nickname.unique' => '昵称已经存在！',
            'password.required' => '密码不能为空！',
            'password.min' => '密码不能小于6个字符！',
            'password.max' => '密码不能大于20个字符！',
            'email.required' => "邮箱必填！",
            'email.regex' => "邮箱格式错误！",
            'email.unique' => '该邮箱被绑定过了！',
        ];
    }
}
