<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>@yield('title') | {{ config('app.name','Cake Town') }}</title> --}}
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('upload').'/'.getSettingValue('fav_icon') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.partials.style')
</head>
<body class="hold-transition sidebar-mini {{$sidebar??''}}">
<div class="wrapper">

    <!-- Navbar -->
    @include('admin.partials.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @includeIf('admin.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('admin.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('admin.partials.script')

</body>
</html>
