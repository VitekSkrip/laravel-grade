@component('mail::message')

# Была создана новость

{{ $article->title}}

@component('mail::button', ['url' => route('articles.show', $article, true)])
    Перейти
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
