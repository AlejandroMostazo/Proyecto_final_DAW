@props(['active'])

@php
$classes = ($active ?? false)
            ? '  link-active focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : '  hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

