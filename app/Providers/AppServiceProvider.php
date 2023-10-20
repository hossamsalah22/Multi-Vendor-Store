<?php

namespace App\Providers;

use App\Services\CurrencyConverter;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind('currency_converter', function () {
            return new CurrencyConverter(config('services.currency_converter.api_key'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();

        //
        Validator::extend('phone_number', function ($attribute, $value) {
            return preg_match('/^01[0125][0-9]{8}$/', $value);
        }, 'This Phone Number is Invalid.');

        Paginator::useBootstrapFive();

        Route::macro('customResources', function (array $resources) {
            Route::group(['prefix' => 'admin/dashboard', 'as' => 'dashboard.', 'middleware' => ['auth:admin']], function () use ($resources) {
                foreach ($resources as $resource) {
                    [$uri, $controller, $model] = $resource;
                    Route::put($uri . '/{' . $model . '}/activate', [$controller, 'activate'])->name($uri . '.activate');
                    Route::put($uri . '/{' . $model . '}/restore', [$controller, 'restore'])->name($uri . '.restore');
                    Route::put($uri . '/{' . $model . '}/ban', [$controller, 'ban'])->name($uri . '.ban');
                    Route::resource($uri, $controller);
                }
            });
        });
    }


}
