<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('about') " :active=" request()->routeIs('about') ">
        {{ __('О компании') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('catalog') " :active=" request()->routeIs('catalog') ">
        {{ __('Каталог') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('contacts') " :active=" request()->routeIs('contacts') ">
        {{ __('Контактная информация') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('finances') " :active=" request()->routeIs('finances') ">
        {{ __('Финансовый отдел') }}
    </x-panels.nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-panels.nav-link :href=" route('clients') " :active=" request()->routeIs('clients') ">
        {{ __('Для клиентов') }}
    </x-panels.nav-link>
</div>
