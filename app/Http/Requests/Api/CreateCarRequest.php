<?php

namespace App\Http\Requests\Api;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'price' => ['required', 'integer'],
            'old_price' => ['sometimes', 'nullable', 'integer', 'gt:price'],
            'body' => 'required',
            'body_id' => ['required', 'exists:' . CarBody::class . ',id'],
            // 'engine_id' => ['required', 'exists:' . CarEngine::class . ',id'],
            // 'class_id' => ['required', 'exists:' . CarClass::class . ',id'],
            // 'category_id' => ['sometimes', 'required', 'exists:' . Category::class . ',id'],
        ];
    }

    // public function prepareForValidation()
    // {
    //     $carEngines = CarEngine::get(['']);
    //     $carBodies = CarBody::get();
    //     $carClasses = CarClass::get();
    //     $categories = Category::get();

    //     $this->merge([
    //         'body_id' => $carBodies->random(),
    //         'class_id' =>  $carClasses->random(),
    //         'engine_id' => $carEngines->random(),
    //         'category_id' => $categories->random(),
    //     ]);
    // }
}
