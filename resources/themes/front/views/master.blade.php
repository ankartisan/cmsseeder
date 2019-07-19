<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>{{ __('Hot Nuts | Fresh & Hot Nuts at Your Workplace') }}</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/themes/front/favicon.png">

    @section('seo')
    <!--  Meta tags -->
        <meta name="keywords" content="{{ __('office snacks, company catering, event snacks, office nuts') }}">
        <meta name="description" content="{{ __('Providing healthy snacks for employees. Our vending machine will keep nuts fresh and hot and we will refill every week.') }}">

        <!-- Schema.org -->
        <meta itemprop="name" content="{{ __('Providing hot & fresh nuts at your workplace') }}">
        <meta itemprop="description" content="{{ __('Providing healthy snacks for employees. Our vending machine will keep nuts fresh and hot and we will refill every week.') }}">
        <meta itemprop="image" content="/images/img1.jpeg">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ __('Providing hot & fresh nuts at your workplace') }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://hotnuts.rs">
        <meta property="og:image" content="/images/img1.jpeg">
        <meta property="og:description" content="{{ __('Providing healthy snacks for employees. Our vending machine will keep nuts fresh and hot and we will refill every week.') }}">
        <meta property="og:site_name" content="Hot Nuts">
    @show

    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('/css/loader.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/themes/front/assets/vendor/font-awesome/css/fontawesome-all.min.css">
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

                <!-- Content -->
                <div class="row d-none d-md-flex mt-7">
                    <div class="col-sm-6">
                        <strong class="d-block mb-2">Quick Links</strong>

                        <div class="row">
                            <!-- List Group -->
                            <div class="col-6">
                                <div class="list-group list-group-transparent list-group-flush list-group-borderless">
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        Search Results List
                                    </a>
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        Search Results Grid
                                    </a>
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        About
                                    </a>
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        Services
                                    </a>
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        Invoice
                                    </a>
                                </div>
                            </div>
                            <!-- End List Group -->

                            <!-- List Group -->
                            <div class="col-6">
                                <div class="list-group list-group-transparent list-group-flush list-group-borderless">
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        Profile
                                    </a>
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        User Contacts
                                    </a>
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        Reviews
                                    </a>
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <span class="fas fa-angle-right list-group-icon"></span>
                                        Settings
                                    </a>
                                </div>
                            </div>
                            <!-- End List Group -->
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- Banner -->
                        <div class="rounded u-search-push-top__banner">
                            <div class="d-flex align-items-center">
                                <div class="u-search-push-top__banner-container">
                                    <img class="img-fluid u-search-push-top__banner-img" src="/themes/front/assets/img/mockups/img3.png" alt="Image Description">
                                    <img class="img-fluid u-search-push-top__banner-img" src="/themes/front/assets/img/mockups/img2.png" alt="Image Description">
                                </div>

                                <div>
                                    <div class="mb-4">
                                        <strong class="d-block mb-2">Featured Item</strong>
                                        <p>Create astonishing web sites and pages.</p>
                                    </div>
                                    <a class="btn btn-xs btn-soft-success transition-3d-hover" href="index.html">Apply Now <span class="fas fa-angle-right ml-2"></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Banner -->
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
    <!-- End Search -->

    <div class="u-header__section">
        <!-- Topbar -->
        <div class="container u-header__hide-content pt-2">
            <div class="d-flex align-items-center">
                <!-- Language -->
                <div class="position-relative">
                    <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center" href="javascript:;" role="button"
                       aria-controls="languageDropdown"
                       aria-haspopup="true"
                       aria-expanded="false"
                       data-unfold-event="hover"
                       data-unfold-target="#languageDropdown"
                       data-unfold-type="css-animation"
                       data-unfold-duration="300"
                       data-unfold-delay="300"
                       data-unfold-hide-on-scroll="true"
                       data-unfold-animation-in="slideInUp"
                       data-unfold-animation-out="fadeOut">
                        <img class="dropdown-item-icon" src="/themes/front/assets/vendor/flag-icon-css/flags/4x3/us.svg" alt="SVG">
                        <span class="d-inline-block d-sm-none">US</span>
                        <span class="d-none d-sm-inline-block">United States</span>
                    </a>

                    <div id="languageDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="languageDropdownInvoker">
                        <a class="dropdown-item active" href="#">English</a>
                        <a class="dropdown-item" href="#">Deutsch</a>
                        <a class="dropdown-item" href="#">Español‎</a>
                    </div>
                </div>
                <!-- End Language -->

                <div class="ml-auto">
                    <!-- Jump To -->
                    <div class="d-inline-block d-sm-none position-relative mr-2">
                        <a id="jumpToDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center" href="javascript:;" role="button"
                           aria-controls="jumpToDropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-unfold-event="hover"
                           data-unfold-target="#jumpToDropdown"
                           data-unfold-type="css-animation"
                           data-unfold-duration="300"
                           data-unfold-delay="300"
                           data-unfold-hide-on-scroll="true"
                           data-unfold-animation-in="slideInUp"
                           data-unfold-animation-out="fadeOut">
                            Jump to
                        </a>

                        <div id="jumpToDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="jumpToDropdownInvoker">
                            <a class="dropdown-item" href="../pages/help.html">Help</a>
                            <a class="dropdown-item" href="../pages/contacts-agency.html">Contacts</a>
                        </div>
                    </div>
                    <!-- End Jump To -->

                    <!-- Links -->
                    <div class="d-none d-sm-inline-block ml-sm-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-0">
                                <a class="u-header__navbar-link" href="../pages/help.html">Help</a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="u-header__navbar-link" href="../pages/contacts-agency.html">Contacts</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Links -->
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
                        @include('components/cart')
                    </li>
                    <!-- End Shopping Cart -->

                    <!-- Account Login -->
                    {{--<li class="list-inline-item">--}}
                        {{--<!-- Account Sidebar Toggle Button -->--}}
                        {{--<a id="sidebarNavToggler" class="btn btn-xs btn-icon btn-text-secondary" href="javascript:;" role="button"--}}
                           {{--aria-controls="sidebarContent"--}}
                           {{--aria-haspopup="true"--}}
                           {{--aria-expanded="false"--}}
                           {{--data-unfold-event="click"--}}
                           {{--data-unfold-hide-on-scroll="false"--}}
                           {{--data-unfold-target="#sidebarContent"--}}
                           {{--data-unfold-type="css-animation"--}}
                           {{--data-unfold-animation-in="fadeInRight"--}}
                           {{--data-unfold-animation-out="fadeOutRight"--}}
                           {{--data-unfold-duration="500">--}}
                            {{--<span class="fas fa-user-circle btn-icon__inner font-size-1"></span>--}}
                        {{--</a>--}}
                        {{--<!-- End Account Sidebar Toggle Button -->--}}
                    {{--</li>--}}
                    <!-- End Account Login -->
                </ul>
            </div>
        </div>
        <!-- End Topbar -->

        <div id="logoAndNav" class="container">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                <!-- Logo -->
                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="../home/index.html" aria-label="Front">
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
                        <!-- Home -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut"
                            data-position="left">
                            <a id="homeMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Home</a>

                            <!-- Home - Mega Menu -->
                            <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="homeMegaMenu">
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <!-- Banner Image -->
                                        <div class="u-header__banner" style="background-image: url(/themes/front/assets/img/750x750/img1.jpg);">
                                            <div class="u-header__banner-content">
                                                <div class="mb-4">
                                                    <span class="u-header__banner-title">Branding Works</span>
                                                    <p class="u-header__banner-text">Experience a level of our quality in both design &amp; customization works.</p>
                                                </div>
                                                <a class="btn btn-primary btn-sm btn-pill transition-3d-hover" href="#">Learn More <span class="fas fa-angle-right ml-2"></span></a>
                                            </div>
                                        </div>
                                        <!-- End Banner Image -->
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="row u-header__mega-menu-wrapper">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <span class="u-header__sub-menu-title">Classic</span>
                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/index.html">Classic Agency</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/classic-business.html">Classic Business</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/classic-marketing.html">Classic Marketing</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/classic-consulting.html">Classic Consulting</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/classic-start-up.html">Classic Start-up</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/classic-studio.html">Classic Studio <span class="badge badge-success badge-pill ml-1">New</span></a></li>
                                                </ul>

                                                <span class="u-header__sub-menu-title">Corporate</span>
                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/corporate-agency.html">Corporate Agency</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/corporate-start-up.html">Corporate Start-Up</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/corporate-business.html">Corporate Business</a></li>
                                                </ul>

                                                <span class="u-header__sub-menu-title">Portfolio</span>
                                                <ul class="u-header__sub-menu-nav-group">
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/portfolio-agency.html">Portfolio Agency</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/portfolio-profile.html">Portfolio Profile</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-6">
                                                <span class="u-header__sub-menu-title">App</span>
                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/app-ui-kit.html">App UI kit <span class="badge badge-success badge-pill ml-1">New</span></a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/app-saas.html">App SaaS <span class="badge badge-success badge-pill ml-1">New</span></a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/app-workflow.html">App Workflow <span class="badge badge-success badge-pill ml-1">New</span></a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/app-payment.html">App Payment</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/app-software.html">App Software</a></li>
                                                </ul>

                                                <span class="u-header__sub-menu-title">Onepages</span>
                                                <ul class="u-header__sub-menu-nav-group mb-3">
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/onepage-creative.html">Onepage Creative</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/onepage-saas.html">Onepage SaaS</a></li>
                                                </ul>

                                                <span class="u-header__sub-menu-title">Blog</span>
                                                <ul class="u-header__sub-menu-nav-group">
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/blog-agency.html">Blog Agency</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/blog-start-up.html">Blog Start-Up</a></li>
                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="../home/blog-business.html">Blog Business</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Home - Mega Menu -->
                        </li>
                        <!-- End Home -->

                        <!-- Pages -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut">
                            <a id="pagesMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">Pages</a>

                            <!-- Pages - Submenu -->
                            <ul id="pagesSubMenu" class="hs-sub-menu u-header__sub-menu" aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                                <!-- Account -->
                                <li class="hs-has-sub-menu">
                                    <a id="navLinkPagesAccount" class="nav-link u-header__sub-menu-nav-link u-header__sub-menu-nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesAccount">Account</a>

                                    <ul id="navSubmenuPagesAccount" class="hs-sub-menu u-header__sub-menu" aria-labelledby="navLinkPagesAccount" style="min-width: 230px;">
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/dashboard.html">Dashboard</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/profile.html">Profile</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/my-tasks.html">My tasks</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/projects.html">Projects</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/members.html">Members</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/edit-profile.html">Edit profile</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/change-password.html">Change password</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/notifications.html">Notifications</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/activity.html">Activity</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/payment-methods.html">Payment methods</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/invite-friends.html">Invite friends</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/plans.html">Plans</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../account/api-token.html">API Token</a></li>
                                    </ul>
                                </li>
                                <!-- End Account -->

                                <!-- Company -->
                                <li class="hs-has-sub-menu">
                                    <a id="navLinkPagesCompany" class="nav-link u-header__sub-menu-nav-link u-header__sub-menu-nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesCompany">Company</a>

                                    <ul id="navSubmenuPagesCompany" class="hs-sub-menu u-header__sub-menu" aria-labelledby="navLinkPagesCompany" style="min-width: 230px;">
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/about-agency.html">About Agency</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/services-agency.html">Services Agency</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/careers.html">Careers</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/careers-single.html">Careers Single</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/hire-us.html">Hire Us</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/customers.html">Customers</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/customer-story.html">Customer story</a></li>
                                    </ul>
                                </li>
                                <!-- Company -->

                                <!-- Portfolio -->
                                <li class="hs-has-sub-menu">
                                    <a id="navLinkPagesPortfolio" class="nav-link u-header__sub-menu-nav-link u-header__sub-menu-nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesPortfolio">Portfolio</a>

                                    <ul id="navSubmenuPagesPortfolio" class="hs-sub-menu u-header__sub-menu" aria-labelledby="navLinkPagesPortfolio" style="min-width: 230px;">
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/boxed-classic.html">All layouts</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/case-studies-simple.html">Case Studies Simple</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/case-studies-modern.html">Case Studies Modern</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/single-page-simple.html">Single Page Simple</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/single-page-grid.html">Single Page Grid</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../portfolio/single-page-masonry.html">Single Page Masonry</a></li>
                                    </ul>
                                </li>
                                <!-- End Portfolio -->

                                <!-- Login -->
                                <li class="hs-has-sub-menu">
                                    <a id="navLinkPagesLogin" class="nav-link u-header__sub-menu-nav-link u-header__sub-menu-nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesLogin">Login &amp; Signup</a>

                                    <ul id="navSubmenuPagesLogin" class="hs-sub-menu u-header__sub-menu" aria-labelledby="navLinkPagesLogin" style="min-width: 230px;">
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/login.html">Login</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/signup.html">Signup</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/recover-account.html">Recover Account</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/login-simple.html">Login Simple</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/signup-simple.html">Signup Simple</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/recover-account-simple.html">Recover Account Simple</a></li>
                                    </ul>
                                </li>
                                <!-- Signup -->

                                <!-- Contacts -->
                                <li class="hs-has-sub-menu">
                                    <a id="navLinkContactsServices" class="nav-link u-header__sub-menu-nav-link u-header__sub-menu-nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuContactsServices">Contacts</a>

                                    <ul id="navSubmenuContactsServices" class="hs-sub-menu u-header__sub-menu" aria-labelledby="navLinkContactsServices" style="min-width: 230px;">
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/contacts-agency.html">Contacts Agency</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/contacts-start-up.html">Contacts Start-Up</a></li>
                                    </ul>
                                </li>
                                <!-- Contacts -->

                                <!-- Resources -->
                                <li class="hs-has-sub-menu">
                                    <a id="navLinkPagesResources" class="nav-link u-header__sub-menu-nav-link u-header__sub-menu-nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesResources">Resources</a>

                                    <ul id="navSubmenuPagesResources" class="hs-sub-menu u-header__sub-menu" aria-labelledby="navLinkPagesResources" style="min-width: 230px;">
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/help.html">Help</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/help-article.html">Help article</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <!-- Resources -->

                                <!-- Utilities -->
                                <li class="hs-has-sub-menu">
                                    <a id="navLinkPagesUtilities" class="nav-link u-header__sub-menu-nav-link u-header__sub-menu-nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesUtilities">Utilities</a>

                                    <ul id="navSubmenuPagesUtilities" class="hs-sub-menu u-header__sub-menu" aria-labelledby="navLinkPagesUtilities" style="min-width: 230px;">
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/pricing.html">Pricing</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/terms.html">Terms &amp; Conditions</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/privacy.html">Privacy &amp; Policy</a></li>
                                    </ul>
                                </li>
                                <!-- Utilities -->

                                <!-- Specialty -->
                                <li class="hs-has-sub-menu">
                                    <a id="navLinkPagesSpecialty" class="nav-link u-header__sub-menu-nav-link u-header__sub-menu-nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesSpecialty">Specialty</a>

                                    <ul id="navSubmenuPagesSpecialty" class="hs-sub-menu u-header__sub-menu" aria-labelledby="navLinkPagesSpecialty" style="min-width: 230px;">
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/cover-page.html">Cover Page</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/coming-soon.html">Coming Soon</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/maintenance-mode.html">Maintenance Mode</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/status.html">Status</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/invoice.html">Invoice</a></li>
                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="../pages/error-404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <!-- Specialty -->
                            </ul>
                            <!-- End Pages - Submenu -->
                        </li>
                        <!-- End Pages -->

                        <!-- Button -->
                        <li class="nav-item u-header__nav-last-item">
                            <a class="btn btn-sm btn-primary btn-pill transition-3d-hover" href="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/" target="_blank">
                                Buy Now
                            </a>
                        </li>
                        <!-- End Button -->
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
    <!-- Lists -->
    <div class="border-bottom">
        <div class="container space-2">
            <div class="row justify-content-md-between">
                <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0">
                    <h4 class="h6 font-weight-semi-bold">About</h4>

                    <!-- List Group -->
                    <ul class="list-group list-group-flush list-group-borderless mb-0">
                        <li><a class="list-group-item list-group-item-action" href="../pages/about-agency.html">About</a></li>
                        <li><a class="list-group-item list-group-item-action" href="../pages/services-agency.html">Services</a></li>
                        <li><a class="list-group-item list-group-item-action" href="../pages/careers.html">Careers</a></li>
                    </ul>
                    <!-- End List Group -->
                </div>

                <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0">
                    <h4 class="h6 font-weight-semi-bold">Account</h4>

                    <!-- List Group -->
                    <ul class="list-group list-group-flush list-group-borderless mb-0">
                        <li><a class="list-group-item list-group-item-action" href="../account/dashboard.html">Account</a></li>
                        <li><a class="list-group-item list-group-item-action" href="../account/my-tasks.html">My tasks</a></li>
                        <li><a class="list-group-item list-group-item-action" href="../account/projects.html">Projects</a></li>
                    </ul>
                    <!-- End List Group -->
                </div>

                <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0">
                    <h4 class="h6 font-weight-semi-bold">Resources</h4>

                    <!-- List Group -->
                    <ul class="list-group list-group-flush list-group-borderless mb-0">
                        <li><a class="list-group-item list-group-item-action" href="../pages/help.html">Help</a></li>
                        <li><a class="list-group-item list-group-item-action" href="../pages/terms.html">Terms</a></li>
                        <li><a class="list-group-item list-group-item-action" href="../pages/privacy.html">Privacy</a></li>
                    </ul>
                    <!-- End List Group -->
                </div>

                <div class="col-md-6 col-lg-4">
                    <h4 class="h6 font-weight-semi-bold mb-4">We are driven to deliver results for all your businesses.</h4>

                    <!-- Button -->
                    <button type="button" class="btn btn-xs btn-dark btn-wide transition-3d-hover text-left mb-2 mr-1">
              <span class="media align-items-center">
                <span class="fab fa-apple fa-2x mr-3"></span>
                <span class="media-body">
                  <span class="d-block">Download on the</span>
                  <strong class="font-size-1">App Store</strong>
                </span>
              </span>
                    </button>
                    <!-- End Button -->

                    <!-- Button -->
                    <button type="button" class="btn btn-xs btn-dark btn-wide transition-3d-hover text-left mb-2">
              <span class="media align-items-center">
                <span class="fab fa-google-play fa-2x mr-3"></span>
                <span class="media-body">
                  <span class="d-block">Get it on</span>
                  <strong class="font-size-1">Google Play</strong>
                </span>
              </span>
                    </button>
                    <!-- End Button -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Lists -->

    <!-- Copyright -->
    <div class="container text-center space-1">
        <!-- Logo -->
        <a class="d-inline-flex align-items-center mb-2" href="index.html" aria-label="Front">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="36px" height="36px" viewBox="0 0 46 46" xml:space="preserve" style="margin-bottom: 0;">
          <path fill="#3F7DE0" opacity=".65" d="M23,41L23,41c-9.9,0-18-8-18-18v0c0-9.9,8-18,18-18h11.3C38,5,41,8,41,11.7V23C41,32.9,32.9,41,23,41z"/>
                <path class="fill-info" opacity=".5" d="M28,35.9L28,35.9c-9.9,0-18-8-18-18v0c0-9.9,8-18,18-18l11.3,0C43,0,46,3,46,6.6V18C46,27.9,38,35.9,28,35.9z"/>
                <path class="fill-primary" opacity=".7" d="M18,46L18,46C8,46,0,38,0,28v0c0-9.9,8-18,18-18h11.3c3.7,0,6.6,3,6.6,6.6V28C35.9,38,27.9,46,18,46z"/>
                <path class="fill-white" d="M17.4,34V18.3h10.2v2.9h-6.4v3.4h4.8v2.9h-4.8V34H17.4z"/>
        </svg>
            <span class="brand brand-primary">Front</span>
        </a>
        <!-- End Logo -->
        <p class="small text-muted">&copy; Front. 2019 Htmlstream. All rights reserved.</p>
    </div>
    <!-- End Copyright -->
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

<script src="{{ mix('/js/ecommerce.js') }}"></script>

</body>
</html>