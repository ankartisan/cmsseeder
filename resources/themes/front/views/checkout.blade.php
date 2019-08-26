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
                        @foreach($cart->products as $cartProduct)
                            <!-- Product Content -->
                                <div class="border-bottom pb-4 mb-4">
                                    <div class="media">
                                        <div class="position-relative max-width-10 w-100 mr-3">
                                            @if($cartProduct->product->image)
                                                <img class="img-fluid" src="{{ $cartProduct->product->image->url }}" alt="">
                                            @else
                                                <img class="img-fluid" src="https://via.placeholder.com/100" alt="">
                                            @endif
                                            <span class="badge badge-sm badge-primary badge-pos rounded-circle">{{ $cartProduct->quantity }}</span>
                                        </div>
                                        <div class="media-body">
                                            <h2 class="h6">{{ $cartProduct->product->name }}</h2>
                                            <div class="text-secondary font-size-1">
                                                <span>Price:</span>
                                                <span>${{ $cartProduct->total_price }}</span>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Content -->
                        @endforeach
                        <div class="border-bottom pb-4 mb-4">
                            <div class="media align-items-center mb-3">
                                <h3 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Item subtotal ( {{ count($cart->products) }} )</h3>
                                <div class="media-body text-right">
                                    <span class="font-weight-medium">${{ $cart->price }}</span>
                                </div>
                            </div>

                            <div class="media align-items-center mb-3">
                                <h4 class="text-secondary font-size-1 font-weight-normal mb-0 mr-3">Delivery</h4>
                                <div class="media-body text-right">
                                    <span class="font-weight-medium">Free</span>
                                </div>
                            </div>

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
                                <span class="font-weight-medium">${{ $cart->price }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Order Summary -->
                </div>
            </div>

            <div class="col-lg-8 order-lg-1">
                <!-- Basics Accordion -->
                <div id="basicsAccordion">
                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-header card-collapse" id="basicsHeadingOne">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link btn-block d-flex justify-content-between card-btn p-3"
                                        data-toggle="collapse"
                                        data-target="#basicsCollapseOne"
                                        aria-expanded="true"
                                        aria-controls="basicsCollapseOne">
                                    Customer Information

                                    <span class="card-btn-arrow">
                                        <span class="fas fa-arrow-down small"></span>
                                     </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseOne" class="collapse show"
                             aria-labelledby="basicsHeadingOne"
                             data-parent="#basicsAccordion">
                            <div class="card-body">
                                <form id="create-order" class="js-validate">
                                    <div class="border-bottom pb-7 mb-7">
                                        <!-- Billing Form -->
                                        @if($customer)
                                            <input type="hidden" name="customer_id" value="{{ $customer->id }}"  />
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label for="first_name" class="form-label">
                                                        First name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input id="first_name" type="text" class="form-control"  name="customer.first_name"
                                                           required data-msg="Please enter your first name." value="@if($customer){{ $customer->first_name }}@endif" />
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
                                                    <input type="text" class="form-control" name="customer.last_name" required
                                                            value="@if($customer){{ $customer->last_name }}@endif" />
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-12">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Company name
                                                    </label>
                                                    <input type="text" class="form-control" value="@if($customer){{ $customer->billingAddress()->company_name }}@endif"
                                                           name="billing.company_name" />
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
                                                    <input type="email" class="form-control" value="@if($customer){{ $customer->email }}@endif"  name="customer.email" required />
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
                                                    <div class="input-group">
                                                        <div id="dribbleProfileLabel" class="input-group-prepend">
                                                            <select class="form-control custom-select" name="customer.phone_country_code" required >
                                                                <option value="">Country code</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{{ $country->dial_code }}" @if($customer) @if($customer->phone_country_code == $country->dial_code) selected @endif @endif
                                                                    >{{ $country->code }} ( {{ $country->dial_code }} )</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="0631234567" name="customer.phone_number" aria-label="0631234567" required
                                                               value="@if($customer){{ $customer->phone_number }}@endif" />
                                                    </div>
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
                                                    <input type="text" class="form-control" name="billing.address" required
                                                            value="@if($customer){{ $customer->billingAddress()->address }}@endif"/>
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Apt, suite, etc.
                                                    </label>
                                                    <input type="text" name="billing.apt" value="@if($customer){{ $customer->billingAddress()->apt }}@endif"
                                                           class="form-control" />
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
                                                    <input type="text" class="form-control" value="@if($customer){{ $customer->billingAddress()->city }}@endif"
                                                           name="billing.city" required />
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
                                                    <select class="form-control custom-select" name="billing.country_id" required >
                                                        <option value="">Select country</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}" @if($customer) @if($customer->billingAddress()->country_id == $country->id) selected @endif @endif
                                                            >{{ $country->name }}</option>
                                                        @endforeach
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
                                                    <input type="text" class="form-control" name="billing.zip" required
                                                           value="@if($customer){{ $customer->billingAddress()->zip }}@endif" />
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="js-form-message">
                                                    <div class="custom-control custom-checkbox d-flex align-items-center text-muted mb-4">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox-delivery-billing-address"
                                                               name="delivery_billing_address" value="1" @if($customer) @if($customer->isDeliveryBillingAddress()) checked @endif @else checked @endif >
                                                        <label class="custom-control-label" for="checkbox-delivery-billing-address">
                                                            <small>Delivery address same as billing address</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row delivery-address-container hidden">
                                            <!-- Delivery address -->
                                                <div class="col-12">
                                                    <div class="mb-4">
                                                        <h3 class="h6">Delivery address</h3>
                                                    </div>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="col-md-6">
                                                    <!-- Input -->
                                                    <div class="js-form-message mb-6">
                                                        <label for="first_name" class="form-label">
                                                            First name
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" name="delivery.first_name" required data-msg="Please enter your first name."
                                                                value="@if($customer){{ $customer->deliveryAddress()->first_name }}@endif"/>
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
                                                        <input type="text" class="form-control" name="delivery.last_name"  required
                                                                value="@if($customer){{ $customer->deliveryAddress()->last_name }}@endif" />
                                                    </div>
                                                    <!-- End Input -->
                                                </div>
                                                <div class="col-md-12">
                                                    <!-- Input -->
                                                    <div class="js-form-message mb-6">
                                                        <label class="form-label">
                                                            Company name
                                                        </label>
                                                        <input type="text" class="form-control" value="@if($customer){{ $customer->deliveryAddress()->company_name }}@endif"
                                                               name="delivery.company_name" />
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
                                                        <input type="text" class="form-control" name="delivery.address" required
                                                                value="@if($customer){{ $customer->deliveryAddress()->address }}@endif" />
                                                    </div>
                                                    <!-- End Input -->
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- Input -->
                                                    <div class="js-form-message mb-6">
                                                        <label class="form-label">
                                                            Apt, suite, etc.
                                                        </label>
                                                        <input type="text" name="delivery.apt" class="form-control"
                                                               value="@if($customer){{ $customer->deliveryAddress()->apt }}@endif" />
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
                                                        <input type="text" class="form-control" name="delivery.city" required
                                                               value="@if($customer){{ $customer->deliveryAddress()->city }}@endif" />
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
                                                        <select class="form-control custom-select" name="delivery.country_id" required >
                                                            <option value="">Select country</option>
                                                            @foreach($countries as $country)
                                                                <option value="{{ $country->id }}" @if($customer) @if($customer->deliveryAddress()->country_id == $country->id) selected @endif @endif>{{ $country->name }}</option>
                                                            @endforeach
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
                                                        <input type="text" class="form-control" name="delivery.zip" required
                                                               value="@if($customer){{ $customer->deliveryAddress()->zip }}@endif" />
                                                    </div>
                                                    <!-- End Input -->
                                                </div>
                                        </div>
                                        @if(!$customer)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="js-form-message">
                                                    <div class="custom-control custom-checkbox d-flex align-items-center text-muted mb-2">
                                                        <input type="checkbox" class="custom-control-input" value="1" id="checkbox-create-account" name="create_account" >
                                                        <label class="custom-control-label" for="checkbox-create-account">
                                                            <small>Create account</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row password-container hidden">
                                            <div class="w-100"></div>
                                            <div class="col-md-6">
                                                <div class="js-form-message mb-2">
                                                    <label class="form-label">
                                                        Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="password" class="form-control" name="customer.password" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="js-form-message mb-2">
                                                    <label class="form-label">
                                                        Repeat Password
                                                    </label>
                                                    <input type="password" name="customer.password_repeat" class="form-control" required/>
                                                </div>
                                            </div>
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
                    <!-- End Card -->
                    <!-- Card -->
                    @if(!$customer)
                    <div class="card mb-3">
                        <div class="card-header card-collapse" id="basicsHeadingTwo">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link btn-block d-flex justify-content-between card-btn collapsed p-3"
                                        data-toggle="collapse"
                                        data-target="#basicsCollapseTwo"
                                        aria-expanded="false"
                                        aria-controls="basicsCollapseTwo">
                                    I already have an account

                                    <span class="card-btn-arrow">
                                        <span class="fas fa-arrow-down small"></span>
                                        </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseTwo" class="collapse"
                             aria-labelledby="basicsHeadingTwo"
                             data-parent="#basicsAccordion">
                            <div class="card-body">
                                <!-- Form -->
                                <form id="login-order" class="js-validate w-md-50 mx-md-auto">
                                    <!-- Title -->
                                    <div class="mb-4 text-center">
                                        <h2 class="h3 text-primary font-weight-normal mb-0">Welcome <span class="font-weight-semi-bold">back</span></h2>
                                        <p>Login to finish your order.</p>
                                    </div>
                                    <!-- End Title -->

                                    <!-- Form Group -->
                                    <div class="js-form-message form-group">
                                        <label class="form-label" for="login-email">Email address</label>
                                        <input type="email" class="form-control" name="username" id="login-email" placeholder="Email address" aria-label="Email address" required
                                               data-msg="Please enter a valid email address."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="js-form-message form-group">
                                        <label class="form-label" for="login-password">
                                            <span class="d-flex justify-content-between align-items-center">
                                              Password
                                            </span>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="login-password" placeholder="********" aria-label="********" required
                                               data-msg="Your password is invalid. Please try again."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                    <!-- End Form Group -->

                                    <div class="form-group" data-error="message">
                                        <p class="text-danger center error-content"></p>
                                    </div>

                                    <!-- Button -->
                                    <div class="row align-items-center mb-5">
                                        <div class="col-6">
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-primary transition-3d-hover">Login</button>
                                        </div>
                                    </div>
                                    <!-- End Button -->
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- End Card -->
                </div>
                <!-- End Basics Accordion -->
            </div>
        </div>
    </div>
    <!-- End Checkout Section -->
@stop