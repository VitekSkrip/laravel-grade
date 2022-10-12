<nav>
    <ul class="text-sm">
        <li>
            <p class="text-xl text-black font-bold mb-4">Информация</p>
            <ul class="space-y-2">
                <li><a class="@if (request()->routeIs('about')) text-orange cursor-default @else hover:text-orange @endif" href="{{ route('about') }}">О компании</a></li>
                <li><a class="@if (request()->routeIs('contacts')) text-orange cursor-default @else hover:text-orange @endif" href="{{ route('contacts') }}">Контактная информация</a></li>
                <li><a class="@if (request()->routeIs('sales')) text-orange cursor-default @else hover:text-orange @endif" href="{{ route('sales') }}">Условия продаж</a></li>
                <li><a class="@if (request()->routeIs('finances')) text-orange cursor-default @else hover:text-orange @endif" href="{{ route('finances') }}">Финансовый отдел</a></li>
                <li><a class="@if (request()->routeIs('clients')) text-orange cursor-default @else hover:text-orange @endif" href="{{ route('clients') }}">Для клиентов</a></li>
            </ul>
        </li>
    </ul>
</nav>