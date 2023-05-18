@props([
    'testDrive'
])
@csrf
<x-forms.groups.group for="testDriveId">
    <x-slot:label>Номер заявки</x-slot:label>
    <x-forms.inputs.text
        name="id"
        value="{{ $testDrive->id }}"
        readonly
    />
</x-forms.groups.group>

<x-forms.groups.group for="testDriveClientName" error="{{ $errors->first('client_name') }}">
    <x-slot:label>Имя клиента</x-slot:label>
    <x-forms.inputs.text
        name="client_name"
        value="{{ old('client_name', $testDrive->client_name) }}"
        error="{{ $errors->first('client_name') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="testDriveClientPhone" error="{{ $errors->first('client_phone') }}">
    <x-slot:label>Телефон клиента</x-slot:label>
    <x-forms.inputs.text
        name="client_phone"
        value="{{ old('client_phone', $testDrive->client_phone) }}"
        error="{{ $errors->first('client_phone') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="testDriveMoreInfoByClient"  error="{{ $errors->first('more_info') }}">
    <x-slot:label>Дополнительно</x-slot:label>
    <x-forms.inputs.textarea
        name="more_info"
        value="{{ old('more_info', $testDrive->more_info) }}"
        error="{{ $errors->first('more_info') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="testDriveStatus"  error="{{ $errors->first('status') }}">
    <x-slot:label>Статус</x-slot:label>
        <x-forms.inputs.select
            id="status"
            name="status"
        >
            <option @selected($testDrive->status == 'Обработана') value="Обработана">{{ 'Обработана' }}</option>
            <option @selected($testDrive->status == 'Не обработана') value="Не обработана">{{ 'Не обработана' }}</option>
        </x-forms.inputs.select>
</x-forms.groups.group>

<test-drive-edit
    :test-drive="{{ json_encode($testDrive) }}"
    :cars="{{ json_encode($cars) }}"
    :old-car="{{ json_encode(old('car_id', $testDrive->car->id)) }}"
    :old-salon="{{ json_encode(old('salon_id', $testDrive->salon->id)) }}"
>
</test-drive-edit>

