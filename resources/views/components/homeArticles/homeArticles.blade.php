@props(['homeNews'])
<div class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
    @foreach ($homeNews as $article)
        <x-homeArticles.homeArticle :article="$article"/>
    @endforeach
</div>
