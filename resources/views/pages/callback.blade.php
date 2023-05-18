<x-layouts.inner>
    <x-slot name="title">Обратный звонок</x-slot>

    @section('title', 'Обратный звонок')

    @section('inner-content')
        <x-forms.form action="{{ route('callback.store') }}" method="post" enctype="multipart/form-data">

            <x-panels.messages.flashes />

            <x-forms.concrete-forms-fields.manager-callback-form-fields />

            <x-forms.row>
                <x-forms.submit-button>
                    Отправить заявку
                </x-forms.submit-button>
                <x-forms.cancel-button href="{{ route('callback.show') }}" >
                    Отменить
                </x-forms.cancel-button>
            </x-forms.row>
        </x-forms.form>
    @endsection
</x-layouts.inner>
