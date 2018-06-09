<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPWDRequest extends FormRequest
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
            'password_current' => 'required|min:6|max:20',
            'password' => 'required|min:6|max:20',
            'password_again' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'password_current.required' => '当前密码不能为空！',
            'password_current.min' => '正确输入当前密码！',
            'password_current.max' => '正确输入当前密码！',
            'password.required' => '新密码不能为空！',
            'password.min' => '新密码不能小于6位字符！',
            'password.max' => '新密码不能大于20位字符！',
            'password_again.same' => '再次输入不相同！',
        ];
    }
}
