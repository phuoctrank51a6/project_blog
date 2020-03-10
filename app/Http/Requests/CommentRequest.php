<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'title'      => 'required|min:2',
            'content'     => 'required|min:10',
        ];
    }
    public function messages(){
        return [
            'title.required'     => 'Tiêu đề không được để trống',
            'title.min'          => 'Tiêu đề quá ngắn',
            'content.required'    => 'Nội dung không được để trống',
            'content.min'       => 'Nội dung ít nhất 10 ký tự',
        ];
    }
}
