@props(['active' => false ])

@php
$classes = 'block px3 leading-5 text-sm hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white';

if($active) $classes .= ' bg-blue-500 text-white';
@endphp

<a {{ $attributes(['class' => $classes ]) }}>

    {{ $slot }}
</a>