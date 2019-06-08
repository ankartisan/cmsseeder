<!DOCTYPE html>
<html>
<head>
    <!-- Required Meta Tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | CMS Seeder</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ mix('/css/loader.css') }}">
    <link rel="stylesheet" href="{{ mix('/admin/css/admin.css') }}">
    <link href="{{ url('/css/plugins/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ url('/css/plugins/animate/animate.css')}}" rel="stylesheet">
    <link href="{{ url('/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{ url('/css/theme.css')}}" rel="stylesheet">

</head>
<body class="pace-done">
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ \Illuminate\Support\Facades\Auth::user()->email }}</strong>
                             </span> <span class="text-muted text-xs block">Admin </span>
                            </span>
                        </a>
                    </div>
                </li>
                <li class="@if(Route::current()->getName() == 'admin.dashboard') active @endif">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li class="@if(Route::current()->getName() == 'admin.pages') active @endif">
                    <a href="{{ route('admin.pages') }}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        <span class="nav-label">Pages</span>
                    </a>
                </li>
                <li class="@if(Route::current()->getName() == 'admin.posts') active @endif">
                    <a href="{{ route('admin.posts') }}">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span class="nav-label">Posts</span>
                    </a>
                </li>
                <li class="@if(Route::current()->getName() == 'admin.categories') active @endif">
                    <a href="{{ route('admin.categories') }}">
                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                        <span class="nav-label">Categories</span>
                    </a>
                </li>
                <li class="@if(Route::current()->getName() == 'admin.assets') active @endif">
                    <a href="{{ route('admin.assets') }}">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span class="nav-label">Media</span>
                    </a>
                </li>
                <li class="@if(Route::current()->getName() == 'admin.users') active @endif">
                    <a href="{{ route('admin.users') }}"><i class="fa fa-users"></i> <span class="nav-label">Users</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1" style="min-height: 100vh;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a id="btn-logout" href="{{ route('home') }} ">
                            <i class="fa fa fa-home"></i> Site
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row  border-bottom white-bg dashboard-header">
            @yield('content')
        </div>
    </div>
</div>
<!-- COMPONENTS -->
@include('components/loader')
<!-- JS Globals-->
<script>
    window.route = '{!! Route::current()->getName() !!}';
</script>
<!-- JS -->
<script src="{{ mix('/js/base.js') }}"></script>
<script src="{{ url('/js/plugins/jquery/jquery-2.1.1.js') }}"></script>
<script src="{{ url('/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ url('/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ url('/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('/js/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ url('/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ url('/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('/js/plugins/tinymce/tinymce.min.js') }}" ></script>
<script src="{{ url('/js/theme.js') }}"></script>
<script src="{{ mix('admin/js/admin.js') }}"></script>

<!-- Extra JS -->
@section('extrajavascript')
@show

</body>
</html>
