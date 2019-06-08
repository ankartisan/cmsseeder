<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Documentation Help Desk — A beautiful Open Source Bootstrap 4 Template!</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png">
@section('seo')
    <!--  Meta tags -->
        <meta name="keywords" content="documentation template, help desk, open source, free template, freebies, bootstrap 4, bootstrap4">
        <meta name="description" content="Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. The UI Kit comes with 10 beautiful complete and functional pages including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.">

        <!-- Schema.org -->
        <meta itemprop="name" content="Documentation Help Desk by Htmlstream">
        <meta itemprop="description" content="Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. The UI Kit comes with 10 beautiful complete and functional pages including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.">
        <meta itemprop="image" content="docs-ui-kit-thumbnail.jpg">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@htmlstream">
        <meta name="twitter:title" content="Documentation Help Desk by Htmlstream">
        <meta name="twitter:description" content="Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. The UI Kit comes with 10 beautiful complete and functional pages including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.">
        <meta name="twitter:creator" content="@htmlstream">
        <meta name="twitter:image" content="docs-ui-kit-thumbnail.jpg">

        <!-- Open Graph -->
        <meta property="og:title" content="Documentation Help Desk by Htmlstream">
        <meta property="og:type" content="article">
        <meta property="og:url" content="https://htmlstream.com/preview/docs-ui-kit/index.html">
        <meta property="og:image" content="docs-ui-kit-thumbnail.jpg">
        <meta property="og:description" content="Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. The UI Kit comes with 10 beautiful complete and functional pages including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.">
        <meta property="og:site_name" content="Htmlstream">
@show
<!-- Google lang -->
    <meta name="google" value="notranslate">
<!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

    <!-- CMS Seeder CSS -->
    <link rel="stylesheet" href="{{ mix('/css/loader.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/themes/docs-ui-kit/assets/vendor/font-awesome/css/fontawesome-all.min.css">

    <!-- CSS Template -->
    <link rel="stylesheet" href="/themes/docs-ui-kit/assets/css/theme.css">

    <!-- CSS Demo -->
    <link rel="stylesheet" href="/themes/docs-ui-kit/assets/css/demo.css">
</head>
<body class="{{Route::current()->getName()}}">
<!-- Header -->
@section('nav')
    <header class="duik-header">
        <!-- Navbar -->
        <nav class="js-navbar-scroll navbar navbar-expand-lg navbar-dark bg-primary-md fixed-top flex-nowrap transition-bg-03s"
             data-onscroll-classes="bg-primary"
             data-offset-value="50">
            <div class="container">
                <a class="navbar-brand" href="/">CMS Seeder</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse my-3 my-lg-0" id="navbarCollapse">
                    <!-- Header Links -->
                    <ul class="navbar-nav mr-lg-auto ml-lg-2 ml-xl-4">
                        <li class="nav-item mx-lg-1 mx-xl-2 mb-2 mb-lg-0">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item mx-lg-1 mx-xl-2 mb-2 mb-lg-0">
                            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                        </li>
                        <li class="nav-item mx-lg-1 mx-xl-2 mb-2 mb-lg-0">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                    <!-- End Header Links -->

                    <!-- Header Links 2 -->
                    <ul class="navbar-nav align-items-lg-center">
                        <li class="nav-item ml-lg-3 ml-xl-5 my-2 my-lg-0">
                            <a class="btn btn-sm btn-light text-primary" href="https://github.com/ankaitzan/cmsseeder">
                                <i class="fas fa-cloud-download-alt mr-1"></i> Download
                            </a>
                        </li>
                    </ul>
                    <!-- End Header Links 2 -->
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
    </header>
@show
<!-- End Header -->
<!-- Promo Section -->
@section('promo')
<section class="duik-promo" style="background: url(/themes/docs-ui-kit/assets/img-temp/promo.jpg) no-repeat center; background-size: cover;">
    <div class="container duik-promo-container">
        <div class="d-flex justify-content-center1 position-relative mh-35rem h-85vh py-11">
            <div class="align-self-center">
                <h1 class="text-white mb-1">CMS Seeder</h1>
                <p class="lead mb-5">Starter pack for your next CMS project based on Laravel!</p>
                <span class="js-scroll-nav">
            <a class="btn btn-sm btn-light mr-2" href="https://github.com/ankaitzan/cmsseeder">Explore now</a>
          </span>
                <a class="btn btn-sm btn-dark" href="https://github.com/ankaitzan/cmsseeder" target="_blank"><i class="fab fa-github mr-1"></i> Star on Github</a>
            </div>
        </div>
    </div>

    <!-- SVG BG Separator -->
    <svg class="position-absolute bottom-0 left-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 300">
        <path id="Path_1" fill="#fff" data-name="Path 1" d="M0,1081.586H1920v-300Z" transform="translate(0 -781.586)"/>
    </svg>
    <!-- SVG BG Separator -->

    <!-- SVG Window -->
    <svg class="position-absolute d-none d-lg-block" style="right: 150px; bottom: 50px; transform: rotate(-15deg); transform-origin: 50% 0;" id="revenue-graph-colour" xmlns="http://www.w3.org/2000/svg" width="362.289" height="491.499" viewBox="0 0 362.289 491.499">
        <rect id="Rectangle_1" data-name="Rectangle 1" width="338.347" height="491.499" rx="10" transform="translate(23.941 0)" fill="#f5faff"/>
        <path id="Rectangle_7" data-name="Rectangle 7" d="M10,0H328.347a10,10,0,0,1,10,10V31.656a0,0,0,0,1,0,0H0a0,0,0,0,1,0,0V10A10,10,0,0,1,10,0Z" transform="translate(23.941 0)" fill="#e8f1fa"/>
        <rect id="Rectangle_8" data-name="Rectangle 8" width="284.152" height="80.962" rx="5" transform="translate(0 71.528)" fill="#e2eefa"/>
        <rect id="Rectangle_9" data-name="Rectangle 9" width="254.039" height="7.335" transform="translate(13.521 87.197)" fill="#f9f9f9"/>
        <rect id="Rectangle_10" data-name="Rectangle 10" width="254.039" height="7.335" transform="translate(13.521 104.671)" fill="#f9f9f9"/>
        <rect id="Rectangle_11" data-name="Rectangle 11" width="254.039" height="7.335" transform="translate(13.521 122.151)" fill="#f9f9f9"/>
        <rect id="Rectangle_12" data-name="Rectangle 12" width="284.152" height="80.962" rx="5" transform="translate(0 185.026)" fill="#e2eefa"/>
        <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="24.11" cy="24.11" rx="24.11" ry="24.11" transform="translate(222.192 201.394)" fill="#f9f9f9"/>
        <rect id="Rectangle_13" data-name="Rectangle 13" width="184.984" height="23.321" transform="translate(19.418 201.394)" fill="#f9f9f9"/>
        <rect id="Rectangle_14" data-name="Rectangle 14" width="184.984" height="8.568" transform="translate(19.418 232.62)" fill="#f9f9f9"/>
        <rect id="Rectangle_15" data-name="Rectangle 15" width="266.883" height="131.303" rx="5" transform="translate(62.333 301.104)" fill="#e2eefa"/>
    </svg>
    <!-- End SVG Window -->
</section>
<!-- End Promo Section -->
@show
<main>
    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @section('footer')
        <footer class="bg-dark pt-4">
            <div class="container">
                <div class="text-center px-md-3 pt-11 mt-3 pb-5">
                    <h5 class="text-white font-weight-normal mb-4">Sharing is caring, support us by just sharing.</h5>
                </div>

                <hr class="opacity-10 mb-0">

                <!-- Copyright and Social Icons -->
                <div class="row px-md-3 py-4">
                    <div class="col-md-8 text-center text-md-left mb-3 mb-md-0">
                        <small class="text-white">&copy; 2019 <a class="text-white" href="https://htmlstream.com">CMS Seeder</a>. Under MIT license.</small>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-1 mr-xl-2">
                                <a class="link-white-55" target="_blank" href="{{ route('sitemap') }}">
                                    Sitemap
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Copyright and Social Icons -->
            </div>
        </footer>
        <!-- End Footer -->
    @show
</main>

<!-- Go to Top -->
<a class="js-go-to duik-go-to" href="javascript:;">
    <span class="fa fa-arrow-up duik-go-to__inner"></span>
</a>
<!-- End Go to Top -->

<!-- Components -->
@include('components/loader')

<script src="{{ mix('/js/base.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>

<!-- JS Global Compulsory -->
<script src="/themes/docs-ui-kit/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/themes/docs-ui-kit/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/themes/docs-ui-kit/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/themes/docs-ui-kit/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- JS -->
<script src="/themes/docs-ui-kit/assets/js/main.js"></script>
<script src="/themes/docs-ui-kit/assets/js/header-fixing.js"></script>
<!-- JS Globals -->
<script>
    window.route = '{!! Route::current()->getName() !!}';
    window.lang = '{!! Route::current()->getPrefix() !!}';
</script>
@section('extrajavascript')
@show

</body>
</html>