@props(['salons'])
<div data-slick-carousel class="py-8 px-4 mx-auto max-w-screen-xl text-center z-10 relative">
    @foreach($salons as $salon)
        <div class="relative banner">
            <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="{{ $salon->image }}" alt="" title="">
                <div class="flex">
                    <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                        <h2 class="text-gray-200 italic text-2xl sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">{{ $salon->name }}</h2>
                    </div>
                    <p class="font-bold text-2xl text-orange">{{ $salon->address }}</p>
                    <div class="ml-4 block">
                        <div class="mt-2">
                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input
                                        type="radio"
                                        name="salon_id"
                                        class="border-gray-300 rounded text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                                        value="{{ $salon->id }}"
                                        @checked(old('salon_id') == $salon->id)
                                    >
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
