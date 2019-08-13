@extends('master')
@section('content')
    <!-- Cart Section -->
    <div class="container space-1 space-md-2">
        <div class="row">
            <div class="col-lg-8 mb-7 mb-lg-0">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-end border-bottom pb-3 mb-7">
                    <h1 class="h4 mb-0">Shopping cart</h1>
                    <span>{{ count($cart->products) }} items</span>
                </div>
                <!-- End Title -->

                    @foreach($cart->products as $cartProduct)
                    <!-- Product Content -->
                    <div id="container-cart-product-{{$cartProduct->id}}" class="border-bottom pb-5 mb-5" >
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="media">
                                    <div class="max-width-15 w-100 mr-3">
                                        <img class="img-fluid" src="themes/front/assets/img/320x320/img2.jpg" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h2 class="h6">{{ $cartProduct->product->name }}</h2>
                                        <div class="text-secondary font-size-1 mb-1">
                                            <span>{{ $cartProduct->product->description }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-5 col-md-3 offset-md-1">
                                <select class="custom-select custom-select-sm w-auto mb-3 cart-product-update" data-cart-product-id="{{ $cartProduct->id }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>

                                <a class="d-block text-secondary font-size-1 mb-1 cart-product-remove btn-cursor"  data-cart-product-id="{{ $cartProduct->id }}"
                                    data-remove-id="container-cart-product-{{ $cartProduct->id }}">
                                    <span class="far fa-trash-alt mr-1"></span>
                                    <span>Remove</span>
                                </a>
                            </div>
                            <div class="col-6 col-md-2 text-md-right">
                                <span class="font-weight-medium">${{ $cartProduct->total_price }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Content -->
                    @endforeach
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('products') }}">
                            <small class="fas fa-arrow-left mr-1"></small>
                            Continue shopping
                        </a>
                    </div>
            </div>

            <div class="col-lg-4">
                <div class="pl-lg-4 order-summary-container">
                    <!-- Order Summary -->
                    @include('components/order_summary')
                    <!-- End Order Summary -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Section -->
@stop