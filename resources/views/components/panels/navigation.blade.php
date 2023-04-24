<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <!-- Logo -->
                    <x-panels.application-logo class="block h-9 w-auto fill-current text-gray-800 white:text-gray-200" />

                    <!-- Navigation Links -->
                    @isset($navLinks)
                        {{ $navLinks }}
                    @else
                        <x-panels.navigation-links />
                    @endisset
                </div>
            </div>

            @isset($authMenu)
                {{ $authMenu }}
            @else
                @auth()
                    <x-panels.user_auth_menu />
                @else
                    <x-panels.user_not_auth_menu />
                @endauth
            @endisset
        </div>
    </div>
</nav>
