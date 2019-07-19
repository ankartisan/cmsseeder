@extends('master')
@section('content')
    <!-- Hero Section -->
    <div class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll hero-bg-black"
         data-options='{direction: "normal"}'>
        <!-- Apply your Parallax background image here -->
        <div class="divimage dzsparallaxer--target " style="height: 100%;"></div>
        <!-- Content -->
        <div class="container position-relative space-1 space-top-md-2 space-bottom-md-1 z-index-2">
            <div class="w-lg-80 text-center mx-auto">
            </div>
        </div>
        <!-- End Content -->
    </div>
    <!-- End Hero Section -->
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
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@stop


