<tr class="bg-white border-b  hover:bg-gray-600">
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $callback->id }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $callback->client_name }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $callback->client_phone }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $callback->more_info }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        <x-forms.form action="{{ route('callback.update', ['id' => $callback->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-forms.inputs.select
                id="status"
                name="status"
                error="{{ $errors->first('status') }}"
                type="submit"
                onchange="this.form.submit()"
            >
                <option @selected($callback->status == 'Обработана') value="Обработана">{{ 'Обработана' }}</option>
                <option @selected($callback->status == 'Не обработана') value="Не обработана">{{ 'Не обработана' }}</option>
            </x-forms.inputs.select>
        </x-forms.form>
    </td>
</tr>
