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

        <div class="mb-6">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ваш номер телефона</label>
            <input type="tel" required id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Примечания</label>
            <textarea id="message" name="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>

        <button class="bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
            Оставить заявку на звонок
        </button>
    </form>
</div>
