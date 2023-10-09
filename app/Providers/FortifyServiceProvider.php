<?php

namespace App\Providers;

use App\Actions\Fortify\AuthenticateAdmin;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request = request();
        if ($request->is('admin/*')) {
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.passwords', 'admins');
            Config::set('fortify.prefix', 'admin');
        }

        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request): \Illuminate\Http\RedirectResponse
            {
                if ($request->user('admin'))
                    return redirect(RouteServiceProvider::DASHBOARD);
                return redirect(RouteServiceProvider::HOME);
            }
        });

        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
            public function toResponse($request): \Illuminate\Http\RedirectResponse
            {
                return redirect()->intended(route('website.home'));
            }
        });
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        if (Config::get('fortify.guard') === 'admin') {
            Fortify::authenticateUsing([new AuthenticateAdmin, 'authenticate']);
            Fortify::viewPrefix('auth.');
        } else {
            Fortify::viewPrefix('website.auth.');
        }
    }
}
