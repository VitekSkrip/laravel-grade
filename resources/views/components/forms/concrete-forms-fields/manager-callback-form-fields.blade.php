@csrf
<x-forms.groups.group for="client_name" error="{{ $errors->first('client_name') }}">
    <x-slot:label>Имя</x-slot:label>
    <x-forms.inputs.text
        id="client_name"
        name="client_name"
        placeholder="Ваше имя"
        value="{{ old('client_name') }}"
        error="{{ $errors->first('client_name') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="client_phone" error="{{ $errors->first('client_phone') }}">
    <x-slot:label>Номер телефона</x-slot:label>
    <x-forms.inputs.text
        id="client_phone"
        name="client_phone"
        placeholder="+7(952)-52-949-86"
        value="{{ old('client_phone') }}"
        error="{{ $errors->first('client_phone') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="more_info" error="{{ $errors->first('more_info') }}">
    <x-slot:label>Дополнительное</x-slot:label>
    <x-forms.inputs.textarea
        id="more_info"
        name="more_info"
        :value="old('more_info')"
        error="{{ $errors->first('more_info') }}"
        placeholder=""
    />
</x-forms.groups.group>

<x-forms.groups.checkbox-group error="{{ $errors->first('is_personal_data_access') }}">
    <x-slot:label>Даю согласие на обработку своих персональных данных</x-slot:label>
    <x-forms.inputs.checkbox
        name="is_personal_data_access"
        :checked="old('is_personal_data_access')"

    />
</x-forms.groups.checkbox-group>

<x-forms.groups.checkbox-group error="{{ $errors->first('is_advertising_access') }}">
    <x-slot:label>Даю согласие на получение информации рекламного характера</x-slot:label>
    <x-forms.inputs.checkbox
        name="is_advertising_access"
        :checked="old('is_advertising_access')"
    />
</x-forms.groups.checkbox-group>
