@props([
    'nameTitle',
    'error' => null,
    'hrefForMore' => null
])

<div class="block">
    <label {{ $attributes }} class="text-gray-700 font-bold">{{ $nameTitle }}</label>

    @if(! empty($hrefForMore))
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ $hrefForMore }}">
            Узнать ID
        </a>
    @endif

    {{ $slot }}

    @if (! empty($error))
        <span class="text-xs italic text-red-600">{{ $error }}</span>
    @endif
</div>
