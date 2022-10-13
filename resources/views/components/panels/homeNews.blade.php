@props(['homeNews'])
<div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
    @foreach ($homeNews as $article)
        <x-panels.article :article="$article" class="px-4 flex flex-col justify-between leading-normal"/>
    @endforeach
</div>