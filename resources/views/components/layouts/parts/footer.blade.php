<footer class="container mx-auto">

    @isset($notBaseFooter)
        <x-panels.copyrights />
    @else
        <section class="block sm:flex bg-white p-4">

            <x-panels.footer-salons/>

            <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
                <p class="text-3xl text-black font-bold mb-4">Информация</p>

                <x-information-menu template="footer" />

            </div>
        </section>

        <x-panels.copyrights />
    @endisset
</footer>
