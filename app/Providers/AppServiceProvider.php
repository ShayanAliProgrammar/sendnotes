<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Spatie\Csp\Nonce\RandomString;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Vite::useCspNonce('unsafe-inline');
        Livewire::useScriptTagAttributes(['nonce' => 'unsafe-inline']);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
