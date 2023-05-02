<!-- Settings Dropdown -->
<div class="hidden sm:flex sm:items-center sm:ml-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 white:text-gray-400 bg-white white:bg-gray-800 hover:text-gray-700 white:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                <div>{{ auth()->user()->name }}</div>

                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            @admin()
            <x-dropdown-link :href=" route('admin.admin') ">
                {{ __('Админ. панель') }}
            </x-dropdown-link>
            @endadmin

            @manager()
            <x-dropdown-link :href=" route('manager.manager') ">
                {{ __('Панель менеджера') }}
            </x-dropdown-link>
            @endmanager()

            <x-dropdown-link :href=" route('profile.edit') ">
                {{ __('Профиль') }}
            </x-dropdown-link>

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
        </x-slot>
    </x-dropdown>
</div>

<!-- Hamburger -->
<div class="-mr-2 flex items-center sm:hidden">
    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 white:text-gray-500 hover:text-gray-500 white:hover:text-gray-400 hover:bg-gray-100 white:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 white:focus:bg-gray-900 focus:text-gray-500 white:focus:text-gray-400 transition duration-150 ease-in-out">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
