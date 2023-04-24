<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

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
        return [
                'title' => 'required|min:5|max:100',
                'description' => 'required|max:255',
                'body' => 'required',
                'slug' => ['required', Rule::unique(Article::class)->ignore($this->slug)],
                'published_at' => 'nullable',
                'image' => 'required|image',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Заголовок новости должен быть заполнен',
            'description.required' => 'Краткое описание новости должно быть заполнено',
            'body.required' => 'Содержание новости должно быть заполнено',
            'image.required' => 'Превью новости должно быть загружено',
            'image.image' => 'Превью новости должно быть изображением'
        ];
    }
}
