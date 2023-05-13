<x-layouts.admin
    page-title="Управление моделями"
    title="Управление моделями"
>
    <section class="pb-4">
        @can('create', \App\Models\Car::class)
        <div class="my-6">
            <a href="{{ route('admin.cars.create') }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Добавить модель">
                <span class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Добавить модель</span>
                </span>
            </a>
        </div>
        @endcan

        <table class="border border-collapse w-full">
            <thead>
            <tr>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">id</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Название модели</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена с учетом скидки</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Цена без скидки</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Новинка</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
                <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
            <tr>
                <td class="border px-4 py-2">{{ $car->id }}</td>
                <td class="border px-4 py-2">{{ $car->name }}</td>
                <td class="border px-4 py-2"><x-price :price="$car->price" /></td>
                <td class="border px-4 py-2">@isset ($car->old_price)<x-price :price="$car->old_price" />@endisset</td>
                <td class="border px-4 py-2">{{ $car->is_new ? 'Да' : 'Нет' }}</td>
                <td class="border px-4 py-2">
                    @can('update', $car)
                        <div class="flex items-center">
                            <a href="{{ route('admin.cars.edit', ['car' => $car]) }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Редактировать">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    @endcan
                </td>
                <td class="border px-4 py-2">
                    @can('delete', $car)
                        <form class="flex items-center" action="{{ route('admin.cars.destroy', ['car' => $car]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Удалить" onclick="return confirm('вы уверены, что хотите удалить эту модель?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    @endcan
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</x-layouts.admin>
