@props(['allArticles'])

@foreach ($allArticles as $article)
    <x-panels.article :article="$article" class="px-4 leading-normal"/>
@endforeach