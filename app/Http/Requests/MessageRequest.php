<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => 'required|max:255', 
            'mobile' => 'required|max:255', 
            'email' => 'required|max:255', 
            'content' => 'required|max:500', 
            'interest' => 'required', 
            'area' => 'required', 
        ];
    }

    public function message()
    {
        return [
            'name.required' => '请输入姓名', 
            'mobile.required' => '请输入电话', 
            'email.required' => '请输入邮箱', 
            'content.required' => '请输入留言内容', 
            'content.max' => '留言过长，不能超过500个字', 
            'interest.required' => '请选择感兴趣的产品', 
            'area.required' => '请选择应用领域', 
        ];
    }
}
