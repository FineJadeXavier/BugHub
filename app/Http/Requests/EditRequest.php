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
            'node_name'=>'required',
            'content'=>'required|min:10',
            'title' => 'required|min:5|max:30',
        ];
    }

    public function messages()
    {
        return [
            'node_name.required' => '请选择一个类别！',
            'content.required' => '内容不能为空！',
            'title.required' => "标题不能为空！",

            'title.min' => '标题字数太少！',
            'title.max' => '标题字数太多！',

            'content.min' => '内容字数太少！',
        ];
    }
}
