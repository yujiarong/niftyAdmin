<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ];
    }

   public function messages()
    {
        return [
            'name.required'  => '用户名不能为空',
            'email.required' => '邮箱不能为空',
            'email.unique'   => '此邮箱已近存在',
            'password.required' => '密码不能为空',
        ];
    }

}
