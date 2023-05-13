@csrf
<x-forms.groups.group for="fieldArticleName" error="{{ $errors->first('title') }}">
    <x-slot:label>Заголовок новости</x-slot:label>
    <x-forms.inputs.text
        id="fieldArticleName"
        name="title"
        placeholder="Title"
        value="{{ old('title', $article->title) }}"
        error="{{ $errors->first('title') }}"
    />
</x-forms.groups.group>

<x-forms.groups.checkbox-group error="{{ $errors->first('is_published') }}">
    <x-slot:label>Опубликовано</x-slot:label>
    <x-forms.inputs.checkbox
        name="is_published"
        :checked="old('is_published', $article->published_at)"
    />
</x-forms.groups.checkbox-group>

<x-forms.groups.group for="fieldArticlePreviewImage" error="{{ $errors->first('image') }}">
    <x-slot:label>Превью новости</x-slot:label>
    <x-forms.inputs.one-file
        id="fieldArticlePreviewImage"
        name="image"
        value="{{ $article->imageUrl }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldArticleDescription" error="{{ $errors->first('description') }}">
    <x-slot:label>Краткое описание</x-slot:label>
    <x-forms.inputs.textarea
        id="fieldArticleDescription"
        name="description"
        :value="old('description', $article->description)"
        error="{{ $errors->first('description') }}"
        placeholder="Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldArticleBody" error="{{ $errors->first('body') }}">
    <x-slot:label>Содержание новости</x-slot:label>
    <x-forms.inputs.textarea
        id="fieldArticleBody"
        name="body"
        placeholder="Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку"
        :value="old('body', $article->body)"
        error="{{ $errors->first('body') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="fieldArticleTags" error="{{ $errors->first('tags') }}">
    <x-slot:label>Теги</x-slot:label>
    <x-forms.inputs.text
        id="fieldArticleTags"
        name="tags"
        placeholder="Парадигма, Архетип, Киа Seed"
        value="{{ old('tags', $article->tags->pluck('name')->implode(',')) }}"
        error="{{ $errors->first('tags') }}"
    />
</x-forms.groups.group>

