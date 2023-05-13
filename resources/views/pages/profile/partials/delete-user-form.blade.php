<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Удалить аккаунт') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Все Ваши данные будут удалены.') }}
        </p>
    </header>

    <x-danger-button
        @click="exampleModalShowing = true"
    >{{ __('Удалить аккаунт') }}</x-danger-button>

    <modal :showing="exampleModalShowing" @close="exampleModalShowing = false">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Вы уверены, что хотите удалить свой аккаунт?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ваши данные будут удалены.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Пароль') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Пароль') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>
            <div class="mt-6 flex">
                <x-secondary-button @click="exampleModalShowing = false">
                    {{ __('Отмена') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Удалить аккаунт') }}
                </x-danger-button>
            </div>
        </form>
    </modal>
</section>
