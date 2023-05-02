<tr class="bg-white border-b bg-gray-800 border-gray-700 hover:bg-gray-50 hover:bg-gray-600">
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $order->id }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $order->total_quantity }}
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $order->total_cost }} ₽
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center text-gray-900">
            <x-orders.status :status="$order->payment_status" />
        </div>
    </td>
</tr>
