<table class="w-full text-sm text-left text-black">
    <thead class="text-xs uppercase border-2">
    <tr>
        <th scope="col" class="px-6 py-3 font-bold">
            Номер запроса
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Имя клиента
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Телефон клиента
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Дополнительная информация
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Модель
        </th>
        <th scope="col" class="px-6 py-3 font-bold">
            Салон
        </th>
        <th scope="col" class="px-6 py-3 font-bold">

        </th>
        <th scope="col" class="px-6 py-3 font-bold">

        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($testDrives as $testDrive)
        @include('pages.manager.test-drives.element', ['testDrive' => $testDrive])
    @endforeach
    </tbody>
</table>
