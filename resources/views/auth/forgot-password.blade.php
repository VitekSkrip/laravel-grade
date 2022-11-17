@extends('layouts.inner')

@section('page-title', 'Восстановление пароля')
@section('title', 'Восстановление пароля')

@section('inner-content')

    <x-addArticleForm.result.errors/>

    <x-addArticleForm.form method="POST" action="{{ route('password.email') }}">

        <x-addArticleForm.input.group for="email" nameTitle="Email" error="{{ $errors->first('email') }}">
            <x-addArticleForm.input.text id="email" name="email" type="email" placeholder="example@example.com" value="{{ old('email') }}" required autofocus error="{{ $errors->first('email') }}"/>
        </x-addArticleForm.input.group>

        <div class="space-x-4">
            <x-addArticleForm.buttons.submit>
                Отправить ссылку на сброс пароля
            </x-addArticleForm.buttons.submit>
        </div>

    </x-addArticleForm.form>
@endsection
