<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Psy\Util\Str;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $provider_user = Socialite::driver($provider)->user();
//        dd($provider_user);

        $user = User::where([
            'provider' => $provider,
            'provider_id' => $provider_user->getId(),
        ])->first();
        if (!$user) {
            $user = User::create([
                'name' => $provider_user->getName(),
                'email' => $provider_user->getEmail(),
                'password' => Hash::make($provider_user->getId()),
                'provider' => $provider,
                'provider_id' => $provider_user->getId(),
                'provider_token' => $provider_user->token,
            ]);
            $user->addMediaFromUrl("https://picsum.photos/200/300")->toMediaCollection('users');
            $user->markEmailAsVerified();
        }

        Auth::login($user, true);

        return redirect()->route('website.home');
    }
}
