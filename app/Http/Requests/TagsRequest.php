<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // dd($this->get('tags'));
        $tags = collect(explode(',', $this->get('tags')));
        $tags = $tags
           ->map(fn ($item) => preg_replace('/[^\w\-_]+/u', '', $item))
           ->filter(fn ($item) => !empty($item))
        ;
        $this->merge(['tags' => $tags]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        ];
    }
}
