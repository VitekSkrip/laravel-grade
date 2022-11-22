@component('mail::message')

# Была обновлена новость c ID {{ $article->id }}

@component('mail::button', ['url' => route('articles.show', $article, true)])
    Перейти
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
