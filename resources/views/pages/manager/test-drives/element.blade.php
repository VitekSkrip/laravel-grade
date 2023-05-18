<tr class="bg-white border-b  hover:bg-gray-100">
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $testDrive->id }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $testDrive->client_name }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $testDrive->client_phone }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $testDrive->more_info }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        <a class="hover:text-orange text-black" href="{{ route('product', $testDrive->car->id) }}">{{ $testDrive->car->name}}</a>
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $testDrive->salon->name }}
    </td>
    <td class="px-4 py-2">
        <div class="flex items-center">
            <a href="{{ route('manager.test-drive.edit', $testDrive->id) }}" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Редактировать">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </td>
    <td class="px-4 py-2">
        <form class="flex items-center" action="{{ route('manager.test-drive.destroy', $testDrive->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="inline-block bg-gray-400 hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded" title="Удалить" onclick="return confirm('вы уверены, что хотите удалить эту заявку?')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </form>
    </td>
</tr>
