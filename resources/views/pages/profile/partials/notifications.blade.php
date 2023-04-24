 <table class="border border-collapse w-full">
    <thead>
    <tr>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Уведомление</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Ссылка</th>
        <th class="border px-4 py-2 border-gray-600 bg-gray-200 font-bold">Дата</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($notifications as $notification)
        <tr class="{{ $notification->unread() ? 'bg-green-100' : '' }}">
            <td class="border px-4 py-2">{{ $notification->data['message'] ?? '' }}</td>
            <td class="border px-4 py-2"><a class="text-gray-500 hover:text-orange" href="{{ $notification->data['url'] ?? '' }}">Перейти</a></td>
            <td class="border px-4 py-2">{{ $notification->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
