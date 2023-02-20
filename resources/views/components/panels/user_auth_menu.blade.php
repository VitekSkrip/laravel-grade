<nav class="flex justify-center sm:justify-end items-center space-x-8 text-sm">
    <a class="text-black hover:text-orange" href="{{ route('profile') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="inline-block font-bold">{{ auth()->user()->name }}</span>
    </a>
    <a class="text-gray-500 hover:text-orange" href="{{ route('profile') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        Личный кабинет
    </a>
    
    <form method="post" action="{{ route('logout') }}" class="inline-block">
        @csrf
        <button type="submit" class="text-gray-500 hover:text-orange">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Выйти
        </button>
    </form>
</nav>
