<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'      => 'require|min:2',
            'email'     => 'require|email|unique:users,email',
            'avatar'    => 'image',
            'password'  => 'require|min:5',
            // 'password_confirmation'=> 'confirmed'
        ];
    }
    public function messages(){
        return [
            'name.required'     => 'Tên không được để trống',
            'name.min'          => 'Tên quá ngắn',
            'email.require'     => 'email không được để trống',
            'email.unique'      => 'email đã tồn tại',
            'avatar.image'      => 'Ảnh không đúng định dạng',
            'password.require'  => 'Password không được để trống',
            'password.min'      => 'Mật khẩu quá ngắn',
            // 'password_confirmation.confirmed'=> 'Mật khẩu không trùng khớp'  
        ];
    }
}
