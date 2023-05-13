<?php

namespace App\Http\Requests\Api;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;

class UpdateCarRequest extends CreateCarRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'name' => ['sometimes', 'required'],
            'price' => ['sometimes', 'required', 'integer'],
            'old_price' => ['sometimes', 'nullable', 'integer', 'gt:price'],
            'engine_id' => ['sometimes', 'required', 'exists:' . CarEngine::class . ',id'],
            'class_id' => ['sometimes', 'required', 'exists:' . CarClass::class . ',id'],
            'body_id' => ['sometimes', 'required', 'exists:' . CarBody::class . ',id'],
        ]);
    }
}
