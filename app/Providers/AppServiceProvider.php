<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        Password::defaults(function () {
            $theRules = Password::min(6)->symbols()->mixedCase()->numbers();

            return App::isProduction() ? $theRules->uncompromised() : $theRules;
        });
    }
}
