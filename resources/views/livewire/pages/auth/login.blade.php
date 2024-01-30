<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(session('url.intended', RouteServiceProvider::HOME));
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input label="{{ __('Email') }}" wire:init="form.email = 'demo@example.com'" wire:model="form.email"
                id="email" class="block mt-1 w-full" type="email" name="email" required autofocus
                autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input label="{{ __('Password') }}" wire:model="form.password" id="password" class="block mt-1 w-full"
                type="password" name="password" wire:init="form.password = 'demopass'" required
                autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <x-checkbox wire:model="form.remember" id="remember"
                    class="rounded dark:bg-secondary-900 border-secondary-300 dark:border-secondary-700 text-primary-600 shadow-sm focus:ring-primary-500 dark:focus:ring-primary-600 dark:focus:ring-offset-secondary-800"
                    name="remember" />
                <span class="ms-2 text-sm text-secondary-600 dark:text-secondary-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-secondary-800"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button type='submit' primary class="ms-3">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</div>
