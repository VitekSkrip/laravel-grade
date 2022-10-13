@props(['published'])
<div class="flex items-center">
    <p class="text-sm text-gray-400 italic">{{ $published->format('d M Y') }}</p>
</div>