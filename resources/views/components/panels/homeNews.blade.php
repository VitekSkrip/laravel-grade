@props(['homeNews'])
<div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
    @foreach ($homeNews as $article)
        <x-panels.homeArticle :article="$article"/>
    @endforeach
</div>