@props(['salons'])

<div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
    @forelse ($salons as $salon)
        <x-salons.footer-element :salon="$salon"/>
    @empty
        <div>
            <p class="text-black text-xl">Данные временно недоступны, пожалуйста попробуйте позже</p>
        </div>
    @endforelse
</div>