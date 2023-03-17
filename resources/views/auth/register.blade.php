@extends('layouts.auth-template')

@section('page-title', 'Регистрация')
@section('title', 'Регистрация')

@section('inner-content')

    <x-addArticleForm.result.errors/>

    <x-addArticleForm.form method="POST" action="{{ route('register') }}">

        <x-addArticleForm.input.group for="name" nameTitle="Имя" error="{{ $errors->first('name') }}">
            <x-addArticleForm.input.text id="name" name="name" type="text" placeholder="Ваше ФИО" value="{{ old('name') }}" required autofocus error="{{ $errors->first('name') }}"/>
        </x-addArticleForm.input.group>

        <x-addArticleForm.input.group for="email" nameTitle="Почта" error="{{ $errors->first('email') }}">
            <x-addArticleForm.input.text id="email" name="email" type="email" value="{{ old('email') }}" placeholder="example@example.com" required autofocus error="{{ $errors->first('email') }}"/>
        </x-addArticleForm.input.group>

        <x-addArticleForm.input.group for="password" nameTitle="Пароль" error="{{ $errors->first('password') }}">
            <x-addArticleForm.input.text id="password" name="password" type="password" value="{{ old('password') }}" placeholder="***********" required error="{{ $errors->first('password') }}"/>
        </x-addArticleForm.input.group>

        <x-addArticleForm.input.group for="password_confirmation" nameTitle="Подтверждение пароля" error="{{ $errors->first('password_confirmation') }}">
            <x-addArticleForm.input.text id="password_confirmation" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" placeholder="***********" required error="{{ $errors->first('password_confirmation') }}"/>
        </x-addArticleForm.input.group>

        <x-addArticleForm.input.group for="telegram_id" nameTitle="Telegram ID для уведомлений" hrefForMore="https://ru.botostore.com/c/getmyid_bot/?do=open_bot" error="{{ $errors->first('telegram') }}">
            <x-addArticleForm.input.text id="telegram_id" name="telegram_id" type="text" placeholder="Ваш Telegram ID - это набор цифр" value="{{ old('telegram_id') }}" autofocus error="{{ $errors->first('telegram_id') }}"/>
        </x-addArticleForm.input.group>

        <div class="space-x-4">
            <x-addArticleForm.buttons.submit>
                Регистрация
            </x-addArticleForm.buttons.submit>

            @if (Route::has('password.request'))
               <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                   Уже зарегистрированы?
               </a>
           @endif
        </div>

    </x-addArticleForm.form>

@endsection
