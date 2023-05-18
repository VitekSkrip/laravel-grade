<footer class="container mx-auto">

    @isset($notBaseFooter)
        <x-panels.copyrights />
    @else
        <section class="block sm:flex bg-gray-200 p-4">
            <x-panels.footer-salons/>
        </section>

        <x-panels.copyrights />
    @endisset
</footer>
