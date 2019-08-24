@extends('master')
@section('content')
    <!-- Cart Section -->
    <div class="container space-2 space-lg-3">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto">
            <figure id="iconChecked" class="svg-preloader ie-height-90 max-width-11 mx-auto mb-3">
                <img class="js-svg-injector" src="/themes/front/assets/svg/components/checked-icon.svg" alt="SVG"
                     data-parent="#iconChecked">
            </figure>
            <div class="mb-5">
                <h1 class="h3 font-weight-medium">Your order is completed!</h1>
                <p>Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.</p>
            </div>
            <a class="btn btn-primary btn-pill transition-3d-hover px-5" href="{{ route('home') }}">Continue Shopping</a>
        </div>
    </div>
    <!-- End Cart Section -->
@stop