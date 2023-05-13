@props([
    'value' => null,
    'error' => null,
    'type' => 'text',
])
<input
    type="{{ $type }}"
    @class([
        'focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full',
        'border-red-600' => ! empty($error),
        'border-gray-300' => empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class') }}
    value="{{ $value }}"
>
