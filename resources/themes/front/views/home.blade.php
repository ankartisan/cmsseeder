@extends('master')
@section('content')
    @if(count($featuredProducts))
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
            @foreach($featuredProducts as $product)
                <!-- Slide -->
                <div class="js-slide">
                    <div class="container space-top-2 space-bottom-3">
                        <div class="row align-items-lg-center">
                            <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                                <div class="mb-6">
                                    <h1 class="display-4 font-size-md-down-5 font-weight-semi-bold mb-4">{{ $product->name }}</h1>
                                    <p>{{ $product->description }}</p>
                                </div>
                                <a class="btn btn-primary btn-pill transition-3d-hover px-5 mr-2 btn-product-add" href="javascript:;" data-product-id="{{ $product->id }}">${{ $product->price }} - Add to Cart</a>
                            </div>
                            <div class="col-lg-6 order-lg-1">
                                <div class="w-85 mx-auto">
                                    <img class="img-fluid" src="{{ $product->image->url }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Slide -->
            @endforeach
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
                    @foreach($featuredProducts as $product)
                    <div class="js-slide p-1">
                        <a class="js-slick-thumb-progress position-relative d-block u-avatar border rounded-circle p-1" href="javascript:;">
                            <img class="img-fluid rounded-circle" src="{{ $product->image->url }}" alt="Image Description">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Slider Nav -->
    </div>
    <!-- End Hero Section -->
    @endif
    <!-- Categories Section -->
    <div class="container space-2 space-lg-2">
        <!-- Title -->
        <div class="w-md-80 w-lg-40 text-center mx-md-auto mb-9">
            <h2 class="h3 font-weight-medium">The better way to shop with Front top-products</h2>
        </div>
        <!-- End Title -->

        <div class="row mb-5">
            @foreach($categories as $category)
            <div class="col-md-4 mb-5 mb-md-0">
                <!-- Card -->
                <div class="card d-block">
                    <div class="card-body d-flex align-items-center p-0">
                        <div class="w-65 border-right">
                            @if(isset($category->assets[0]))
                                <img class="img-fluid" src="{{ $category->assets[0]->url }}" alt="">
                            @else
                                <img class="img-fluid" src="https://via.placeholder.com/200" alt="">
                            @endif
                        </div>
                        <div class="w-35">
                            <div class="border-bottom">
                                @if(isset($category->assets[1]))
                                    <img class="img-fluid" src="{{ $category->assets[1]->url }}" alt="">
                                @else
                                    <img class="img-fluid" src="https://via.placeholder.com/200" alt="">
                                @endif
                            </div>
                            @if(isset($category->assets[2]))
                                <img class="img-fluid" src="{{ $category->assets[2]->url }}" alt="">
                            @else
                                <img class="img-fluid" src="https://via.placeholder.com/200" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-center py-4">
                        <h3 class="h5 mb-1">{{ $category->name }}</h3>
                        <span class="d-block text-muted font-size-1 mb-3">{{ $category->description }}</span>
                        <a class="btn btn-sm btn-outline-primary btn-pill transition-3d-hover px-5" href="{{ route('products', ['categories' => $category->id]) }}">View All {{ $category->name }}</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            @endforeach
        </div>

        <div class="text-center">
            <p class="small">Limited time only, while stocks last.</p>
        </div>
    </div>
    <!-- End Categories Section -->

    <!-- Products Section -->
    <div class="container space-2 space-lg-2">
        <!-- Title -->
        <div class="w-md-80 w-lg-40 text-center mx-md-auto mb-9">
            <h2 class="h3 font-weight-medium">What's trending</h2>
        </div>
        <!-- End Title -->

        <!-- Products -->
        <div class="row mx-n2 mx-sm-n3 mb-7">
            @foreach($products as $product)
            <div class="col-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                <!-- Product -->
                <div class="card text-center h-100">
                    <div class="position-relative">
                        <a href="{{ route('product', ['id' => $product->id]) }}" >
                        @if($product->image)
                            <div class="image product-image-container" style="background-image: url('{{ $product->image->url }}')"></div>
                        @else
                            <div class="image product-image-container" style="background-image: url('https://via.placeholder.com/200')"></div>
                        @endif
                        </a>
                        <div class="position-absolute top-0 left-0 pt-3 pl-3">
                        </div>
                        <div class="position-absolute top-0 right-0 pt-3 pr-3">
                        </div>
                    </div>

                    <div class="card-body pt-4 px-4 pb-0">
                        <div class="mb-2">
                            <a class="d-inline-block text-secondary small font-weight-medium mb-1" href="{{ route('product', ['id' => $product->id]) }}">
                                {{ $product->category ? $product->category->name : "" }}
                            </a>
                            <h3 class="font-size-1 font-weight-normal">
                                <a class="text-secondary" href="{{ route('product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="d-block font-size-1">
                                <span class="font-weight-medium">${{ $product->price }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 pt-0 pb-4 px-4">
                        <button type="button" data-product-id="{{ $product->id }}" class="btn btn-sm btn-outline-primary btn-sm-wide btn-pill transition-3d-hover btn-product-add">Add to Cart</button>
                    </div>
                </div>
                <!-- End Product -->
            </div>
            @endforeach
        </div>
        <!-- End Products -->

        <div class="text-center">
            <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="{{ route('products') }}">View Products</a>
        </div>
    </div>
    <!-- End Products Section -->
@stop