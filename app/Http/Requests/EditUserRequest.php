<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name'      => 'required|min:2',
            'email'     => 'required|email',
            'avatar'    => 'image',
            'password_confirmation'=> 'same:password'

        ];
    }
    public function messages(){
        return [
            'name.required'     => 'Tên không được để trống',
            'name.min'          => 'Tên quá ngắn',
            'email.required'    => 'email không được để trống',
            'email.email'       => 'email không đúng định dạng',
            // 'avatar.required'   => 'Bạn chưa tải ảnh lên',
            'avatar.image'      => 'Ảnh không đúng định dạng',
            'password_confirmation.same' => 'Mật khẩu không trùng khớp' 
        ];
    }
}
