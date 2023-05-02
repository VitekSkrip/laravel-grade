<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;


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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'. User::class],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'ФИО должно быть заполнено',
            'name.string' => 'ФИО должно быть строкой',
            'name.max' => 'ФИО не должно превышать 255 символов',
            'email.email' => 'Почта должна быть адрессом электронной почты',
            'email.required' => 'Почта должна быть заполнена',
            'email.string' => 'Почта должна быть строкой',
            'email.max' => 'Почта не должна превышать 255 символов',
            'email.unique' => 'Пользователь с такой почтой уже существует',
            'password.required' => 'Пароль не может быть пустым',
            'password.confirmed' => 'Подтверждение пароля не совпадает с паролем'
        ];
    }
}
