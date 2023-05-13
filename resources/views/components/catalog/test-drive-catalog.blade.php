@props(['cars'])

<div data-slick-carousel class="py-8 mx-auto max-w-screen-xl text-center z-10 relative">
    @foreach($cars as $car)
        <div class="relative banner">
            <img class="w-full h-full object-cover object-center" src="{{ $car->imageUrl }}" alt="" title="">

            <div class="flex">
                <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                    <h1 class="text-gray-100 italic sm:text-lg md:text-xl xl:text-3xl font-bold">{{ $car->name }}</h1>
                </div>
                <p class="font-bold text-2xl text-orange"><x-price :price="$car->price" /></p>
                <div class="ml-4 block">
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center cursor-pointer">
                                <input
                                    type="radio"
                                    name="car_id"
                                    class="border-gray-300 rounded text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                                    value="{{ $car->id }}"
                                    @checked(old('car_id') == $car->id)
                                >
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
