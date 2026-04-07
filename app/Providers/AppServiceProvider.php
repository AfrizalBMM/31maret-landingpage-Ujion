<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Fix for Laravel 11/12 `php artisan serve` bug on Windows
        if (class_exists(\Illuminate\Foundation\Console\ServeCommand::class)) {
            $vars = ['SystemDrive', 'SystemRoot', 'TEMP', 'TMP'];
            foreach ($vars as $var) {
                if (!in_array($var, \Illuminate\Foundation\Console\ServeCommand::$passthroughVariables)) {
                    \Illuminate\Foundation\Console\ServeCommand::$passthroughVariables[] = $var;
                }
            }
        }
    }
}
