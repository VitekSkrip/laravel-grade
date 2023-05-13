<x-layouts.admin
    page-title="Форма редактирования модели"
    title="Форма редактирования модели"
>
    <x-forms.form action="{{ route('admin.cars.update', ['car' => $car]) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')

        <x-forms.concrete-forms-fields.admin-car-form-fields :car="$car" />

        <x-forms.row>
            <x-forms.submit-button>
                Сохранить
            </x-forms.submit-button>
            <x-forms.cancel-button href="{{ route('admin.cars.edit', ['car' => $car]) }}">
                Отменить
            </x-forms.cancel-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.admin>
