<x-front-layout title="Login">
    <x-slot name="breadcrumb">
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ __('Login') }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('website.home') }}"><i class="lni lni-home"></i> {{__('Home')}}</a>
                            </li>
                            <li>{{ __('Login') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>

    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>{{ __('Login Now') }}</h3>
                                <p>{{ __("You can login using your social media account or email address.") }}</p>
                            </div>
                            <div class="social-login">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn"
                                                                             href="{{ route('social.login', 'facebook') }}"><i
                                                class="lni lni-facebook-filled"></i> Facebook
                                            login</a></div>
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn"
                                                                             href="javascript:void(0)"><i
                                                class="lni lni-twitter-original"></i> Twitter
                                            login</a></div>
                                    <div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn"
                                                                             href="{{ route('social.login', 'google') }}"><i
                                                class="lni lni-google"></i> Google login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alt-option">
                                <span>{{ __("OR") }}</span>
                            </div>
                            <x-form.input name="{{ config('fortify.username') }}" class="input-group" label="Email"
                                          id="reg-email" autofocus/>
                            @error(config('fortify.username'))
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <x-form.input name="password" class="input-group" label="Password" id="reg-pass"
                                          type="password"/>
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" value="1" class="form-check-input width-auto"
                                           id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">{{ __("Remember Me") }}</label>
                                </div>
                                <a class="lost-pass"
                                   href="{{ route('password.request') }}">{{ __("Forgot Password?") }}</a>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">{{ __('Login') }}</button>
                            </div>
                            <p class="outer-link">{{ __("Don't have an account?") }} <a
                                    href="{{ route('register') }}">{{ __("Register Here") }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->
</x-front-layout>
