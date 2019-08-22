<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>{{ __('CMS Seeder | The most flexible CMS') }}</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.png">

    @section('seo')
    <!--  Meta tags -->
        <meta name="keywords" content="{{ __('free cms, open source cms, flexible cms, small business cms, custom cms') }}">
        <meta name="description" content="{{ __('The most flexible CMS for your small business') }}">

        <!-- Schema.org -->
        <meta itemprop="name" content="{{ __('The most flexible CMS for your small business') }}">
        <meta itemprop="description" content="{{ __('The most flexible CMS for your small business') }}">
        <meta itemprop="image" content="/images/img1.jpeg">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ __('The most flexible CMS for your small business') }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
        <meta property="og:description" content="{{ __('The most flexible CMS for your small business') }}">
        <meta property="og:site_name" content="CMS Seeder">
    @show

    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('/css/loader.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/themes/front/assets/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/custombox/dist/custombox.min.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/chartist/dist/chartist.min.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/themes/front/assets/vendor/ion-rangeslider/css/ion.rangeSlider.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="/themes/front/assets/css/theme.css">

</head>
<body class="{{Route::current()->getName()}}">
<!-- ========== HEADER ========== -->
<header id="header" class="u-header">
    <!-- Search -->
    <div id="searchPushTop" class="u-search-push-top">
        <div class="container position-relative">
            <div class="u-search-push-top__content">
                <!-- Close Button -->
                <button type="button" class="close u-search-push-top__close-btn"
                        aria-haspopup="true"
                        aria-expanded="false"
                        aria-controls="searchPushTop"
                        data-unfold-type="jquery-slide"
                        data-unfold-target="#searchPushTop">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- End Close Button -->

                <!-- Input -->
                <form class="js-focus-state input-group">
                    <input type="search" class="form-control" placeholder="Search Front" aria-label="Search Front">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                </form>
                <!-- End Input -->
            </div>
        </div>
    </div>
    <!-- End Search -->

    <div class="u-header__section">
        <!-- Topbar -->
        <div class="container u-header__hide-content pt-2">
            <div class="d-flex align-items-center">
                <div class="ml-auto">
                </div>

                <ul class="list-inline ml-2 mb-0">
                    <!-- Search -->
                    <li class="list-inline-item">
                        <a class="btn btn-xs btn-icon btn-text-secondary" href="javascript:;" role="button"
                           aria-haspopup="true"
                           aria-expanded="false"
                           aria-controls="searchPushTop"
                           data-unfold-type="jquery-slide"
                           data-unfold-target="#searchPushTop">
                            <span class="fas fa-search btn-icon__inner"></span>
                        </a>
                    </li>
                    <!-- End Search -->

                    <!-- Shopping Cart -->
                    <li class="list-inline-item cart-container">
                        @include('components/sidebar_cart')
                    </li>
                    <!-- End Shopping Cart -->

                    <!-- Account Login -->
                    @if(\Illuminate\Support\Facades\Auth::guard('customer')->user())
                    <li class="list-inline-item">
                        <!-- Account Sidebar Toggle Button -->
                        <a id="sidebarNavToggler" class="btn btn-xs btn-icon btn-text-secondary" href="javascript:;" role="button"
                           aria-controls="sidebarAccount"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-unfold-event="click"
                           data-unfold-hide-on-scroll="false"
                           data-unfold-target="#sidebarAccount"
                           data-unfold-type="css-animation"
                           data-unfold-animation-in="fadeInRight"
                           data-unfold-animation-out="fadeOutRight"
                           data-unfold-duration="500">
                            <span class="fas fa-user-circle btn-icon__inner font-size-1"></span>
                        </a>
                        <!-- End Account Sidebar Toggle Button -->



                        <aside id="sidebarAccount" class="u-sidebar" aria-labelledby="sidebarNavToggler">
                            <div class="u-sidebar__scroller">
                                <div class="u-sidebar__container">
                                    <div class="u-sidebar__cart-footer-offset">
                                        <!-- Header -->
                                        <header class="card-header bg-light py-3 px-5">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="h6 mb-0">Account</h3>

                                                <button type="button" class="close"
                                                aria-controls="sidebarAccount"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-event="click"
                                                data-unfold-hide-on-scroll="false"
                                                data-unfold-target="#sidebarAccount"
                                                data-unfold-type="css-animation"
                                                data-unfold-animation-in="fadeInRight"
                                                data-unfold-animation-out="fadeOutRight"
                                                data-unfold-duration="500">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        </header>
                                        <!-- End Header -->

                                        <div class="js-scrollbar u-sidebar__body">
                                            <div class="u-sidebar__content">
                                                <!-- Body -->
                                                    Account
                                                <!-- End Body -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Content -->
                        </aside>
                        <!-- End Account Sidebar Navigation -->
                    </li>
                    @endif
                    <!-- End Account Login -->
                </ul>
            </div>
        </div>
        <!-- End Topbar -->

        <div id="logoAndNav" class="container">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                <!-- Logo -->
                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="{{ route('home') }}" aria-label="Front">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="46px" height="46px" viewBox="0 0 46 46" xml:space="preserve" style="margin-bottom: 0;">
              <path fill="#3F7DE0" opacity=".65" d="M23,41L23,41c-9.9,0-18-8-18-18v0c0-9.9,8-18,18-18h11.3C38,5,41,8,41,11.7V23C41,32.9,32.9,41,23,41z"/>
                        <path class="fill-info" opacity=".5" d="M28,35.9L28,35.9c-9.9,0-18-8-18-18v0c0-9.9,8-18,18-18l11.3,0C43,0,46,3,46,6.6V18C46,27.9,38,35.9,28,35.9z"/>
                        <path class="fill-primary" opacity=".7" d="M18,46L18,46C8,46,0,38,0,28v0c0-9.9,8-18,18-18h11.3c3.7,0,6.6,3,6.6,6.6V28C35.9,38,27.9,46,18,46z"/>
                        <path class="fill-white" d="M17.4,34V18.3h10.2v2.9h-6.4v3.4h4.8v2.9h-4.8V34H17.4z"/>
            </svg>
                    <span class="u-header__navbar-brand-text">Front</span>
                </a>
                <!-- End Logo -->

                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn u-hamburger"
                        aria-label="Toggle navigation"
                        aria-expanded="false"
                        aria-controls="navBar"
                        data-toggle="collapse"
                        data-target="#navBar">
                        <span id="hamburgerTrigger" class="u-hamburger__box">
                          <span class="u-hamburger__inner"></span>
                        </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item u-header__nav-item">
                            <a class="nav-link u-header__nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item u-header__nav-last-item">
                            <a class="btn btn-sm btn-primary btn-pill transition-3d-hover" href="{{ route('products') }}">
                                Shop
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>
<!-- ========== END HEADER ========== -->
<!-- ========== MAIN ========== -->
<main id="content" role="main">
    @yield('content')
</main>
<!-- ========== END MAIN ========== -->

<!-- ========== FOOTER ========== -->

<footer>
    <!-- Content -->
    <div class="bg-dark">
        <div class="container space-2 space-md-3">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4 d-flex align-items-start flex-column mb-7 mb-lg-0">
                    <!-- Logo -->
                    <a class="d-flex align-items-center mb-lg-auto" href="https://hotnuts.rs/en" aria-label="Hot Nuts">
                        <span class="brand brand-primary">Front</span>
                        {{--<img src="" class="logo-img">--}}
                    </a>
                    <!-- End Logo -->

                    <p class="small text-white-50 mb-0">© Front 2019.<br>All rights reserved.</p>
                </div>

                <div class="col-6 col-md-4 col-lg-2 mb-7 mb-md-0">
                    <h3 class="h6 text-white">Front</h3>

                    <!-- List Group -->
                    <ul class="list-group list-group-transparent list-group-white list-group-flush list-group-borderless mb-0">
                        <li><a class="list-group-item list-group-item-action" href="{{ route('products') }}">Shop</a></li>
                        <li><a class="list-group-item list-group-item-action" href="{{ route('contact') }}">Contact</a></li>
                        <li><a class="list-group-item list-group-item-action" href="{{ route('home') }}">Home</a></li>
                    </ul>
                    <!-- End List Group -->
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <h3 class="h6 text-white">Contact</h3>

                    <!-- Address -->
                    <address class="list-group list-group-transparent list-group-white list-group-flush list-group-borderless mb-0">
                        <a class="list-group-item list-group-item-action" href="tel:+1123456789">+1123456789</a>
                        <a class="list-group-item list-group-item-action" href="tel:+1123456789">+1123456789</a>
                        <a class="list-group-item list-group-item-action" href="mailto:contact@example.com">contact@example.com</a>
                    </address>
                    <!-- End Address -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
</footer>

<!-- ========== END FOOTER ========== -->

<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#"
   data-position='{"bottom": 15, "right": 15 }'
   data-type="fixed"
   data-offset-top="400"
   data-compensation="#header"
   data-show-effect="slideInUp"
   data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->
<script src="{{ mix('/js/base.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
<script src="{{ mix('/js/ecommerce.js') }}"></script>

<script>
    window.route = '{!! Route::current()->getName() !!}';
    window.lang = '{!! Route::current()->getPrefix() !!}';
</script>

<!-- JS Global Compulsory -->
<script src="/themes/front/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/themes/front/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/themes/front/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/themes/front/assets/vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/themes/front/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="/themes/front/assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
<script src="/themes/front/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/themes/front/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="/themes/front/assets/vendor/chartist/dist/chartist.min.js"></script>
<script src="/themes/front/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.js"></script>
<script src="/themes/front/assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="/themes/front/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
<script src="/themes/front/assets/vendor/appear.js"></script>
<script src="/themes/front/assets/vendor/circles/circles.min.js"></script>
<script src="/themes/front/assets/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="/themes/front/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/themes/front/assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/themes/front/assets/vendor/custombox/dist/custombox.min.js"></script>
<script src="/themes/front/assets/vendor/custombox/dist/custombox.legacy.min.js"></script>
<!-- JS Front -->
<script src="/themes/front/assets/js/hs.core.js"></script>
<script src="/themes/front/assets/js/components/hs.header.js"></script>
<script src="/themes/front/assets/js/components/hs.unfold.js"></script>
<script src="/themes/front/assets/js/components/hs.malihu-scrollbar.js"></script>
<script src="/themes/front/assets/js/components/hs.fancybox.js"></script>
<script src="/themes/front/assets/js/components/hs.chartist-area-chart.js"></script>
<script src="/themes/front/assets/js/components/hs.slick-carousel.js"></script>
<script src="/themes/front/assets/js/components/hs.cubeportfolio.js"></script>
<script src="/themes/front/assets/js/components/hs.selectpicker.js"></script>
<script src="/themes/front/assets/js/components/hs.range-slider.js"></script>
<script src="/themes/front/assets/js/components/hs.chart-pie.js"></script>
<script src="/themes/front/assets/js/components/hs.svg-injector.js"></script>
<script src="/themes/front/assets/js/components/hs.go-to.js"></script>
<script src="/themes/front/assets/js/components/hs.modal-window.js"></script>

<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function () {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 767.98,
            hideTimeOut: 0
        });

        // initialization of svg injector module
        $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
    });

    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of chartist area charts
        $.HSCore.components.HSChartistAreaChart.init('.js-area-chart');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of fancybox
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of cubeportfolio
        $.HSCore.components.HSCubeportfolio.init('.cbp');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of malihu scrollbar
        var windW = window.innerWidth;

        if(windW < 768) {
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
        }

        // initialization of chart pies
        var items = $.HSCore.components.HSChartPie.init('.js-pie');

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');

        // initialization of forms
        $.HSCore.components.HSRangeSlider.init('.js-range-slider');

        // initialization of autonomous popups
        $.HSCore.components.HSModalWindow.init('[data-modal-target]', '.js-modal-window', {
            autonomous: true
        });

    });

    $(window).on('resize', function () {
        // initialization of malihu scrollbar
        var windW = window.innerWidth;

        if(windW < 768) {
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
        } else {
            $('.js-scrollbar').mCustomScrollbar("destroy");
        }
    });

</script>
</body>
</html>