<x-front-layout>
    <x-slot name="breadcrumb">
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Two-Factor Authentication</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('website.home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li>Two-Factor Authentication</li>
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
                    <form class="card login-form"
                          action="{{ $user->two_factor_secret ? route('two-factor.disable') : route('two-factor.enable')}}"
                          method="post">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>Two-Factor Auth</h3>
                            </div>
                            @if(session('status') == 'two-factor-authentication-enabled')
                                <div class="alert alert-success">
                                    Two factor authentication has been enabled.
                                </div>
                            @elseif(session('status') == 'two-factor-authentication-disabled')
                                <div class="alert alert-danger">
                                    Two factor authentication has been disabled.
                                </div>
                            @endif
                            <div class="button">
                                @if(!$user->two_factor_secret)
                                    <button class="btn" type="submit">Enable</button>
                                @else
                                    @method('delete')
                                    {{ __('You have enabled two factor authentication.') }}
                                    <br>
                                    {{ __('Please scan the following QR code into your phone authenticator app.') }}
                                    <br>
                                    <div class="p-4 text-center">
                                        {!! $user->twoFactorQrCodeSvg() !!}
                                    </div>
                                    <br>
                                    <div class="p-4 text-center">
                                        {{ __("Those are your Recovery Codes, keep them in save place:") }}
                                        <br><br>
                                        <ul class="row">
                                            @foreach($user->recoveryCodes() as $code)
                                                <li class="col-6">{{ $code }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <br>
                                    <x-form.submit-button value="{{ __('Disable') }}"/>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->
</x-front-layout>
