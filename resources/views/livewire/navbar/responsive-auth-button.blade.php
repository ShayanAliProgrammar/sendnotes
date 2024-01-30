<?php

use Livewire\Volt\Component;
use App\Livewire\Actions\Logout;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect(route('login'));
    }

    public function placeholder()
    {
        return view('components.loadings.auth-button');
    }
}; ?>

<div class="pt-4 pb-1 border-t border-secondary-200 dark:border-secondary-600">
    <div class="px-4">
        <div class="font-medium text-base text-secondary-800 dark:text-secondary-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
            x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
        <div class="font-medium text-sm text-secondary-500">{{ auth()->user()->email }}</div>
    </div>

    <div class="mt-3 space-y-1">
        <x-responsive-nav-link :active="request()->routeIs('profile')" :href="route('profile')" wire:navigate>
            {{ __('Profile') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <x-responsive-nav-link class="w-full text-start" wire:click="logout">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </div>
</div>
