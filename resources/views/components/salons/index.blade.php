@props(['salons'])

<div class="space-y-4">
    @forelse ($salons as $key => $salon)
        @php
            $flag = ($key % 2 == 0);
        @endphp
        <x-salons.element :salon="$salon" :flag="$flag"/>
    @empty
        <div>
            <p class="text-black text-xl">Данные временно недоступны, пожалуйста попробуйте позже</p>
        </div>
    @endforelse
</div>
