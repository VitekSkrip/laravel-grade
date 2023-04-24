<?php

namespace App\Http\Requests;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required|integer',
            'old_price' => ['sometimes', 'nullable', 'integer', 'gt:price'],
            'description' => '',
            'salon' => '',
            'kpp' => '',
            'year' => '',
            'color' => '',
            'is_new' => 'boolean',
            'engine_id' => ['required', 'exists:' . CarEngine::class . ',id'],
            'class_id' => ['required', 'exists:' . CarClass::class . ',id'],
            'body_id' => ['required', 'exists:' . CarBody::class . ',id'],
            'categories' => ['required'],
            'image' => ['sometimes', 'nullable', 'image'],
            'images.*' => ['image']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название модели должно быть заполнено',
        ];
    }

    public function attributes(): array
    {
        return [
            'price' => 'цена',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_new' => $this->has('is_new'),
        ]);
    }
}
