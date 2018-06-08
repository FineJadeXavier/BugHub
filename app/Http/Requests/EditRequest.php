<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'nickname' => 'required|min:2|max:15',
            'email' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => '昵称不能为空！',
            'nickname.min' => '昵称不能小于2个字符！',
            'nickname.max' => '昵称不能大于15个字符！',
            'email.required' => '邮箱地址不能为空！',
            'email.max' => '你的邮箱地址真的大于50个字符嘛？',
        ];
    }
}
