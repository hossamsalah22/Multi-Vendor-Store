<?php

namespace App\Providers;

use App\Services\CurrencyConverter;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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

        Route::macro('customResources', function (array $resources, $prefix, $as, $middleware) {
            Route::group(['prefix' => $prefix, 'as' => $as, 'middleware' => $middleware], function () use ($resources) {
                foreach ($resources as $resource) {
                    [$uri, $controller] = $resource;
                    $model = Str::singular($uri);

                    $include = $resource[2] ?? [];
                    $exclude = $resource[3] ?? [];

                    $defaultActions = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'];
                    $routeToInclude = array_diff($defaultActions, $exclude);

                    foreach ($include as $additionalRoute) {
                        Route::post($uri . '/{' . $model . '}/' . $additionalRoute,
                            [$controller, $additionalRoute])->name($uri . '.' . $additionalRoute);
                    }

                    Route::resource($uri, $controller)->only($routeToInclude);
                }
            });
        });


    }


}
