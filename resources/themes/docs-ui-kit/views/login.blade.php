@extends('master')
@section('promo')
    <section class="duik-promo bg-primary text-center py-6">
    </section>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center py-10">
            <div class="col-sm-8 col-lg-5">
                <div class="text-center mb-5">
                    <h2 class="">Login</h2>
                    <p></p>
                </div>
                <!-- Contact Form -->
                <form id="login-form" role="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12 form-group mb-4">
                            <input type="email" class="form-control" required name="email"  placeholder="Email">
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <input type="password" class="form-control" required name="password"  placeholder="Password">
                        </div>
                        <div class="col-md-12 form-group" data-error="message">
                            <p class="text-danger center error-content"></p>
                        </div>
                        <div class="col-md-6 form-group mb-4">
                            <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
                        </div>

                        <div class="col-md-6 form-group mb-4 text-right">
                            <button class="btn btn-primary px-5" type="submit">Login</button>
                        </div>
                    </div>
                </form>
                <footer class="text-center g-my-20">
                    <p class="text-muted text-center"><small>Don't have an account? </small></p>
                    <p><small><a class="" href="{{ route('register') }}">Create an account</a></small></p>

                </footer>
                <!-- End Contact Form -->
            </div>
        </div>
    </div>


@stop
