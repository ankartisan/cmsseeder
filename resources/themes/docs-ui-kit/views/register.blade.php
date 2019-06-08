@extends('master')
@section('promo')
    <section class="duik-promo bg-primary text-center py-6">
    </section>
@endsection
@section('content')
    <section class="container">
        <div class="row justify-content-center py-10">
            <div class="col-sm-8 col-lg-5">
                <div class="">
                    <header class="text-center mb-4">
                        <h2>Sign Up</h2>
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
                                    <button type="submit" class="btn btn-primary px-5">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End Form -->
                    <footer class="text-center g-my-20">
                        <p class="text-muted text-center"><small>Already have an account?
                        <p class="text-muted text-center">
                            <a class="" href="{{ route('login') }}">Login</a></small> </p>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </section>
@stop
