@extends('master_front')
@section('content')
    <section class="g-bg-gray-light-v5 g-py-50">
        <div class="container">
            <div class="d-sm-flex text-center">
                <div class="align-self-center">
                    <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Contact Us</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container g-pt-100 g-pb-40">
        <div class="row justify-content-between">
            <div class="col-md-7 g-mb-60">
                <form id="contact-form">
                    <div class="row">
                        <div class="col-md-6 form-group g-mb-20" data-error="name">
                            <label class="g-color-gray-dark-v2 g-font-size-13">Name:</label>
                            <input class="form-control g-color-gray-dark-v5 g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--focus rounded-3 g-py-13 g-px-15"
                                   type="text" required name="name">
                            <p class="text-danger text-left error-content"></p>
                        </div>

                        <div class="col-md-6 form-group g-mb-20" data-error="name">
                            <label class="g-color-gray-dark-v2 g-font-size-13">Email:</label>
                            <input class="form-control g-color-gray-dark-v5 g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--focus rounded-3 g-py-13 g-px-15"
                                   type="email" required name="email">
                            <p class="text-danger text-left error-content"></p>
                        </div>
                        <div class="col-md-12 form-group g-mb-40" data-error="message">
                            <label class="g-color-gray-dark-v2 g-font-size-13">Message:</label>
                            <textarea class="form-control g-color-gray-dark-v5 g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--focus g-resize-none rounded-3 g-py-13 g-px-15"
                                      rows="7" name="message" required ></textarea>
                            <p class="text-danger text-left error-content"></p>
                        </div>
                    </div>

                    <button class="btn u-btn-primary rounded-3 g-py-12 g-px-20" type="submit" role="button">Send</button>
                </form>
            </div>

            <div class="col-md-4">
                <h1 class="g-font-weight-300 mb-5">Company</h1>

                <div class="mb-4">
                    <h2 class="h5 g-color-gray-dark-v2 g-font-weight-600">Location:</h2>
                    <p class="g-color-gray-dark-v4 g-font-size-16">Los Angeles, California
                </div>

                <div class="mb-4">
                    <h2 class="h5 g-color-gray-dark-v2 g-font-weight-600">Email us:</h2>
                    <p class="g-color-gray-dark-v4">contact@company.com
                    </p>
                </div>

                {{--<div class="mb-3">--}}
                {{--<h2 class="h5 g-color-gray-dark-v2 g-font-weight-600">Call us:</h2>--}}
                {{--<p class="g-color-gray-dark-v4">Call: <span class="g-color-gray-dark-v2">+32 333 444 555</span>--}}
                {{--</p>--}}
                {{--</div>--}}

                {{--<div class="g-mb-30">--}}
                {{--<p class="g-color-gray-dark-v5 g-font-weight-600 g-font-size-16"><em>Monday - Friday: 9:00 AM to 6:00 PM</em>--}}
                {{--</p>--}}
                {{--</div>--}}

                {{--<ul class="list-inline">--}}
                    {{--<li class="list-inline-item">--}}
                        {{--<a class="u-icon-v1 g-color-gray-dark-v5 g-bg-gray-light-v5 g-color-white--hover g-bg-primary--hover rounded-circle" href="https://www.facebook.com/feelenacom/">--}}
                            {{--<i class="g-font-size-default fa fa-facebook"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-inline-item">--}}
                        {{--<a class="u-icon-v1 g-color-gray-dark-v5 g-bg-gray-light-v5 g-color-white--hover g-bg-primary--hover rounded-circle" href="https://www.instagram.com/feelenacom/">--}}
                            {{--<i class="g-font-size-default fa fa-instagram"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </section>
@stop


