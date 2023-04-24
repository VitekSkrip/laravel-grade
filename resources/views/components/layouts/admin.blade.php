<x-layouts.app
    page-title="{{ $pageTitle ?? '' }}"
>

    <x-slot:header>
        <x-layouts.parts.header>
            <x-panels.navigation>
                <x-slot:navLinks>
                    <x-panels.admin.navigation-links />
                </x-slot:navLinks>

                <x-slot:authMenu>
                </x-slot:authMenu>
            </x-panels.navigation>
        </x-layouts.parts.header>
    </x-slot:header>


    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{ $title }}</h1>

        <x-panels.messages.flashes />

        {{ $slot }}
    </div>

    <x-slot:footer>
        <x-layouts.parts.footer>
            <x-slot:notBaseFooter></x-slot:notBaseFooter>
        </x-layouts.parts.footer>
    </x-slot:footer>
</x-layouts.app>
