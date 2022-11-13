@props([
    'article'
])

<x-addArticleForm.input.group for="title" nameTitle="Название новости" error="{{ $errors->first('title') }}">
    <x-addArticleForm.input.text id="title" name="title" type="text" value="{{ old('title', $article->title) }}" error="{{ $errors->first('title') }}"/>
</x-addArticleForm.input.group>

<x-addArticleForm.input.group for="description" nameTitle="Описание новости" error="{{ $errors->first('description') }}">
    <x-addArticleForm.input.text id="description" name="description" type="text" value="{{ old('description', $article->description) }}" error="{{ $errors->first('description') }}"/>
</x-addArticleForm.input.group>

<x-addArticleForm.input.group for="body" nameTitle="Детальное описание" error="{{ $errors->first('body') }}">
    <x-addArticleForm.input.textarea id="body" name="body" type="textarea" error="{{ $errors->first('body') }}" value="{{ old('body', $article->body) }}"/>
</x-addArticleForm.input.group>

<div class="block">
    <x-addArticleForm.input.checkbox id="is_published" name="is_published" type="checkbox" checked="{{ old('is_published', $article->published_at) }}"/>
</div>

<x-addArticleForm.input.group for="tags" nameTitle="Теги новости">
    <x-addArticleForm.input.text id="tags" name="tags" type="text" value="{{ old('tags', $article->tags->pluck('name')->implode(',')) }}" error="{{ $errors->first('tags') }}"/>
</x-addArticleForm.input.group>

<div class="block">
    <span class="ml-2">Основное изображение</span>
    <label class="inline-flex items-center cursor-pointer">
        <input type="file" name="image">
    </label>
</div>

