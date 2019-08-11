@extends('master')
@section('content')
        <!-- Hero Section -->
        <div class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll"
             data-options='{direction: "normal"}'>
            <!-- Apply your Parallax background image here -->
            <div class="divimage dzsparallaxer--target" style="height: 120%; background-image: url(/themes/front/assets/img/1920x800/img13.jpg);"></div>

            <!-- Content -->
            <div class="container position-relative space-2 space-top-md-5 space-bottom-md-3 z-index-2">
                <div class="w-lg-80 text-center mx-auto">
                    <h1 class="display-3 font-size-md-down-5 text-white font-weight-semi-bold">Got a question?</h1>
                    <p class="lead text-white">We'd love to talk about how we can help you.</p>
                </div>
            </div>
            <!-- End Content -->
        </div>
        <!-- End Hero Section -->

        <!-- Contacts Info Section -->
        <div class="clearfix space-2">
            <div class="row no-gutters">
                <div class="col-sm-6 col-lg-3 u-ver-divider u-ver-divider--none-lg">
                    <!-- Contacts Info -->
                    <div class="text-center p-5">
                        <figure id="icon8" class="svg-preloader ie-height-56 max-width-8 mx-auto mb-3">
                            <img class="js-svg-injector" src="/themes/front/assets/svg/icons/icon-8.svg" alt="SVG"
                                 data-parent="#icon8">
                        </figure>
                        <h2 class="h6 mb-0">Address</h2>
                        <p class="mb-0">153 Williamson Plaza, 09514</p>
                    </div>
                    <!-- End Contacts Info -->
                </div>

                <div class="col-sm-6 col-lg-3 u-ver-divider u-ver-divider--none-lg">
                    <!-- Contacts Info -->
                    <div class="text-center p-5">
                        <figure id="icon15" class="svg-preloader ie-height-56 max-width-8 mx-auto mb-3">
                            <img class="js-svg-injector" src="/themes/front/assets/svg/icons/icon-15.svg" alt="SVG"
                                 data-parent="#icon15">
                        </figure>
                        <h3 class="h6 mb-0">Email</h3>
                        <p class="mb-0">support@htmlstream.com</p>
                    </div>
                    <!-- End Contacts Info -->
                </div>

                <div class="col-sm-6 col-lg-3 u-ver-divider u-ver-divider--none-lg">
                    <!-- Contacts Info -->
                    <div class="text-center p-5">
                        <figure id="icon16" class="svg-preloader ie-height-56 max-width-8 mx-auto mb-3">
                            <img class="js-svg-injector" src="/themes/front/assets/svg/icons/icon-16.svg" alt="SVG"
                                 data-parent="#icon16">
                        </figure>
                        <h3 class="h6 mb-0">Phone Number</h3>
                        <p class="mb-0">+1 (062) 109-9222</p>
                    </div>
                    <!-- End Contacts Info -->
                </div>

                <div class="col-sm-6 col-lg-3">
                    <!-- Contacts Info -->
                    <div class="text-center p-5">
                        <figure id="icon17" class="svg-preloader ie-height-56 max-width-8 mx-auto mb-3">
                            <img class="js-svg-injector" src="/themes/front/assets/svg/icons/icon-17.svg" alt="SVG"
                                 data-parent="#icon17">
                        </figure>
                        <h3 class="h6 mb-0">Fax</h3>
                        <p class="mb-0">+1 (062) 109-9223</p>
                    </div>
                    <!-- End Contacts Info -->
                </div>
            </div>
        </div>
        <!-- End Contacts Info Section -->

        <hr class="my-0">

        <!-- Contact Form Section -->
        <div class="container space-2 space-md-3">
            <!-- Title -->
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
                <span class="btn btn-xs btn-soft-success btn-pill mb-2">Leave a Message</span>
                <h2 class="text-primary font-weight-normal">Tell us about <span class="font-weight-semi-bold">yourself</span></h2>
                <p>Whether you have questions or you would just like to say hello, contact us.</p>
            </div>
            <!-- End Title -->

            <div class="w-lg-80 mx-auto">
                <!-- Contacts Form -->
                <form class="js-validate">
                    <div class="row">
                        <!-- Input -->
                        <div class="col-sm-6 mb-6">
                            <div class="js-form-message">
                                <label class="form-label">
                                    Your name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text" class="form-control" name="name" placeholder="Jack Wayley" aria-label="Jack Wayley" required
                                       data-msg="Please enter your name."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                        </div>
                        <!-- End Input -->

                        <!-- Input -->
                        <div class="col-sm-6 mb-6">
                            <div class="js-form-message">
                                <label class="form-label">
                                    Your email address
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="email" class="form-control" name="email" placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com" required
                                       data-msg="Please enter a valid email address."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                        </div>
                        <!-- End Input -->

                        <div class="w-100"></div>

                        <!-- Input -->
                        <div class="col-sm-6 mb-6">
                            <div class="js-form-message">
                                <label class="form-label">
                                    Subject
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text" class="form-control" name="subject" placeholder="Web design" aria-label="Web design" required
                                       data-msg="Please enter a subject."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                        </div>
                        <!-- End Input -->

                        <!-- Input -->
                        <div class="col-sm-6 mb-6">
                            <div class="js-form-message">
                                <label class="form-label">
                                    Your Phone Number
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="number" class="form-control" name="phone" placeholder="1-800-643-4500" aria-label="1-800-643-4500" required
                                       data-msg="Please enter a valid phone number."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                        </div>
                        <!-- End Input -->
                    </div>

                    <!-- Input -->
                    <div class="js-form-message mb-6">
                        <label class="form-label">
                            How can we help you?
                            <span class="text-danger">*</span>
                        </label>

                        <div class="input-group">
              <textarea class="form-control" rows="4" name="text" placeholder="Hi there, I would like to ..." aria-label="Hi there, I would like to ..." required
                        data-msg="Please enter a reason."
                        data-error-class="u-has-error"
                        data-success-class="u-has-success"></textarea>
                        </div>
                    </div>
                    <!-- End Input -->

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-wide transition-3d-hover mb-4">Submit</button>
                        <p class="small">We'll get back to you in 1-2 business days.</p>
                    </div>
                </form>
                <!-- End Contacts Form -->
            </div>
        </div>
        <!-- End Contact Form Section -->
    <!-- ========== END MAIN ========== -->
@stop