@props(['active' => false, 'href' => '#'])

@php
    $class = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white';

    if ($active) {
        $class = "{$class} bg-blue-500 text-white";
    }
@endphp

<a
    href="{{ $href }}"
    {{ $attributes(['class' => $class]) }}
>
    {{ $slot }}
</a>
