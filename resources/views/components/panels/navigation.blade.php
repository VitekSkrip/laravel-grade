<nav class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="shrink-0 items-center mx-auto flex">
                <!-- Logo -->
                <x-panels.application-logo class="block h-9 w-auto fill-current text-gray-800 white:text-gray-200" />
            </div>

            <div class="mx-auto flex">
                <div class="shrink-0 flex items-center">
                    <!-- Navigation Links -->
                    @isset($navLinks)
                        {{ $navLinks }}
                    @else
                        <x-panels.navigation-links />
                    @endisset
                </div>
            </div>

            <div class="mx-auto flex">
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
    </div>
</nav>
