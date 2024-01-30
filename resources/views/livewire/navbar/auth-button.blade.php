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

<div class="hidden sm:flex sm:items-center sm:ms-6">

    <x-dropdown>
        <x-slot name="trigger">
            <x-button>
                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </x-button>
        </x-slot>

        <x-dropdown.item :href="route('profile')" wire:navigate>
            {{ __('Profile') }}
        </x-dropdown.item>

        <!-- Authentication -->
        <x-dropdown.item wire:click="logout" class="w-full text-start">
            {{ __('Log Out') }}
        </x-dropdown.item>
    </x-dropdown>

</div>
