<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'age' => 'numeric',
            'date' =>'string',
            'phone' => 'numeric',
            'web' =>'string',
            'adress' => 'string'
        ];
    }
    public function messages()
    {
        return [
            'name.string' =>'Vui long nhap ten cho dung',
            'age.numeric' => 'Vui long nhap tuoi dung',
            'date.string' => 'Vui long nhap lai ngay thang',
            'phone.numeric' => 'Vui long nhap dung so dien thoai',
            'web.string' => 'VUi long nhap dung duong dan',
            'adress' => 'Vui long nhap dia chi cho dung'
        ];
    }
}   
