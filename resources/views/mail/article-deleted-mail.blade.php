@component('mail::message')

# Была удалена новость cо slug {{ $slug }}

@component('mail::button', ['url' => route('articles.index')])
    Посмотреть все новости
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
