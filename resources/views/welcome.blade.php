<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @livewireScriptConfig()

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="shortcut icon" href="/logo.svg">

    @include('meta::manager', [
        'title' => 'Welcome - ' . config('app.name', 'Laravel'),
    ])
</head>

<body class="antialiased">
    <div
        class="relative min-h-screen bg-dots-darker bg-center bg-secondary-100 dark:bg-dots-lighter dark:bg-secondary-900">
        <div class="!bg-white dark:!bg-secondary-800 shadow">
            <div class="container mx-auto max-w-7xl px-5 flex items-center justify-between">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo
                            class="block h-9 w-auto fill-current text-secondary-800 dark:text-secondary-200" />
                        <span class="sr-only">logo</span>
                    </a>
                </div>

                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </div>
        </div>

        <div class="h-[calc(100vh_-_129px)] grid place-items-center">
            <livewire:welcome.hero-section lazy />
        </div>

        <footer class="bg-white">
            <div class="max-w-7xl py-5 mx-auto container px-5 flex items-center justify-between flex-wrap">
                <p class='font-medium'>
                    {{ '@' . date('Y') }} Alright Reserved.
                </p>
            </div>
        </footer>

    </div>

    @wireUiScripts()
</body>

</html>
