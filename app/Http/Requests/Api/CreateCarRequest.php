<?php

namespace App\Http\Requests\Api;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => ['required', 'integer'],
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
            'categories.*' => ['sometimes', 'required', 'exists:' . Category::class . ',id'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_new' => $this->has('is_new'),
        ]);
    }
}
