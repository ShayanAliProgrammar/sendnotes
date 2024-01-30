<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/');
    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-secondary-900 dark:text-secondary-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-button negative x-data=''
        x-on:click.prevent="$openModal('confirm-user-deletion')">{{ __('Delete Account') }}</x-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <x-card>
            <form wire:submit="deleteUser" class="p-2">

                <h2 class="text-lg font-medium text-secondary-900 dark:text-secondary-100">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-input wire:model="password" id="password" name="password" type="password"
                        class="mt-1 block w-full" placeholder="{{ __('Password') }}" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-button secondary x-on:click="close">
                        {{ __('Cancel') }}
                    </x-button>

                    <x-button negative class="ms-3" type='submit'>
                        {{ __('Delete Account') }}
                    </x-button>
                </div>
            </form>
        </x-card>
    </x-modal>
</section>
