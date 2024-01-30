<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-secondary-800 dark:text-secondary-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card class="!p-5 sm:!p-8">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </x-card>

            @if (auth()->user()->email !== 'demo@example.com')
                <x-card class="!p-5 sm:!p-8">
                    <div class="max-w-xl">
                        <livewire:profile.update-password-form />
                    </div>
                </x-card>
            @endif

            <x-card class="!p-5 sm:!p-8">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
