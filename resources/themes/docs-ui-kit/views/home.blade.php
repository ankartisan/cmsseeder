@extends('master')
@section('content')
    <!-- About -->
    <section class="pb-11">
        <div class="container">
            <div class="w-md-75 mx-auto">
                <h2 class="d-flex align-items-center justify-content-center text-uppercase font-weight-bold small text-space-1 mb-3">
                    <span class="text-dark">Product By</span>
                    <img class="rounded-circle mx-2 mb-1" src="{{ url('/images/logo_company.png') }}" width="40" alt="Ankartisan logo">
                    <a class="text-dark" href="https://htmlstream.com">Ankartisan</a>
                </h2>

                <p class="text-center mb-5">
                    CMS Seeder is open source starter kit for your next CMS project based on Laravel. <br><br>
                    It includes basic CMS features such as user authentication, admin dashboard, CRUD for posts, pages, users and roles.
                    Mostly everything that basic WordPress is having. <br><br>
                    Made for developers. Especially for Laravel developers. There are no drag-and-drop page builder and similar stuff which can
                    slow down experienced developer.<br><br>
                    It's founded out of frustration with WordPress customisation. Read more about it in
                    <a href="https://ankaitzan.com/arrivederci-wordpress/">this article</a>.
                </p>
            </div>
        </div>
    </section>
    <!-- End About -->
@stop
