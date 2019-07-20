@extends('master')
@section('content')
    <!-- Hero Section -->
    <div class="position-relative">
        <!-- Main Slider -->
        <div id="heroSlider" class="js-slick-carousel u-slick u-slick--equal-height bg-light"
             data-fade="true"
             data-infinite="true"
             data-autoplay-speed="7000"
             data-arrows-classes="d-none d-lg-inline-block u-slick__arrow u-slick__arrow--flat-white u-slick__arrow-centered--y shadow-soft rounded-circle"
             data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-5"
             data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-5"
             data-nav-for="#heroSliderNav">
            <!-- Slide -->
            <div class="js-slide">
                <div class="container space-top-2 space-bottom-3">
                    <div class="row align-items-lg-center">
                        <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                            <div class="mb-6">
                                <h1 class="display-4 font-size-md-down-5 font-weight-semi-bold mb-4">Front original design cap</h1>
                                <p>As well as being game-changers when it comes to technical innovation, Front has some of the bestselling cap in its locker.</p>
                            </div>
                            <a class="btn btn-primary btn-pill transition-3d-hover px-5 mr-2" href="#">$59 - Add to Cart</a>
                            <a class="btn btn-icon btn-outline-primary rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </a>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="w-85 mx-auto">
                                <img class="img-fluid" src="themes/front/assets/img/mockups/img5.png" alt="Image Description">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slide -->

            <!-- Slide -->
            <div class="js-slide">
                <div class="container space-top-2 space-bottom-3">
                    <div class="row align-items-lg-center">
                        <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                            <div class="mb-6">
                                <h2 class="display-4 font-size-md-down-5 font-weight-semi-bold mb-4">Apple iPad Pro</h2>
                                <p>It's all new, all screen, and all powerful. Completely redesigned and packed with our most advanced technology, it will make you rethink what iPad is capable of.</p>
                            </div>
                            <a class="btn btn-primary btn-pill transition-3d-hover px-5 mr-2" href="#">$799 - Add to Cart</a>
                            <a class="btn btn-icon btn-outline-primary rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </a>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="w-85 mx-auto">
                                <img class="img-fluid" src="themes/front/assets/img/mockups/img6.png" alt="Image Description">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slide -->

            <!-- Slide -->
            <div class="js-slide">
                <div class="container space-top-2 space-bottom-3">
                    <div class="row align-items-lg-center">
                        <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                            <div class="mb-6">
                                <h3 class="display-4 font-size-md-down-5 font-weight-semi-bold mb-4">Celio hoodie</h3>
                                <p>Founded in 1985, French label Celio channels 30 years of expertise into its contemporary menswear range. Expect fly style for a city or beach with its denim shorts, chinos and printed jersey.</p>
                            </div>
                            <a class="btn btn-primary btn-pill transition-3d-hover px-5 mr-2" href="#">$15 - Add to Cart</a>
                            <a class="btn btn-icon btn-outline-primary rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </a>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <div class="w-85 mx-auto">
                                <img class="img-fluid" src="themes/front/assets/img/mockups/img1.png" alt="Image Description">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slide -->
        </div>
        <!-- End Main Slider -->

        <!-- Slider Nav -->
        <div class="position-absolute bottom-0 w-100">
            <div class="container space-bottom-1">
                <div id="heroSliderNav" class="js-slick-carousel u-slick u-slick--transform-off max-width-27 mx-auto"
                     data-slides-show="3"
                     data-autoplay-speed="7000"
                     data-infinite="true"
                     data-is-thumbs="true"
                     data-is-thumbs-progress="true"
                     data-thumbs-progress-options='{
                 "color": "#377dff",
                 "width": 8
               }'
                     data-thumbs-progress-container=".js-slick-thumb-progress"
                     data-nav-for="#heroSlider">
                    <div class="js-slide p-1">
                        <a class="js-slick-thumb-progress position-relative d-block u-avatar border rounded-circle p-1" href="javascript:;">
                            <img class="img-fluid rounded-circle" src="themes/front/assets/img/100x100/img13.jpg" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide p-1">
                        <a class="js-slick-thumb-progress position-relative d-block u-avatar border rounded-circle p-1" href="javascript:;">
                            <img class="img-fluid rounded-circle" src="themes/front/assets/img/100x100/img14.jpg" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide p-1">
                        <a class="js-slick-thumb-progress position-relative d-block u-avatar border rounded-circle p-1" href="javascript:;">
                            <img class="img-fluid rounded-circle" src="themes/front/assets/img/100x100/img15.jpg" alt="Image Description">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Nav -->
    </div>
    <!-- End Hero Section -->

    <!-- Features Section -->
    <div class="border-bottom">
        <div id="featuresSVG" class="svg-preloader container space-2">
            <div class="row">
                <div class="col-md-4 mb-7 mb-md-0">
                    <!-- Contacts -->
                    <div class="media">
                        <figure class="ie-height-56 w-100 max-width-8 mr-4">
                            <img class="js-svg-injector" src="themes/front/assets/svg/icons/icon-4.svg" alt="SVG"
                                 data-parent="#featuresSVG">
                        </figure>
                        <div class="media-body">
                            <h4 class="h6 mb-1">24/7 Support</h4>
                            <p class="font-size-1 mb-0">Contact us 24 hours a day, 7 days a week.</p>
                        </div>
                    </div>
                    <!-- End Contacts -->
                </div>

                <div class="col-md-4 mb-7 mb-md-0">
                    <!-- Contacts -->
                    <div class="media">
                        <figure class="ie-height-56 w-100 max-width-8 mr-4">
                            <img class="js-svg-injector" src="themes/front/assets/svg/icons/icon-64.svg" alt="SVG"
                                 data-parent="#featuresSVG">
                        </figure>
                        <div class="media-body">
                            <h4 class="h6 mb-1">30 Days return</h4>
                            <p class="font-size-1 mb-0">We offer you a full refund within 30 days of purchase.</p>
                        </div>
                    </div>
                    <!-- End Contacts -->
                </div>

                <div class="col-md-4">
                    <!-- Contacts -->
                    <div class="media">
                        <figure class="ie-height-56 w-100 max-width-8 mr-4">
                            <img class="js-svg-injector" src="themes/front/assets/svg/icons/icon-65.svg" alt="SVG"
                                 data-parent="#featuresSVG">
                        </figure>
                        <div class="media-body">
                            <h4 class="h6 mb-1">Free shipping</h4>
                            <p class="font-size-1 mb-0">Automatically receive free standard shipping on every order.</p>
                        </div>
                    </div>
                    <!-- End Contacts -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Features Section -->

    <!-- Categories Section -->
    <div class="container space-2 space-lg-3">
        <!-- Title -->
        <div class="w-md-80 w-lg-40 text-center mx-md-auto mb-9">
            <h2 class="h3 font-weight-medium">The better way to shop with Front top-products</h2>
        </div>
        <!-- End Title -->

        <div class="row mb-5">
            <div class="col-md-4 mb-5 mb-md-0">
                <!-- Card -->
                <div class="card d-block">
                    <div class="card-body d-flex align-items-center p-0">
                        <div class="w-65 border-right">
                            <img class="img-fluid" src="themes/front/assets/img/380x400/img3.jpg" alt="Image Description">
                        </div>
                        <div class="w-35">
                            <div class="border-bottom">
                                <img class="img-fluid" src="themes/front/assets/img/380x360/img32.jpg" alt="Image Description">
                            </div>
                            <img class="img-fluid" src="themes/front/assets/img/380x360/img33.jpg" alt="Image Description">
                        </div>
                    </div>
                    <div class="card-footer text-center py-4">
                        <h3 class="h5 mb-1">T-shirts</h3>
                        <span class="d-block text-muted font-size-1 mb-3">Starting from $29.99</span>
                        <a class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover px-5" href="#">View All T-shirts</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-md-4 mb-5 mb-md-0">
                <!-- Card -->
                <div class="card d-block">
                    <div class="card-body d-flex align-items-center p-0">
                        <div class="w-65 border-right">
                            <img class="img-fluid" src="themes/front/assets/img/380x400/img4.jpg" alt="Image Description">
                        </div>
                        <div class="w-35">
                            <div class="border-bottom">
                                <img class="img-fluid" src="themes/front/assets/img/380x360/img34.jpg" alt="Image Description">
                            </div>
                            <img class="img-fluid" src="themes/front/assets/img/380x360/img35.jpg" alt="Image Description">
                        </div>
                    </div>
                    <div class="card-footer text-center py-4">
                        <h3 class="h5 mb-1">Tech covers</h3>
                        <span class="d-block text-muted font-size-1 mb-3">Starting from $399.99</span>
                        <a class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover px-5" href="#">View All Tech covers</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-md-4">
                <!-- Card -->
                <div class="card d-block">
                    <div class="card-body d-flex align-items-center p-0">
                        <div class="w-65 border-right">
                            <img class="img-fluid" src="themes/front/assets/img/380x400/img5.jpg" alt="Image Description">
                        </div>
                        <div class="w-35">
                            <div class="border-bottom">
                                <img class="img-fluid" src="themes/front/assets/img/380x360/img36.jpg" alt="Image Description">
                            </div>
                            <img class="img-fluid" src="themes/front/assets/img/380x360/img37.jpg" alt="Image Description">
                        </div>
                    </div>
                    <div class="card-footer text-center py-4">
                        <h3 class="h5 mb-1">Caps</h3>
                        <span class="d-block text-muted font-size-1 mb-3">Starting from $13.99</span>
                        <a class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover px-5" href="#">View All Caps</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>

        <div class="text-center">
            <p class="small">Limited time only, while stocks last.</p>
        </div>
    </div>
    <!-- End Categories Section -->

    <!-- Products Section -->
    <div class="container space-2 space-lg-3">
        <!-- Title -->
        <div class="w-md-80 w-lg-40 text-center mx-md-auto mb-9">
            <h2 class="h3 font-weight-medium">What's trending</h2>
        </div>
        <!-- End Title -->

        <!-- Products -->
        <div class="row mx-n2 mx-sm-n3 mb-7">
            <div class="col-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="themes/front/assets/img/300x180/img3.jpg" alt="Image Description">

                        <div class="position-absolute top-0 left-0 pt-3 pl-3">
                            <span class="badge badge-success badge-pill">New arrival</span>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Accessories</a>
                            <h3 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="single-product.html">Herschel backpack in dark blue</a>
                            </h3>
                            <div class="d-block font-size-1">
                                <span class="font-weight-medium">$56.99</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary">0</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="col-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="themes/front/assets/img/300x180/img12.jpg" alt="Image Description">

                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Clothing</a>
                            <h4 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="single-product.html">Front hoodie</a>
                            </h4>
                            <div class="d-block">
                                <span class="font-weight-medium">$91.88</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary">40</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="col-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="themes/front/assets/img/300x180/img4.jpg" alt="Image Description">

                        <div class="position-absolute top-0 left-0 pt-3 pl-3">
                            <span class="badge badge-danger badge-pill">Sold out</span>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Accessories</a>
                            <h4 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="single-product.html">Herschel backpack in gray</a>
                            </h4>
                            <div class="d-block font-size-1">
                                <span class="font-weight-medium">$29.99</span>
                                <span class="text-secondary ml-1"><del>$33.99</del></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary">125</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="col-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="themes/front/assets/img/300x180/img6.jpg" alt="Image Description">

                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Clothing</a>
                            <h4 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="single-product.html">Front Originals adicolor t-shirt with trefoil logo</a>
                            </h4>
                            <div class="d-block">
                                <span class="font-weight-medium">$38.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary">9</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="col-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5 mb-lg-0">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="themes/front/assets/img/300x180/img7.jpg" alt="Image Description">

                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Accessories</a>
                            <h4 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="single-product.html">Front mesh baseball cap with signature logo</a>
                            </h4>
                            <div class="d-block">
                                <span class="font-weight-medium">$8.88</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary">31</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="col-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5 mb-lg-0">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="themes/front/assets/img/300x180/img11.jpg" alt="Image Description">

                        <div class="position-absolute top-0 left-0 pt-3 pl-3">
                            <span class="badge badge-success badge-pill">New arrival</span>
                        </div>
                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Clothing</a>
                            <h4 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="single-product.html">Front Originals adicolor t-shirt in gray</a>
                            </h4>
                            <div class="d-block">
                                <span class="font-weight-medium">$24.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary">0</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="col-6 col-lg-3 px-2 px-sm-3">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="themes/front/assets/img/300x180/img9.jpg" alt="Image Description">

                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Clothing</a>
                            <h4 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="single-product.html">COLLUSION Unisex mechanic print t-shirt</a>
                            </h4>
                            <div class="d-block">
                                <span class="font-weight-medium">$43.99</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                    <small class="far fa-star text-muted"></small>
                                </div>
                                <span class="text-secondary">0</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>

            <div class="col-6 col-lg-3 px-2 px-sm-3">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <img class="card-img-top" src="themes/front/assets/img/300x180/img8.jpg" alt="Image Description">

                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-secondary rounded-circle" data-toggle="tooltip" data-placement="top" title="Save for later">
                                <span class="fas fa-heart btn-icon__inner"></span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="#">Accessories</a>
                            <h4 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="single-product.html">Billabong Walled snapback in green</a>
                            </h4>
                            <div class="d-block">
                                <span class="font-weight-medium">$12.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <div class="mb-3">
                            <a class="d-inline-flex align-items-center small" href="#">
                                <div class="text-warning mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                </div>
                                <span class="text-secondary">2</span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>
        </div>
        <!-- End Products -->

        <div class="text-center">
            <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="#">View Products</a>
        </div>
    </div>
    <!-- End Products Section -->

    <!-- Subscribe Section -->
    <div class="bg-light">
        <div class="container space-2">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6">
                    <!-- Title -->
                    <div class="text-center mb-4">
                        <h2 class="h1 font-weight-medium">Stay in the know</h2>
                        <p>Get special offers on the latest developments from Front.</p>
                    </div>
                    <!-- End Title -->

                    <!-- Subscribe Form -->
                    <form class="js-validate js-form-message w-lg-85 mx-lg-auto">
                        <label class="sr-only" for="subscribeSrEmail">Email address</label>
                        <div class="input-group input-group-pill">
                            <input type="email" class="form-control" name="email" id="subscribeSrEmail" placeholder="Email address" aria-label="Email address" aria-describedby="subscribeButton" required
                                   data-msg="Please enter a valid email address.">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm-wide" id="subscribeButton">Join</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe Section -->

    <!-- Clients Section -->
    <div class="container space-2">
        <div class="row justify-content-between text-center">
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-4">
                    <img class="u-clients" src="themes/front/assets/svg/clients-logo/hollister.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-4">
                    <img class="u-clients" src="themes/front/assets/svg/clients-logo/levis.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2 mb-5 mb-lg-0">
                <div class="mx-4">
                    <img class="u-clients" src="themes/front/assets/svg/clients-logo/new-balance.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-4">
                    <img class="u-clients" src="themes/front/assets/svg/clients-logo/puma.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-4">
                    <img class="u-clients" src="themes/front/assets/svg/clients-logo/nike.svg" alt="Image Description">
                </div>
            </div>
            <div class="col-4 col-lg-2">
                <div class="mx-4">
                    <img class="u-clients" src="themes/front/assets/svg/clients-logo/tnf.svg" alt="Image Description">
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Section -->
@stop