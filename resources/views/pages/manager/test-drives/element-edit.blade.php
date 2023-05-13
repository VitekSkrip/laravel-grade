<x-layouts.admin
    page-title="Форма редактирования заявки на тест-драйв"
    title="Форма редактирования заявки на тест-драйв"
>
    <x-forms.form action="{{ route('manager.test-drive.update', $testDrive->id) }}" method="post" enctype="multipart/form-data">
        @method('POST')

        <x-forms.concrete-forms-fields.manager-testdrive-form-fields :testDrive="$testDrive" />

        <x-forms.row>
            <x-forms.submit-button>
                Сохранить
            </x-forms.submit-button>
            <x-forms.cancel-button href="{{ route('manager.test-drive.edit', $testDrive->id) }}">
                Отменить
            </x-forms.cancel-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.admin>
