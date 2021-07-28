@props(['active' => false])

@php
    $class = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white';
    $class .= $active ? ' bg-blue-500 text-white ' : '';
@endphp

<a {{ $attributes(['class' => $class]) }}>
    {{ $slot }}
</a>
