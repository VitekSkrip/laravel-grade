@props([
    'rows' => 3,
    'value' => null,
    'error' => null,
])
<textarea
    @class([
        'focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full border-gray-300',
        'border-red-600' => ! empty($error),
        'border-gray-300' => empty($error),
        $attributes->get('class'),
    ])
    rows="{{ $rows }}"
    {{ $attributes->except('class') }}
>{{ $value }}</textarea>
