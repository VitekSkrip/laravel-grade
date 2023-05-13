<table class="w-full text-sm text-left text-black">
    <thead class="text-xs uppercase text-black">
    <tr>
        <th scope="col" class="px-6 py-3 font-bold">
            Номер заявки
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Имя клиента
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Телефона клиента
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Дополнительная информация
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Статус заявки
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($callbacks as $callback)
        @include('pages.manager.callbacks.element', ['callback' => $callback])
    @endforeach
    </tbody>
</table>
