<!-- Settings Dropdown -->
<div class="hidden sm:flex sm:items-center sm:ml-6">
    <v-dropdown relative-el="[data-dropdown-relative]">
        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 white:text-gray-400 bg-white white:bg-gray-800 hover:text-gray-700 white:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            <div>{{ auth()->user()->name }}</div>

            <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </button>

        <template #portal>
            @admin()
            <x-dropdown-link :href=" route('admin.admin') ">
                <div class="flex">
                    <svg aria-hidden="true" class="w-5 h-5 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
                    Админ. панель
                </div>
            </x-dropdown-link>
            @endadmin

            <x-dropdown-link :href=" route('profile.edit') ">
                {{ __('Профиль') }}
            </x-dropdown-link>

            @manager()
            <x-dropdown-link :href=" route('manager.manager') ">
                <div class="flex">
                    <svg class="w-5 h-5 mb-1 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"></path>
                    </svg>
                    <span class="pl-2 mr-5 text-sm">Панель менеджера</span>
                </div>
            </x-dropdown-link>
            @endmanager()

            <x-dropdown-link :href=" route('basket') ">
                {{ __('Избранное') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href=" route('logout') "
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Выйти') }}
                </x-dropdown-link>
            </form>
        </template>
    </v-dropdown>
</div>
