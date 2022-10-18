@props(['allArticles'])

@foreach ($allArticles as $article)
    <x-articlesPage.article :article="$article"/>
@endforeach
