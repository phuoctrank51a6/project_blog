<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'      => 'required|min:2|unique:posts,title',
            'content'     => 'required|min:100',
            'image'         => 'image',
        ];
    }
    public function messages(){
        return [
            'title.required'     => 'tiêu đề không được để trống',
            'title.min'          => 'tiêu đề quá ngắn',
            'title.unique'      =>  'Tiêu đề đã tồn tại',
            'content.required'    => 'Nội dung không được để trống',
            'content.min'       => 'Nội dung ít nhất 100 ký tự',
            'image.image'      => 'Ảnh không đúng định dạng',
        ];
    }
}
