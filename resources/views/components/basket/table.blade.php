@props([
    'basketProducts',
    'totalCost',
    'totalQuantity'
])
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 text-gray-400">
        <tbody>
        @foreach($basketProducts as $product)
            <x-basket.element :product="$product"/>
        @endforeach
        </tbody>
    </table>
</div>
<div class="pt-3 flex items-center justify-between">
    <form method="POST" action="{{ route('orders.create') }}">
        @csrf
        @method('POST')
        <input type="hidden" name="total_cost" value="{{ $totalCost }}">
        <input type="hidden" name="total_quantity" value="{{ $totalQuantity }}">

        <button class="bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
            Оформить предоплату
        </button>
    </form>
</div>
