<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-secondary-800 dark:text-secondary-200 leading-tight">
                {{ __('Create Note') }}
            </h2>

            <x-button primary :href="route('notes')" wire:navigate label='Show Notes' />

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-secondary-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-secondary-900 dark:text-secondary-100">
                    <livewire:notes.create-note />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
