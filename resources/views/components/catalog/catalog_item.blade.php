@props(['car'])
<div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
    <a class="block w-full h-40" href="{{ route('product', $car) }}">
        <img class="w-full h-full hover:opacity-90 object-cover" src="{{ $car->imageUrl }}" alt="{{ $car->name }}">
    </a>
    <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
        <div class="px-6 py-4">
            <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="{{ route('product', $car) }}">{{ $car->name }}</a></div>
            <p class="text-grey-darker text-base">
                <span class="inline-block"><x-price :price="$car->price" /></span>
                @isset ($car->old_price)
                    <span class="inline-block line-through pl-6 text-gray-400"><x-price :price="$car->old_price" /></span>
                @endisset
            </p>
        </div>
        <form action="{{ route('basket.addProduct') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="product_id" value="{{ $car->id }}">
            <button class="font-medium text-red-600 text-red-500 w-5 self-end active:bg-red-700">
                <svg aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
        </form>
    </div>
</div>

