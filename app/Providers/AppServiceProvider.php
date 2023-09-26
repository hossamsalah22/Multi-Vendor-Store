<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
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
        //
        Validator::extend('phone_number', function ($attribute, $value) {
            return preg_match('/^01[0125][0-9]{8}$/', $value);
        }, 'This Phone Number is Invalid.');

        Paginator::useBootstrapFive();
    }
}
