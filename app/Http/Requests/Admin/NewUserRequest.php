<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يرجى إدخال الاسم',
            'email.unique' => 'البريد الالكتروني مستخدم من قبل شخص آخر',
            'email.required' => 'يرجى إدخال البريد الالكتروني',
            'email.email' => 'يرجى إدخال بريد الكتروني صالح',
            'password.required' => 'يرجى إدخال كلمة المرور',
        ];
    }
}
