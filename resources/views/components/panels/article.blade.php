@props(['article'])
<div class="w-full flex">
    <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
        <a class="block w-full h-full hover:opacity-75" href="article.html"><img src="assets/pictures/car_ceed.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
    </div>
    <div {{ $attributes }} >
        <div class="mb-8">
            <x-panels.articleElements.title :title="$article->title"/>

            <x-panels.articleElements.description :description="$article->description"/>
        </div>
        <div>
            <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
        </div>

        <x-panels.articleElements.published :published="$article->published_at"/>

    </div>
</div>
