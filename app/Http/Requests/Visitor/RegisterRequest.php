<?php

namespace App\Http\Requests\Visitor;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string',
            'email' => 'required|email|unique:visitors',
            'position' => 'required|string',
            'organization' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'يرجى إدخال الاسم',
            'email.unique' => 'البريد الالكتروني مستخدم من قبل شخص آخر',
            'email.required' => 'يرجى إدخال البريد الالكتروني',
            'email.email' => 'يرجى إدخال بريد الكتروني صالح',
            'position.required' => 'يرجى إدخال المنصب',
            'organization.required' => 'يرجى إدخال الجهة',
            'image.required' => 'يرجى رفع الصورة الشخصية',
        ];
    }
}
