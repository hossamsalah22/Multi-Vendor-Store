<x-front-layout>
    <x-slot name="breadcrumb">
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ __("Register") }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('website.home') }}"><i class="lni lni-home"></i> {{ __("Home") }}</a>
                            </li>
                            <li>{{ __("Register") }}</li>
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
                    <form class="card login-form" action="{{ route('register') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3 class="text-center">{{ __("Register Now") }}</h3>
                            </div>
                            <x-form.input name="name" class="input-group" label="Name"
                                          id="reg-name" autofocus/>
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <x-form.input name="username" class="input-group" label="User Name"
                                          id="reg-username"/>
                            @error('phone_number')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <x-form.input name="email" class="input-group" label="Email"
                                          id="reg-email"/>
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <x-form.input name="phone_number" class="input-group" label="Phone Number"
                                          id="reg-phone_number"/>
                            @error('phone_number')
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
                            <x-form.input name="password_confirmation" class="input-group" label="Confirm Password"
                                          id="reg-pass"
                                          type="password"/>
                            <x-form.image-input name="image" class="input-group" label="Image"
                                                id="reg-image"/>
                            @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="button">
                                <button class="btn" type="submit">{{ __("Register") }}</button>
                            </div>
                            <p class="outer-link">{{__("Already have an account?")}} <a
                                    href="{{ route('login') }}">{{__("Login Now")}}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->
</x-front-layout>
