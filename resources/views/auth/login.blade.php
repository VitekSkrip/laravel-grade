@extends('layouts.inner')

@section('page-title', 'Авторизация')
@section('title', 'Авторизация')

@section('inner-content')

    @if (session('status'))
        <x-addArticleForm.result.success :message="(array)session('status')"/>
    @endif

    <x-addArticleForm.result.errors/>

    <x-addArticleForm.form method="POST" action="{{ route('login') }}">

        <x-addArticleForm.input.group for="email" nameTitle="Email" error="{{ $errors->first('email') }}">
            <x-addArticleForm.input.text id="email" name="email" type="email" placeholder="example@example.com" value="{{ old('email') }}" required autofocus error="{{ $errors->first('email') }}"/>
        </x-addArticleForm.input.group>

        <x-addArticleForm.input.group for="password" nameTitle="Пароль" error="{{ $errors->first('password') }}">
            <x-addArticleForm.input.text id="password" name="password" type="password" value="{{ old('password') }}" required error="{{ $errors->first('password') }}"/>
        </x-addArticleForm.input.group>

        <div class="space-x-4">
            <x-addArticleForm.buttons.submit>
                Войти
            </x-addArticleForm.buttons.submit>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
            @endif
        </div>

    </x-addArticleForm.form>
    
@endsection
