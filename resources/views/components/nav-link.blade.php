@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center hover:text-orange-400 text-md text-orange-500'
: 'inline-flex items-center hover:text-orange-400 text-md text-gray-500';
@endphp

<a {{
    $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>