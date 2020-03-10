<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'      => 'required|min:2|unique:categories,name',

        ];
    }
    public function messages(){
        return [
            'name.required'     => 'Chủ đề không được để trống',
            'name.min'          => 'Chủ đề quá ngắn',
            'name.unique'       => 'Chủ đề đã tồn tại'
        ];
    }
}
