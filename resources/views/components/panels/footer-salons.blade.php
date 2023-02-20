<div class="flex-1">
    <div>
        <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
        <span class="inline-block pl-1"> / <a href="{{ route('salons.index') }}" class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
    </div>

    <x-salons.footer-index :salons="$salons"/>
</div>
