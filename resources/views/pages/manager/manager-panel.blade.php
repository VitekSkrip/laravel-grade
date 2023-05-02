<x-layouts.admin
    page-title="Управление заявками"
    title="Управление заявками"
>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('pages.manager.orders.list', ['orders' => $orders])
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
