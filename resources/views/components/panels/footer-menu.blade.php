<nav>
    <ul class="list-inside  bullet-list-item">
        <li><a class="@if (request()->routeIs('about')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="{{ route('about') }}">О компании</a></li>
        <li><a class="@if (request()->routeIs('contacts')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif"  href="{{ route('contacts') }}">Контактная информация</a></li>
        <li><a class="@if (request()->routeIs('sales')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="{{ route('sales') }}">Условия продаж</a></li>
        <li><a class="@if (request()->routeIs('finances')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="{{ route('finances') }}">Финансовый отдел</a></li>
        <li><a class="@if (request()->routeIs('clients')) text-orange cursor-default @else text-gray-600 hover:text-orange @endif" href="{{ route('clients') }}">Для клиентов</a></li>
    </ul>
</nav>
