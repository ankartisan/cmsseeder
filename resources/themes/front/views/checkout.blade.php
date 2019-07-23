@extends('master')
@section('content')
    <!-- Checkout Section -->
    <div class="container space-1 space-md-2">
        <div class="row">
            <div class="col-lg-4 order-lg-2 mb-7 mb-lg-0">
                <div class="pl-lg-4">
                    <!-- Order Summary -->
                    <div class="border shadow-soft rounded p-5 mb-4">
                        <!-- Title -->
                        <div class="border-bottom pb-4 mb-4">
                            <h2 class="h5 mb-0">Order summary</h2>
                        </div>
                        <!-- End Title -->

                        <!-- Product Content -->
                        <div class="border-bottom pb-4 mb-4">
                            <div class="media">
                                <div class="position-relative max-width-10 w-100 mr-3">
                                    <img class="img-fluid" src="/themes/front/assets/img/320x320/img2.jpg" alt="Image Description">
                                    <span class="badge badge-sm badge-primary badge-pos rounded-circle">1</span>
                                </div>
                                <div class="media-body">
                                    <h2 class="h6">Originals national backpack</h2>
                                    <div class="text-secondary font-size-1">
                                        <span>Gender:</span>
                                        <span>Men</span>
                                    </div>
                                    <div class="text-secondary font-size-1">
                                        <span>Color:</span>
                                        <span>Grey</span>
                                    </div>
                                    <div class="text-secondary font-size-1">
                                        <span>Size:</span>
                                        <span>One size</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Content -->

                        <!-- Product Content -->
                        <div class="border-bottom pb-4 mb-4">
                            <div class="media">
                                <div class="position-relative max-width-10 w-100 mr-3">
                                    <img class="img-fluid" src="/themes/front/assets/img/320x320/img3.jpg" alt="Image Description">
                                    <span class="badge badge-sm badge-primary badge-pos rounded-circle">1</span>
                                </div>
                                <div class="media-body">
                                    <h2 class="h6">Vans large image t-shirt</h2>
                                    <div class="text-secondary font-size-1">
                                        <span>Gender:</span>
                                        <span>Women</span>
                                    </div>
                                    <div class="text-secondary font-size-1">
                                        <span>Color:</span>
                                        <span>Core Black / Carbon</span>
                                    </div>
                                    <div class="text-secondary font-size-1">
                                        <span>Size:</span>
                                        <span>SM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Content -->

                        <!-- Fees -->
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
                            <div class="card border-0 mb-3">
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

                            <div class="media align-items-center">
                                <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Estimated tax</h4>
                                <div class="media-body text-right">
                                    <span class="font-weight-medium">--</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Fees -->

                        <!-- Total -->
                        <div class="media align-items-center">
                            <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Total</h4>
                            <div class="media-body text-right">
                                <span class="font-weight-semi-bold">$73.98</span>
                            </div>
                        </div>
                        <!-- End Total -->
                    </div>
                    <!-- End Order Summary -->
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <form id="create-order" class="js-validate">
                    <div class="border-bottom pb-7 mb-7">
                        <!-- Title -->
                        <div class="mb-4">
                            <h2 class="h4">Billing address</h2>
                        </div>
                        <!-- End Title -->

                        <!-- Billing Form -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label for="first_name" class="form-label">
                                        First name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" required data-msg="Please enter your frist name." />
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Last name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="last_name" required />
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Email address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" required />
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Phone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" placeholder="0631234567" aria-label="0631234567" required />
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-8">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Street address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="street_address" required />
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apt, suite, etc.
                                    </label>
                                    <input type="text" name="apt" class="form-control" />
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        City
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="city" required />
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Country
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control custom-select" required >
                                        <option value="">Select country</option>

                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Postcode/Zip
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="postcode" required />
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>
                        </div>
                        <!-- End Billing Form -->
                    </div>

                    <!-- Place Order -->
                    <div class="mb-7">
                        <!-- Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('cart') }}"><small class="fas fa-arrow-left mr-2"></small> Return to cart</a>
                            <button type="submit" class="btn btn-primary btn-sm-wide btn-pill transition-3d-hover">Place order</button>
                        </div>
                        <!-- End Button -->
                    </div>
                    <!-- Place Order -->
                </form>
            </div>
        </div>
    </div>
    <!-- End Checkout Section -->
@stop