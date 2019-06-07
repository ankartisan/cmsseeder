@extends('master')
@section('content')
    <section class="g-bg-gray-light-v5 g-py-50">
        <div class="container">
            <div class="d-sm-flex text-center">
                <div class="align-self-center">
                    <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Sitemap</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="g-py-50">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3>General</h3>
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
        </div>
    </section>
@stop


