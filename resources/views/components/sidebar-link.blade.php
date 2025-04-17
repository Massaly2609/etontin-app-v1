@props(['href', 'active'])

@php
$classes = $active ?? false
    ? 'flex items-center p-3 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100'
    : 'flex items-center p-3 text-gray-600 rounded-lg hover:bg-gray-100';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
