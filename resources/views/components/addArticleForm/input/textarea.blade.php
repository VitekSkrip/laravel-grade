@props([
    'error' => null,
    'value' => null,
    'rows' => 3,
])

<textarea
    {{ $attributes }}
    @class([
        "mt-1 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50",
        "border-red-600" => ! empty($error),
        "border-gray-300" => empty($error),
    ])
    rows="{{ $rows }}"
>
{{ $value }}
</textarea>
