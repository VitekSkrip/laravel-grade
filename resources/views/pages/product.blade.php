<x-layouts.app>
    <x-slot name="title">{{ $product->name }}</x-slot>

    @section('page-title', $product->name)

    {{ Breadcrumbs::setCurrentRoute('product', $product) }}

    <div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
        <div class="col-span-3 border-r-0 sm:border-r pb-4 pr-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
            <div class="mb-4 border rounded" data-slick-carousel-detail-items>
                <img class="w-full" src="{{ $product->imageUrl }}" alt="{{ $product->name }}">
                @foreach ($product->images as $image)
                    <img class="w-full" src="{{ $image->url }}" alt="{{ $product->name }}">
                @endforeach
            </div>
            <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
            </div>
        </div>
        <div class="col-span-1 lg:col-span-2">
            <div class="space-y-4 w-full">
                <div class="block px-4">
                    <p class="font-bold">Модель: {{ $product->name }}</p>

                    <p class="font-bold">Цена:</p>
                    @isset ($product->old_price)
                        <p class="text-base line-through text-gray-400"><x-price :price="$product->old_price" /></p>
                    @endisset
                    <p class="font-bold text-2xl text-orange"><x-price :price="$product->price" /></p>
                    @isset ($product->discount_sum)
                        <p>Ваша выгода: <span class="font-bold text-2xl text-orange"><x-price :price="$product->discount_sum" /></span></p>
                    @endif
                    <div class="mt-4 block">
                        <form method="POST" action="{{ route('basket.addProduct') }}">
                            @csrf
                            @method('POST')
                            <x-forms.inputs.text type="hidden" name="product_id" value="{{ $product->id }}"/>
                            <x-forms.submit-button>
                                <x-icons.basket class="inline-block h-6 w-6 mr-2" />
                                Добавить в избранное
                            </x-forms.submit-button>
                            <x-panels.messages.flashes />
                        </form>
                    </div>
                </div>
                <x-panels.accordion :active="true">
                    <x-slot:label>Параметры</x-slot:label>
                    <x-catalog.detail-product-props>
                        <x-catalog.detail-product-props-row>
                            <x-slot:title>Салон</x-slot:title>
                            {{ $product->salon }}
                        </x-catalog.detail-product-props-row>
                        <x-catalog.detail-product-props-row>
                            <x-slot:title>Класс</x-slot:title>
                            {{ $product->carClass->name }}
                        </x-catalog.detail-product-props-row>
                        <x-catalog.detail-product-props-row>
                            <x-slot:title>КПП</x-slot:title>
                            {{ $product->kpp }}
                        </x-catalog.detail-product-props-row>
                        <x-catalog.detail-product-props-row>
                            <x-slot:title>Год выпуска</x-slot:title>
                            {{ $product->year }}
                        </x-catalog.detail-product-props-row>
                        <x-catalog.detail-product-props-row>
                            <x-slot:title>Цвет</x-slot:title>
                            {{ $product->color }}
                        </x-catalog.detail-product-props-row>
                        <x-catalog.detail-product-props-row>
                            <x-slot:title>Кузов</x-slot:title>
                            {{ $product->body->name }}
                        </x-catalog.detail-product-props-row>
                        <x-catalog.detail-product-props-row>
                            <x-slot:title>Двигатель</x-slot:title>
                            {{ $product->engine->name }}
                        </x-catalog.detail-product-props-row>
                        @if ($product->tags->isNotEmpty())
                        <x-catalog.detail-product-props-row>
                            <x-slot:title>Теги</x-slot:title>
                            <x-panels.tags :tags="$product->tags"/>
                        </x-catalog.detail-product-props-row>
                        @endif
                    </x-catalog.detail-product-props>
                </x-panels.accordion>
                <x-panels.accordion>
                    <x-slot:label>Описание</x-slot:label>
                    <div class="space-y-4">
                        {!! $product->description !!}
                    </div>
                </x-panels.accordion>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function () {
                $('[data-slick-carousel-detail]').each(function () {
                    let $productousel = $(this);

                    $productousel.find('[data-slick-carousel-detail-items]').slick({
                        dots: true,
                        arrows: false,
                        appendDots: $productousel.find('[data-slick-carousel-detail-pager]'),
                        rows: 0,
                        customPaging: function (slick, index) {
                            let imageSrc = slick.$slides[index].src;

                            return `
    <div class="relative">
    <x-icons.chevron-up class="active-arrow absolute -top-6 left-2/4 -ml-3 text-orange h-6 w-6" />
    <span class="inline-block border rounded cursor-pointer"><img class="h-20 w-40 object-cover" src="${imageSrc}" alt="" title=""></span>
    </div>`;
                        }
                    })
                })
            })
        </script>
    @endpush
</x-layouts.app>
