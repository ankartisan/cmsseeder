@extends('master')
@section('promo')
    <section class="duik-promo bg-primary text-center py-6">
    </section>
@endsection
@section('content')
    <section class="container">
        <div class="row py-6">
            <div class="row justify-content-center col-lg-12 mb-4 ">
                <h2 class="text-center">Contact Us</h2>
            </div>
            <div class="row justify-content-between col-lg-12">
                <div class="col-md-7">
                    <form id="contact-form">
                        <div class="row">
                            <div class="col-md-6 form-group" data-error="name">
                                <label>Name:</label>
                                <input class="form-control" type="text" required name="name">
                                <p class="text-danger text-left error-content"></p>
                            </div>
                            <div class="col-md-6 form-group" data-error="name">
                                <label>Email:</label>
                                <input class="form-control" type="email" required name="email">
                                <p class="text-danger text-left error-content"></p>
                            </div>
                            <div class="col-md-12 form-group" data-error="message">
                                <label class="">Message:</label>
                                <textarea class="form-control" rows="7" name="message" required ></textarea>
                                <p class="text-danger text-left error-content"></p>
                            </div>
                        </div>

                        <button class="btn btn-primary px-5" type="submit" role="button">Send</button>
                    </form>
                </div>

                <div class="col-md-4">
                    <h3 class="mb-4">Company</h3>

                    <div class="mb-4">
                        <h2 class="h5 g-color-gray-dark-v2 g-font-weight-600">Location:</h2>
                        <p class="g-color-gray-dark-v4 g-font-size-16">Los Angeles, California
                    </div>

                    <div class="mb-4">
                        <h2 class="h5 g-color-gray-dark-v2 g-font-weight-600">Email us:</h2>
                        <p class="g-color-gray-dark-v4">contact@example.com
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </section>
@stop


