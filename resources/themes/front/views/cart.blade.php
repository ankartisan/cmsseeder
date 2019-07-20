@extends('master')
@section('content')
    <!-- Cart Section -->
    <div class="container space-1 space-md-2">
        <div class="row">
            <div class="col-lg-8 mb-7 mb-lg-0">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-end border-bottom pb-3 mb-7">
                    <h1 class="h4 mb-0">Shopping cart</h1>
                    <span>2 items</span>
                </div>
                <!-- End Title -->

                <form>
                    <!-- Product Content -->
                    <div class="border-bottom pb-5 mb-5">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="media">
                                    <div class="max-width-15 w-100 mr-3">
                                        <img class="img-fluid" src="themes/front/assets/img/320x320/img2.jpg" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h2 class="h6">Originals national backpack</h2>
                                        <div class="text-secondary font-size-1 mb-1">
                                            <span>Gender:</span>
                                            <span>Men</span>
                                        </div>
                                        <div class="text-secondary font-size-1 mb-1">
                                            <span>Color:</span>
                                            <span>Grey</span>
                                        </div>
                                        <div class="text-secondary font-size-1 mb-1">
                                            <span>Size:</span>
                                            <span>One size</span>
                                            <a class="link-muted ml-2" href="javascript:;">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-5 col-md-3 offset-md-1">
                                <select class="custom-select custom-select-sm w-auto mb-3">
                                    <option value="quantity1">1</option>
                                    <option value="quantity2">2</option>
                                    <option value="quantity3">3</option>
                                    <option value="quantity4">4</option>
                                    <option value="quantity5">5</option>
                                    <option value="quantity6">6</option>
                                    <option value="quantity7">7</option>
                                    <option value="quantity8">8</option>
                                    <option value="quantity9">9</option>
                                    <option value="quantity10">10</option>
                                </select>

                                <a class="d-block text-secondary font-size-1 mb-1" href="javascript:;">
                                    <span class="far fa-trash-alt mr-1"></span>
                                    <span>Remove</span>
                                </a>

                                <a class="d-block text-secondary font-size-1" href="javascript:;">
                                    <span class="far fa-heart mr-1"></span>
                                    <span>Save for later</span>
                                </a>
                            </div>

                            <div class="col-6 col-md-2 text-md-right">
                                <span class="font-weight-medium">$29.99</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Content -->

                    <!-- Product Content -->
                    <div class="row mb-10">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="media">
                                <div class="max-width-15 w-100 mr-3">
                                    <img class="img-fluid" src="themes/front/assets/img/320x320/img3.jpg" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h2 class="h6">Vans large image t-shirt</h2>
                                    <div class="text-secondary font-size-1 mb-1">
                                        <span>Gender:</span>
                                        <span>Women</span>
                                    </div>
                                    <div class="text-secondary font-size-1 mb-1">
                                        <span>Color:</span>
                                        <span>Core Black / Carbon</span>
                                    </div>
                                    <div class="text-secondary font-size-1 mb-1">
                                        <span>Size:</span>
                                        <span>SM</span>
                                        <a class="link-muted ml-2" href="javascript:;">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 col-md-3 offset-md-1">
                            <select class="custom-select custom-select-sm w-auto mb-3">
                                <option value="quantity1">1</option>
                                <option value="quantity2">2</option>
                                <option value="quantity3">3</option>
                                <option value="quantity4">4</option>
                                <option value="quantity5">5</option>
                                <option value="quantity6">6</option>
                                <option value="quantity7">7</option>
                                <option value="quantity8">8</option>
                                <option value="quantity9">9</option>
                                <option value="quantity10">10</option>
                            </select>

                            <a class="d-block text-secondary font-size-1 mb-1" href="javascript:;">
                                <span class="far fa-trash-alt mr-1"></span>
                                <span>Remove</span>
                            </a>

                            <a class="d-block text-secondary font-size-1" href="javascript:;">
                                <span class="far fa-heart mr-1"></span>
                                <span>Save for later</span>
                            </a>
                        </div>

                        <div class="col-6 col-md-2 text-md-right">
                            <span class="font-weight-medium">$43.99</span>
                        </div>
                    </div>
                    <!-- End Product Content -->

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('products') }}">
                            <small class="fas fa-arrow-left mr-1"></small>
                            Continue shopping
                        </a>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="pl-lg-4">
                    <!-- Order Summary -->
                    <div class="border shadow-soft rounded p-5 mb-4">
                        <!-- Title -->
                        <div class="border-bottom pb-4 mb-4">
                            <h2 class="h5 mb-0">Order summary</h2>
                        </div>
                        <!-- End Title -->

                        <div class="border-bottom pb-4 mb-4">
                            <div class="media align-items-center mb-3">
                                <h3 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Item subtotal (2)</h3>
                                <div class="media-body text-right">
                                    <span class="font-weight-medium">$73.98</span>
                                </div>
                            </div>

                            <div class="media align-items-center mb-3">
                                <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Delivery</h4>
                                <div class="media-body text-right">
                                    <span class="font-weight-medium">Free</span>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="card border-0 mb-3">
                                <div class="card-body p-0">
                                    <div class="custom-control custom-radio d-flex align-items-center small">
                                        <input type="radio" class="custom-control-input" id="deliveryRadio1" name="deliveryRadio" checked>
                                        <label class="custom-control-label ml-1" for="deliveryRadio1">
                                            <span class="d-block font-size-1 font-weight-medium mb-1">Free - Standard delivery</span>
                                            <span class="d-block text-muted">Shipment may take 5-6 business days.</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Checkbox -->
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="custom-control custom-radio d-flex align-items-center small">
                                        <input type="radio" class="custom-control-input" id="deliveryRadio2" name="deliveryRadio">
                                        <label class="custom-control-label ml-1" for="deliveryRadio2">
                                            <span class="d-block font-size-1 font-weight-medium mb-1">$7.99 - Express delivery</span>
                                            <span class="d-block text-muted">Shipment may take 2-3 business days.</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Checkbox -->
                        </div>

                        <div class="media align-items-center mb-3">
                            <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Estimated tax</h4>
                            <div class="media-body text-right">
                                <span class="font-weight-medium">--</span>
                            </div>
                        </div>

                        <div class="media align-items-center mb-4">
                            <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Total</h4>
                            <div class="media-body text-right">
                                <span class="font-weight-medium">$73.98</span>
                            </div>
                        </div>

                        <a class="btn btn-primary btn-pill transition-3d-hover" href="{{ route('checkout') }}">Checkout</a>
                    </div>
                    <!-- End Order Summary -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Section -->
@stop