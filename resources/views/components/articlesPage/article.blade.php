@props(['article'])

<div class="w-full flex">
    <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
        <a class="block w-full h-full hover:opacity-75" href="{{ route('article', $article) }}"><img src="/assets/pictures/car_mohave_new.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
    </div>
    <div class="px-4 leading-normal">
        <div class="mb-8 space-y-2">
            <div class="text-black font-bold text-xl">
                <a class="hover:text-orange" href="{{ route('article', $article) }}">{{ $article->title }}</a>
            </div>
            <p class="text-gray-600 text-base">
                <a class="hover:text-orange" href="{{ route('article', $article) }}">{{ $article->description }}</a>
            </p>
            <div>
                <span class="text-sm text-white italic rounded bg-orange px-2">Парадигма</span>
                <span class="text-sm text-white italic rounded bg-orange px-2">Архетип</span>
                <span class="text-sm text-white italic rounded bg-orange px-2">Киа Seed</span>
            </div>
            <div class="flex items-center">
                <p class="text-sm text-gray-400 italic">@isset($article->published_at) {{ $article->published_at->format('d M Y') }} @else {{ "" }} @endisset</p>
            </div>
        </div>
    </div>
</div>
