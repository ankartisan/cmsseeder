@extends('master')
@section('promo')
    <section class="duik-promo bg-primary text-center py-6">
    </section>
@endsection
@section('content')
    <section class="container py-10">
        <div class="row justify-content-center ">
            <header class="mb-4 ">
                <h2>Sitemap</h2>
            </header>
        </div>
        <div class="row">
            <div class="col-sm-8 col-lg-5">
                <h5>General</h5>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Homepage</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@stop


