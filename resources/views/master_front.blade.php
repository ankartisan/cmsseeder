<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required Meta Tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- SEO -->
    @section('seo')
        <title>CMS Seeder</title>
        <meta name="description" content="CMS Seeder">
        <meta property="og:image" content="" />
        <meta property="og:title" content="CMS Seeder"/>
        <meta property="og:description" content="CMS Seeder" />
        <meta property="og:url" content="https://cmsseeder.com" />
    @show

<!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/themes/unify/assets/vendor/bootstrap/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
    <!-- Global Icons -->
    <link rel="stylesheet" href="/themes/unify/assets/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/icon-hs/style.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/animate.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/dzsparallaxer/advancedscroller/plugin.css">

    <link rel="stylesheet" href="/themes/unify/assets/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/chosen/chosen.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/themes/unify/assets/vendor/fancybox/jquery.fancybox.min.css">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="/themes/unify/assets/css/unify-core.css">
    <link rel="stylesheet" href="/themes/unify/assets/css/unify-components.css">
    <link rel="stylesheet" href="/themes/unify/assets/css/unify-globals.css">
    <link rel="stylesheet" href="/themes/unify/assets/css/custom.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- Google lang -->
    <meta name="google" value="notranslate">
</head>
<body class="{{Route::current()->getName()}}">

<main>
    @section('nav')
        <header id="js-header" class="u-header u-header--static">
            <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3">
                {{-- NAV --}}
                <nav id="navbar-top" class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
                    <!-- Responsive Toggle Button -->
                    <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                            <span class="hamburger hamburger--slider">
                              <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                            </span>
                            </span>
                    </button>
                    <!-- End Responsive Toggle Button -->

                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="navbar-brand">
                        CMS Seeder
                        {{--<img src="/images/logo_color_v3.png" width="200px"  alt="logo" />--}}
                    </a>
                    <!-- End Logo -->

                    <!-- Navigation -->
                    <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--lg" id="navBar">
                        <ul class="navbar-nav text-uppercase g-pos-rel g-font-weight-600 ml-auto">
                            <li class="nav-item  g-mx-10--lg g-mx-15--xl">
                                <a href="{{ route('contact') }}" class="nav-link g-py-7 g-px-0">
                                    {{ __("Contact") }}
                                </a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <li class="nav-item  g-mx-10--lg g-mx-15--xl">
                                    <a href="{{ route('logout') }}" class="nav-link g-py-7 g-px-0">
                                        {{ __("Logout") }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!-- End Navigation -->
                </nav>
            </div>
        </header>
    @show

<!-- MAIN CONTENT -->
    @yield('content')

<!-- FOOTER -->
    <footer class="g-bg-main-light-v1">
        <div class="g-brd-bottom g-brd-secondary-light-v1">
            <div class="container g-pt-50">
                <div class="row justify-content-start g-mb-30 g-mb-0--md">
                    <div class="col-sm-3 g-mb-30 g-mb-0--sm">
                        <h2 class="h5 g-color-gray-light-v3 mb-4">CMS Seeder</h2>
                        <ul class="list-unstyled g-font-size-13 mb-0">
                            <li class="g-mb-10">
                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover" href="{{ route('contact') }}">Contact Us</a>
                            </li>
                            <li class="g-my-10">
                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover" href="{{ route('sitemap') }}">Sitemap</a>
                            </li>
                            <li class="g-my-10">
                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover" href="{{ route('terms_conditions') }}">Terms & Conditions</a>
                            </li>
                            <li class="g-my-10">
                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover" href="{{ route('privacy_policy') }}">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3 g-mb-30 g-mb-0--sm">
                        <h2 class="h5 g-color-gray-light-v3 mb-4">Contact</h2>

                        <!-- Links -->
                        <ul class="list-unstyled g-color-gray-dark-v5 g-font-size-13">
                            <li class="media my-3">
                                <i class="d-flex mt-1 mr-3 icon-hotel-restaurant-235 u-line-icon-pro"></i>
                                <div class="media-body">
                                    123 Some Address
                                    <br>
                                    90004, Los Angeles, California
                                </div>
                            </li>
                            <li class="media my-3">
                                <i class="d-flex mt-1 mr-3 icon-communication-062 u-line-icon-pro"></i>
                                <div class="media-body">
                                    contact@cmsseeder.com
                                </div>
                            </li>
                        </ul>
                        <!-- End Links -->
                    </div>
                    <div class="col-sm-3 g-mb-30 g-mb-0--sm">
                        <h2 class="h5 g-color-gray-light-v3 mb-4">Follow Us</h2>
                        <ul class="list-inline mb-50">
                            <li class="list-inline-item g-mr-2">
                                <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-facebook--hover rounded" target="_blank" href="#">
                                    <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
                                    <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item g-mx-2">
                                <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-instagram--hover rounded" target="_blank" href="#">
                                    <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-instagram"></i>
                                    <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container g-pt-30 g-pb-10">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 g-mb-20">
                    <p class="g-font-size-13 mb-0">2018 © CMS Seeder. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- COMPONENTS -->
    @include('components/loader')
    @if(!in_array(Route::current()->getName(),['login','register']))
        @include('modals/login')
        @include('modals/signup')
    @endif
</main>
</body>
<script src="{{ mix('/js/bootstrap.js') }}"></script>
<!-- JS Global Compulsory -->
<script src="/themes/unify/assets/vendor/jquery/jquery.min.js"></script>
<script src="/themes/unify/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="/themes/unify/assets/vendor/popper.min.js"></script>
<script src="/themes/unify/assets/vendor/bootstrap/bootstrap.min.js"></script>
<!-- JS Plugins -->
<script src="/themes/unify/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="/themes/unify/assets/vendor/jquery-ui/ui/widget.js"></script>
<script src="/themes/unify/assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
<script src="/themes/unify/assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>
<script src="/themes/unify/assets/vendor/jquery-ui/ui/widgets/slider.js"></script>
<script src="/themes/unify/assets/vendor/chosen/chosen.jquery.js"></script>
<script src="/themes/unify/assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="/themes/unify/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
<script src="/themes/unify/assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
<script src="/themes/unify/assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
<script src="/themes/unify/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="/js/plugins/jquery-validate/jquery.validate.js"></script>
<script src="/js/plugins/typeahead/typeahead.js"></script>
<!-- JS Unify -->
<script src="/themes/unify/assets/js/hs.core.js"></script>
<script src="/themes/unify/assets/js/components/hs.header.js"></script>
<script src="/themes/unify/assets/js/helpers/hs.hamburgers.js"></script>
<script src="/themes/unify/assets/js/components/hs.dropdown.js"></script>
<script src="/themes/unify/assets/js/components/hs.slider.js"></script>
<script src="/themes/unify/assets/js/components/hs.select.js"></script>
<script src="/themes/unify/assets/js/components/hs.carousel.js"></script>
<script src="/themes/unify/assets/js/components/hs.popup.js"></script>
<script src="/themes/unify/assets/js/components/hs.go-to.js"></script>
<script src="/themes/unify/assets/js/components/hs.rating.js"></script>
<!-- JS Globals -->
<script>
    window.route = '{!! Route::current()->getName() !!}';
    window.lang = '{!! Route::current()->getPrefix() !!}';
</script>

<!-- JS Custom -->
<script src="/js/bootstrap.js"></script>
<script src="/js/app.js"></script>

@section('extrajavascript')
    <script>
        $(document).on('ready', function () {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 991
            });

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                afterOpen: function () {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of range slider
            $.HSCore.components.HSSlider.init('#rangeSlider1');

            // initialization of custom select
            $.HSCore.components.HSSelect.init('.js-custom-select');

            // initialization of carousel
            $.HSCore.components.HSCarousel.init('.js-carousel');

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            // initialization of rating
            $.HSCore.components.HSRating.init($('.js-rating'), {
                spacing: 4
            });
        });
    </script>
@show

</html>
