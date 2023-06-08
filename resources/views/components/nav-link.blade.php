@props(['active'])

@php
$classes = ($active ?? false)
            ? '  link-active div-active links'
            : ' links ';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>    
