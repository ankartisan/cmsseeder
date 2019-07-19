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
<body class="pace-done" style="background-color:white;">
<div id="wrapper">
   <div class="content-wrapper">
       @yield('content')
   </div>
   <!-- COMPONENTS -->
   @include('components/loader')
</div>
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
<script src="{{ mix('/js/auth.js') }}"></script>
<script src="{{ mix('/admin/js/admin.js') }}"></script>

<!-- Extra JS -->
@section('extrajavascript')
@show

</body>
</html>

