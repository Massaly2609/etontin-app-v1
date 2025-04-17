@props(['status'])

@php
    $colors = [
        'actif' => 'bg-green-100 text-green-800',
        'en_attente' => 'bg-yellow-100 text-yellow-800',
        'suspendu' => 'bg-red-100 text-red-800'
    ];
@endphp

<span {{ $attributes->merge(['class' => "px-2 inline-flex text-xs leading-5 font-semibold rounded-full {$colors[$status]}"]) }}>
    {{ ucfirst(str_replace('_', ' ', $status)) }}
</span>
