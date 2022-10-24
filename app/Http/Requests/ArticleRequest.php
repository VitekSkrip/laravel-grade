<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleRequest extends FormRequest
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
        $this->merge([
            'slug' => Str::slug($this->title),
            'published_at' => $this->is_published ? Carbon::now() : null
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->article->id ?? '';

        return [
                'title' => 'required|min:5|max:100',
                'description' => 'required|max:255',
                'body' => 'required',
                'slug' => "required|unique:articles,slug,{$id}",
                'published_at' => 'nullable'
        ];
    }
}
