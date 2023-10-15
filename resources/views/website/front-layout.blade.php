<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>{{ $title }}</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}"/>

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"/>

</head>

<body>

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /End Preloader -->

<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <form action="{{ route('website.currency.store') }}" method="post">
                                        @csrf
                                        <select name="currency_code" onchange="this.form.submit()">
                                            <option value="EGP" @selected('EGP' == session('currency_code'))>
                                                {{__('EGP')}}
                                            </option>
                                            <option value="USD" @selected('USD' == session('currency_code'))>
                                                {{__('USD')}}
                                            </option>
                                            <option value="EUR" @selected('EUR' == session('currency_code'))>
                                                {{__('EUR')}}
                                            </option>
                                            <option value="ILS" @selected('GBP' == session('currency_code'))>
                                                {{__("GBP")}}
                                            </option>
                                        </select>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select name="locale" id="language-select">
                                        <option
                                            value="en" @selected(app()->getLocale() == 'en')>{{ __("English") }}</option>
                                        <option
                                            value="es" @selected(app()->getLocale() == 'es')>{{ __("Spanish") }}</option>
                                        <option
                                            value="fr" @selected(app()->getLocale() == 'fr')>{{ __("French") }}</option>
                                        <option
                                            value="ar" @selected(app()->getLocale() == 'ar')>{{ __("Arabic") }}</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="{{ route('website.home') }}">{{ __('Home') }}</a></li>
                            <li><a href="about-us.html">{{ __('About Us') }}</a></li>
                            <li><a href="contact.html">{{ __('Contact Us') }}</a></li>
                        </ul>
                    </div>
                </div>
                {{-- if user is not logged in --}}
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        @auth('web')
                            <div class="user">
                                <ul class="nav">
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-toggle text-white"
                                           data-bs-toggle="dropdown" href="#"
                                           aria-expanded="false">{{ auth()->user('user')->name }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">{{ __('Profile') }}</a></li>
                                            <li>
                                                <a href="{{ route('website.two-factor.index') }}"
                                                   class="dropdown-item">{{ __('Two Factor Authentication') }}</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                                                >{{ __('Logout') }}</a>
                                                <form action="{{ route('logout') }}" method="post" id="logout-form">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                        @guest
                            <ul class="user-login">
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{ route('website.home') }}">
                        <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-input">
                                <input type="text" placeholder="{{ __("Search") }}">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>{{ __("Hotline") }}:
                                <span>(+100) 123 456 7890</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>

                            <x-cart-menu/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>{{ __("All Categories") }}</span>
                        <ul class="sub-category">
                            @foreach($categories as $category)
                                @if($category->parent->name == "Main Category" && $category->children->count() > 0)
                                    <li><a href="product-grids.html">{{ $category->name }} <i
                                                class="lni lni-chevron-right"></i></a>
                                        <ul class="inner-sub-category">
                                            @foreach($category->children as $child)
                                                <li><a href="product-grids.html">{{ $child->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @elseif($category->parent->name == "Main Category" && $category->children->count() == 0)
                                    <li><a href="product-grids.html">{{ $category->name }}</a></li>
                                @endif

                            @endforeach
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ route("website.home") }}" class="active"
                                       aria-label="Toggle navigation">{{ __("Home") }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                       data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent"
                                       aria-expanded="false" aria-label="Toggle navigation">{{ __("Shop") }}</a>
                                    <ul class="sub-menu collapse" id="submenu-1-3">
                                        <li class="nav-item"><a
                                                href="{{ route('website.products.index') }}">{{ __("Products") }}</a>
                                        </li>
                                        <li class="nav-item"><a
                                                href="{{ route("website.cart.index") }}">{{ __("Cart") }}</a></li>
                                        <li class="nav-item"><a
                                                href="{{ route("website.checkout.create") }}">{{ __("Checkout") }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" aria-label="Toggle navigation">{{ __("Contact Us") }}</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">{{ __("Follow Us") }}:</h5>
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/hossamsalah22"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/hossamsalah02"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/hossamsalah22"><i class="lni lni-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>
<!-- End Header Area -->
{{-- Start Breadcrumb --}}
{{ $breadcrumb ?? '' }}

{{-- End Breadcrumb --}}

{{ $slot }}

<!-- Start Footer Area -->
<footer class="footer">
    <!-- Start Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="footer-logo">
                            <a href="{{ route('website.home') }}">
                                <img src="{{ asset('assets/images/logo/white-logo.svg') }}" alt="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="footer-newsletter">
                            <h4 class="title">
                                {{ __("Subscribe to our Newsletter") }}
                                <span>{{ __("Get all the latest information, Sales and Offers.") }}</span>
                            </h4>
                            <div class="newsletter-form-head">
                                <form action="#" method="get" target="_blank" class="newsletter-form">
                                    <input name="email" placeholder="{{ __("Email address here") }}..." type="email">
                                    <div class="button">
                                        <button class="btn">{{ __("Subscribe") }}<span class="dir-part"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <!-- Start Footer Middle -->
    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>{{ __("Get In Touch With Us") }}</h3>
                            <p class="phone">{{ __("Phone") }}: +1 (900) 33 169 7720</p>
                            <ul>
                                <li><span>{{ __("Monday-Friday:") }} </span> 9.00 {{ __("am") }} - 8.00 {{ __("pm") }}
                                </li>
                                <li><span>{{ __("Saturday:") }} </span> 10.00 {{ __("am") }} - 6.00 {{ __("pm") }}</li>
                            </ul>
                            <p class="mail">
                                <a href="mailto:support@shopgrids.com">support@shopgrids.com</a>
                            </p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer our-app">
                            <h3>{{ __("Our Mobile App") }}</h3>
                            <ul class="app-btn">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-apple"></i>
                                        <span class="small-title">{{ __("Download on the") }}</span>
                                        <span class="big-title">{{ __("App Store") }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-play-store"></i>
                                        <span class="small-title">{{ __("Download on the") }}</span>
                                        <span class="big-title">{{ __("Google Play") }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>{{ __("Information") }}</h3>
                            <ul>
                                <li><a href="javascript:void(0)">{{ __("About Us") }}</a></li>
                                <li><a href="javascript:void(0)">{{ __("Contact Us") }}</a></li>
                                <li><a href="javascript:void(0)">{{ __("Downloads") }}</a></li>
                                <li><a href="javascript:void(0)">{{ __("Sitemap") }}</a></li>
                                <li><a href="javascript:void(0)">{{ __("FAQs") }}</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-12">
                        <div class="payment-gateway">
                            <span>{{ __("We Accept") }}:</span>
                            <img src="{{ asset('assets/images/footer/credit-cards-footer.png') }}" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="copyright">
                            <p>{{ __("Designed and Developed by") }}<a href="https://www.github.com/hossamsalah22"
                                                                       rel="nofollow"
                                                                       target="_blank">{{ __("Hossam Salah") }}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <ul class="social">
                            <li>
                                <span>{{ __("Follow Us") }}:</span>
                            </li>
                            <li><a href="https://www.facebook.com/hossamsalah22" target="_blank"><i
                                        class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li><a href="https://www.twitter.com/hossamsalah02" target="_blank"><i
                                        class="lni lni-twitter-original"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/hossamsalah22" target="_blank"><i
                                        class="lni lni-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!--/ End Footer Area -->

<!-- ========================= scroll-top ========================= -->
<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>

<!-- ========================= JS here ========================= -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script>
    document.getElementById('language-select').addEventListener('change', function () {
        let selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value) {
            window.location.href = "{{ route('change-language', '') }}/" + selectedOption.value;
        }
    });
</script>
@stack('scripts')
</body>

</html>
