<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome - {{ env('APP_NAME') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="shortcut icon" href="/logo.svg">

    @wireUiScripts(['defer'=>''])
</head>

<body
    class="antialiased selection:bg-gray-800 dark:selection:bg-gray-200 dark:selection:text-black selection:text-white">
    <div class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
        <div class="!bg-white dark:!bg-gray-800 shadow">
            <div class="container mx-auto max-w-7xl px-5 flex items-center justify-between">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        <span class="sr-only">logo</span>
                    </a>
                </div>

                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </div>
        </div>

        <div class="h-screen">
            <x-color-picker/>
        </div>

    </div>
</body>

</html>