@extends('master')
@section('content')
    <section class="container g-py-50">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">Sign Up</h2>
                    </header>

                    <!-- Form -->
                    <form id="sign-up-form">
                        {{ csrf_field() }}
                        <input id="on-success" type="hidden" name="on_success" value="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col" data-error="first_name">
                                    <input type="text" class="form-control" required name="first_name" placeholder="First name">
                                    <p class="text-danger text-left error-content"></p>
                                </div>
                                <div class="col" data-error="last_name">
                                    <input type="text" class="form-control" required name="last_name" placeholder="Last Name">
                                    <p class="text-danger text-left error-content"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col" data-error="email">
                                    <input type="email" class="form-control" required name="email" placeholder="Your Email">
                                    <p class="text-danger text-left error-content"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col" data-error="password">
                                    <input type="password" class="form-control" required  name="password" placeholder="Choose a Password">
                                    <p class="text-danger text-left error-content"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col" data-error="password_confirm">
                                    <input type="password" class="form-control" required  name="password_confirm" placeholder="Repeat Password">
                                    <p class="text-danger text-left error-content"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End Form -->
                    <footer class="text-center g-my-20">
                        <p class="text-muted text-center"><small>Already have an account? <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a></small> </p>
                    </footer>
                </div>
            </div>
        </div>
    </section>
@stop
