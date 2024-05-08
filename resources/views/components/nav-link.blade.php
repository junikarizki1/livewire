@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center border-b-2 border-red-400 hover:text-red-500 text-red-500 text-sm'
            : 'inline-flex items-center hover:text-red-500 hover:border-b-2 border-red-400 text-black-400 text-sm';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
