<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href=" route('about') " :active=" request()->routeIs('about') ">
        {{ __('О компании') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href=" route('contacts') " :active=" request()->routeIs('contacts') ">
        {{ __('Контактная информация') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href=" route('finances') " :active=" request()->routeIs('finances') ">
        {{ __('Финансовый отдел') }}
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href=" route('clients') " :active=" request()->routeIs('clients') ">
        {{ __('Для клиентов') }}
    </x-nav-link>
</div>
