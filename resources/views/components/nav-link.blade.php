@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#124d51] text-sm font-medium leading-5 text-[#124d51] focus:outline-none focus:border-[#124d51] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#124d51] hover:text-[#124d51] hover:border-[#124d51] focus:outline-none focus:text-[#124d51] focus:border-[#124d51] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
