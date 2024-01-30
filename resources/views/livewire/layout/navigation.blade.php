<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<nav x-data="{ open: false }"
    class="bg-white dark:bg-secondary-800 border-b border-secondary-100 dark:border-secondary-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo
                            class="block h-9 w-auto fill-current text-secondary-800 dark:text-secondary-200" />
                        <span class="sr-only">logo</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('notes')" :active="request()->routeIs('notes')" wire:navigate>
                        {{ __('Notes') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <livewire:navbar.auth-button lazy />

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="outline-none inline-flex justify-center items-center group transition-all ease-in duration-150 focus:ring-2 focus:ring-offset-2 hover:shadow-sm disabled:opacity-80 disabled:cursor-not-allowed rounded gap-x-2 text-sm px-1.5 py-1.5 border text-slate-500 hover:bg-slate-100 ring-slate-200
                dark:ring-slate-600 dark:border-slate-500 dark:hover:bg-slate-700
                dark:ring-offset-slate-800 dark:text-slate-400">
                    <div class="sr-only">toggle-nav</div>
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('notes')" :active="request()->routeIs('notes')" wire:navigate>
                {{ __('Notes') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <livewire:navbar.responsive-auth-button />
    </div>
</nav>
