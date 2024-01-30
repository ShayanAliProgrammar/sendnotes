@props(['active', 'href' => null])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary-400 dark:border-primary-600 text-sm font-medium leading-5 text-secondary-900 dark:text-secondary-100 focus:outline-none focus:border-primary-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-secondary-500 dark:text-secondary-400 hover:text-secondary-700 dark:hover:text-secondary-300 hover:border-secondary-300 dark:hover:border-secondary-700 focus:outline-none focus:text-secondary-700 dark:focus:text-secondary-300 focus:border-secondary-300 dark:focus:border-secondary-700 transition duration-150 ease-in-out';
@endphp

@if ($href !== null)
    <a {{ $attributes->merge(['class' => $classes, 'href' => $href]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
