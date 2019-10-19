@extends('master')
@section('content')
    <!-- Title Section -->
    <div class="bg-light">
        <div class="container py-5">
            <div class="row align-items-sm-center">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <h1 class="h4 mb-0">Shop</h1>
                </div>

                <div class="col-sm-6">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter justify-content-sm-end mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Title Section -->

    <!-- Hero Section -->
    <div class="container space-top-1 space-top-sm-2 space-bottom-2">
        <div class="row">
            <div class="col-lg-7 mb-7 mb-lg-0">
                <div class="pr-lg-4">
                    <div class="position-relative">
                        <!-- Main Slider -->
                        <div id="heroSlider" class="js-slick-carousel u-slick border rounded"
                             data-fade="true"
                             data-infinite="true"
                             data-autoplay-speed="7000"
                             data-arrows-classes="d-none d-sm-inline-block u-slick__arrow u-slick__arrow--flat-white content-centered-y shadow-soft rounded-circle"
                             data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-inner u-slick__arrow-inner--left ml-3"
                             data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-inner u-slick__arrow-inner--right mr-3"
                             data-nav-for="#heroSliderNav">
                            @foreach($product->assets as $asset)
                            <div class="js-slide">
                                <img class="img-fluid w-100 rounded" src="{{ $asset->url }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <!-- End Main Slider -->

                        <!-- Slider Nav -->
                        <div class="position-absolute bottom-0 right-0 left-0 px-4 py-3">
                            <div id="heroSliderNav" class="js-slick-carousel u-slick u-slick--gutters-1 u-slick--transform-off max-width-27 mx-auto"
                                 data-slides-show="3"
                                 data-infinite="true"
                                 data-autoplay-speed="7000"
                                 data-is-thumbs="true"
                                 data-is-thumbs-progress="true"
                                 data-thumbs-progress-options='{"color": "#377DFF", "width": 8}'
                                 data-thumbs-progress-container=".js-slick-thumb-progress"
                                 data-nav-for="#heroSlider">
                                @foreach($product->assets as $asset)
                                    <div class="js-slide p-1">
                                        <a class="js-slick-thumb-progress position-relative d-block u-avatar border rounded-circle p-1" href="javascript:;">
                                            <img class="img-fluid rounded-circle" src="{{ $asset->url }}" alt="Image Description">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Slider Nav -->
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            <div class="col-lg-5">
                <!-- Title -->
                <div class="mb-5">
                    <h1 class="h3 font-weight-medium">{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                </div>
                <!-- End Title -->

                <!-- Price -->
                <div class="mb-5">
                    <h2 class="font-size-1 text-secondary font-weight-medium mb-0">Price:</h2>
                    <span class="font-size-2 font-weight-medium">{{ format_price($product->price) }}</span>
                </div>
                <!-- End Price -->

                <form id="product-add-to-cart" class="js-validate">
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    @if(count($product->variants))
                        <input type="hidden" name="product_variant_id" value="{{ $product->variants->first()->id }}" />
                    @endif
                    <!-- Quantity -->
                    <div class="form-group">
                    <div class="border rounded py-2 px-3 mb-3">
                        <div class="js-quantity row align-items-center">
                            <div class="col-7">
                                <small class="d-block text-secondary font-weight-medium">Select quantity</small>
                                <input class="js-result form-control h-auto border-0 rounded p-0" name="quantity" required type="number" value="1" />
                            </div>
                            <div class="col-5 text-right">
                                <a id="product-quantity-decrement" class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle"  href="javascript:;">
                                    <small class="fas fa-minus btn-icon__inner"></small>
                                </a>
                                <a id="product-quantity-increment" class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle"  href="javascript:;">
                                    <small class="fas fa-plus btn-icon__inner"></small>
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- End Quantity -->
                    <!-- Attributes -->
                    @foreach($product->attributes as $attribute)
                    <div class="form-group">
                        <label for="select-attribute-{{$attribute->id}}">{{ $attribute->name }}</label>
                        <select class="form-control select-attribute" name="options[]" id="select-attribute-{{$attribute->id}}" data-product-id="{{ $product->id }}">
                            @foreach($attribute->options as $option)
                                <option value="{{$option->id}}">{{ $option->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endforeach
                    <!-- End Attributes -->
                    <div class="mb-4">
                        <input type="submit" class="btn btn-block btn-primary btn-pill transition-3d-hover" value="Add to Cart" />
                    </div>
                </form>
            </div>
            <!-- End Product Description -->
        </div>
    </div>
    <!-- End Hero Section -->
@stop
