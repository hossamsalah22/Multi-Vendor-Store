<x-front-layout title="Forgot Password">
    <x-slot name="breadcrumb">
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ __("Forgot Password") }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('website.home') }}"><i class="lni lni-home"></i> {{ __("Home") }}</a>
                            </li>
                            <li>{{ __("Forgot Password") }}</li>
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
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <!-- Password -->
                        <div>
                            <x-form.input label="Please Enter your Email" name="email"
                                          placeholder="Email" autofocus
                                          autocomplete="current-email"/>
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ __($message) }}</p>
                        @enderror
                        <div class="flex justify-end mt-4">
                            <x-form.submit-button value="{{ __('Email Password Reset Link') }}"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->
</x-front-layout>


