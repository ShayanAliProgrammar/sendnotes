<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-secondary-800 dark:text-secondary-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-secondary-900 dark:text-secondary-100">
                <livewire:dashboard.home lazy />
            </div>
        </div>
    </div>
</x-app-layout>
