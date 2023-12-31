<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>
        {{ __("errors.forbidden") }}
    </title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}"/>

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css') }}"/>
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

<!-- Start Error Area -->
<div class="error-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="error-content">
                    <h1>403</h1>
                    <h2>{{ __("errors.forbidden_action") }}</h2>
                    <p>{{ __("errors.role") }}</p>
                    <div class="button">
                        <a href="javascript:history.back()" class="btn">{{ __("errors.go_back") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Error Area -->

<!-- ========================= JS here ========================= -->
<script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
<script>
    window.onload = function () {
        window.setTimeout(fadeout, 500);
    }

    function fadeout() {
        document.querySelector('.preloader').style.opacity = '0';
        document.querySelector('.preloader').style.display = 'none';
    }
</script>
</body>

</html>
