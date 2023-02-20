@extends('layouts.inner')

@section('page-title', 'Сброс пароля')
@section('title', 'Сброс пароля')

@section('inner-content')

    <x-addArticleForm.result.errors/>

    <x-addArticleForm.form method="POST" action="{{ route('password.update') }}">

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <x-addArticleForm.input.group for="email" nameTitle="Email" error="{{ $errors->first('email') }}">
            <x-addArticleForm.input.text id="email" name="email" type="email" placeholder="example@example.com" value="{{ old('email') }}" required autofocus error="{{ $errors->first('email') }}"/>
        </x-addArticleForm.input.group>

        <x-addArticleForm.input.group for="password" nameTitle="Пароль" error="{{ $errors->first('password') }}">
            <x-addArticleForm.input.text id="password" name="password" type="password" value="{{ old('password') }}" required error="{{ $errors->first('password') }}"/>
        </x-addArticleForm.input.group>

        <div class="space-x-4">
            <x-addArticleForm.buttons.submit>
                Сбросить пароль
            </x-addArticleForm.buttons.submit>
        </div>

    </x-addArticleForm.form>
@endsection
