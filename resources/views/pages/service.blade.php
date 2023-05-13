<x-layouts.app
    page-title="Запись в сервис"
    title="Запись в сервис"
>
    <section class="bg-white bg-gray-900 py-5">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-center text-gray-900 font-medium">Выбор модели</h2>
            <x-catalog.catalog :cars="$cars" />
        </div>
    </section>

    <section class="bg-gray-100 py-6">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-center text-gray-900 font-medium">Выбор салона</h2>
                <x-salons.index :salons="$salons" />
        </div>
    </section>

    <section class="flex flex-col sm:justify-center items-center mb-6">
        <div class="w-full sm:max-w-md mt-6 px-6 bg-white overflow-hidden sm:rounded-lg">
            <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-center text-gray-900 font-medium">Ваши контакты</h2>
            <form action="#" class="space-y-8">
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="name">
                        Имя
                    </label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="name" type="text" name="name" required="required" autofocus="autofocus">
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email">
                        Телефон
                    </label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="phone" type="text" name="phone" required="required" autofocus="autofocus" autocomplete="username">
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Дополнительно</label>
                    <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=""></textarea>
                </div>
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Даю согласие на обработку своих персональных данных на условиях, указанных здесь. </span>
                    </label>
                </div>
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Даю согласие на получение информации рекламного характера на условиях, указанных здесь. </span>
                    </label>
                </div>
                <div class="items-center mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3">
                        Записаться
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.app>
