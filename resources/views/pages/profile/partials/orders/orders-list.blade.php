<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Список заказов') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Информация о всех ваших активных заказах.") }}
        </p>
    </header>
    <div class="pt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 font-bold">
                    Номер заказа
                </th>
                <th scope="col" class="px-6 py-3 font-bold">
                    Товаров в заказе
                </th>
                <th scope="col" class="px-6 py-3 font-bold">
                    Общая стоимость
                </th>
                <th scope="col" class="px-6 py-3 font-bold">
                    Статус оплаты
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    1
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    5
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    1 599 000 ₽
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-orange mr-2"></div> Не оплачен
                    </div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    2
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    5
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    500 000 ₽
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Ошибка оплаты
                    </div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    3
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    5
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    1 599 ₽
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Оплачен
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <x-panels.empty-section>
        У Вас нет заказов
    </x-panels.empty-section>
</section>
