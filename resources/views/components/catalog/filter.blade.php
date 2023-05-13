@props(['currentCategory', 'filterValues'])
<form {{ $attributes->merge(['class' => 'border rounded p-4 space-y-4']) }}>
    <div class="block sm:flex space-y-2 sm:space-y-0 sm:space-x-4 w-full">
        <x-forms.groups.filter-group for="fieldFilterName">
            <x-slot:label>Модель:</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterName"
                name="model"
                value="{{ $filterValues->getModel() }}"
                placeholder=""
            />
        </x-forms.groups.filter-group>
        <x-forms.groups.filter-group for="fieldFilterPriceFrom">
            <x-slot:label>Цена от:</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterPriceFrom"
                name="min_price"
                value="{{ $filterValues->getMinPrice() ?: '' }}"
                placeholder=""
            />
        </x-forms.groups.filter-group>
        <x-forms.groups.filter-group for="fieldFilterPriceTo">
            <x-slot:label>Цена до:</x-slot:label>
            <x-forms.inputs.text
                id="fieldFilterPriceTo"
                name="max_price"
                value="{{ $filterValues->getMaxPrice() ?: '' }}"
                placeholder=""
            />
        </x-forms.groups.filter-group>
        <div class="flex space-x-2 items-center">
            <x-forms.submit-button>
                <x-icons.search class="h-4 w-4" />
            </x-forms.submit-button>
            <x-forms.cancel-button href="{{ route('catalog', ['slug' => $currentCategory]) }}">
                <x-icons.x class="h-4 w-4" />
            </x-forms.cancel-button>
        </div>
    </div>
    <hr>
    <div class="flex space-x-2 items-center">
        <div class="font-bold">Сортировать по:</div>
        <x-catalog.sort-button name="order_price" :current-value="$filterValues->getOrderPrice()">Цене</x-catalog.sort-button>
        <x-catalog.sort-button name="order_model" :current-value="$filterValues->getOrderModel()">Модели</x-catalog.sort-button>
    </div>
</form>