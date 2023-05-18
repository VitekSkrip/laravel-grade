<x-layouts.app
    page-title="Запись на тест-драйв"
    title="Запись на тест-драйв"
>
    <section class="flex flex-col mb-6">
        <form action="{{ route('test-drive.store') }}" method="post" enctype="multipart/form-data">
            <x-panels.messages.flashes />
            <div class="grid grid-cols-2 gap-6 mx-6">
                <div class="flex w-full">
                    <div class="flex-1">
                        <div class="py-8 lg:py-10 px-4 mx-auto max-w-screen-md">
                            <div class="grid grid-cols-1 gap-6">
                                <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-center text-black font-bold">Ваши контакты</h2>

                                <x-forms.concrete-forms-fields.manager-callback-form-fields />

                                <x-forms.row>
                                    <x-forms.submit-button>
                                        Отправить заявку
                                    </x-forms.submit-button>
                                    <x-forms.cancel-button href="{{ route('test-drive.show') }}" >
                                        Отменить
                                    </x-forms.cancel-button>
                                </x-forms.row>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="flex-1">
                        <test-drive-create-fields
                            :cars="{{ json_encode($cars) }}"
                            :old-car="{{ json_encode(old('car_id')) }}"
                            :old-salon="{{ json_encode(old('salon_id')) }}"
                            :test-drive="{{ json_encode($testDrive) }}"
                        >
                        </test-drive-create-fields>
                    </div>
                </div>
            </div>
        </form>
    </section>
</x-layouts.app>
