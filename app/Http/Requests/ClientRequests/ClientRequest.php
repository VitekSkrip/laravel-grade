<?php

namespace App\Http\Requests\ClientRequests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'nullable',
            'client_name' => 'required',
            'client_phone' => ['required', 'max:11', 'min:11'],
            'more_info' => 'nullable',
            'status' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'client_name.required' => 'Имя должно быть заполнено',
            'client_phone.required' => 'Номер телефона должен быть заполнен',
            'client_phone.numeric' => 'Некорректный номер телефона',
            'client_phone.max' => 'Некорректный номер телефона',
        ];
    }
}
