<table class="w-full text-sm text-left">
    <thead class="text-xs uppercase text-black border-2">
    <tr>
        @manager
        <th scope="col" class="px-6 py-3 font-bold">
            Клиент
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Почта
        </th>
        @endmanager
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
            Статус предоплаты
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        @include('pages.manager.orders.element', ['order' => $order])
    @endforeach
    </tbody>
</table>
