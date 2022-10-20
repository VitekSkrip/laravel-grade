<x-addArticleForm.input.group for="title" nameTitle="Название новости" error="{{ $errors->first('title') }}">
    <x-addArticleForm.input.text id="title" name="title" type="text" value="{{ old('title') }}" error="{{ $errors->first('title') }}"/>
</x-addArticleForm.input.group>

<x-addArticleForm.input.group for="description" nameTitle="Описание новости" error="{{ $errors->first('description') }}">
    <x-addArticleForm.input.text id="description" name="description" type="text" value="{{ old('description') }}" error="{{ $errors->first('description') }}"/>
</x-addArticleForm.input.group>

<x-addArticleForm.input.group for="body" nameTitle="Детальное описание" error="{{ $errors->first('body') }}">
    <x-addArticleForm.input.textarea id="body" name="body" type="textarea" error="{{ $errors->first('body') }}" value="{{ old('body') }}"/>
</x-addArticleForm.input.group>

<div class="block">
    <x-addArticleForm.input.checkbox id="is_published" name="is_published" type="checkbox" checked="{{ old('is_published') }}"/>
</div>
