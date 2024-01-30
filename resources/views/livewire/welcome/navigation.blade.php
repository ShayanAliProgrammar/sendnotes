<div class="p-5 text-end z-10">
    @auth
    <a href="{{ url('/dashboard') }}"
        class="font-semibold text-secondary-600 hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        wire:navigate>Dashboard</a>
    @else
    <a href="{{ route('login') }}"
        class="font-semibold text-secondary-600 hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        wire:navigate>Log in</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}"
        class="ms-4 font-semibold text-secondary-600 hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        wire:navigate>Register</a>
    @endif
    @endauth
</div>