<?php

namespace App\Http\Requests\Auth;

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
            'name' => 'required|alpha',
            'login' => 'required|alpha|unique:users,login',
            'password' => 'required|min:8'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле Имя обязательно для заполнения',
            'name.alpha' => 'Поле Имя не должно содержать спецсимволы',
            'login.required' => 'Поле Логин обязательно для заполнения',
            'login.alpha' => 'Поле Логин не должно содержать спецсимволы',
            'password.required' => 'Поле Пароль обязательно для заполнения',
            'password.min' => 'Минимальный размер пароля 8 символов'
        ];
    }
}
