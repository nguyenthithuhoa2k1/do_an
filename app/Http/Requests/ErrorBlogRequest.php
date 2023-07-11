<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title_blog'=>'required|max:255',
            'image_blog'=>'mimes:jpeg,jpg,png|max:50240',
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attributes not null',
            'title_blog.max'=>':attributes quá 255 kí tự',
            'image_blog.max'=>':attributes quá 5M',
            'mimes'=>':attributes khong phai file anh',
        ];
    }
}
