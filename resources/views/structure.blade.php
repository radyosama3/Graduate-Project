<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME','LMS Project') }}  @yield('pageName')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ @csrf_token() }}">
    @yield('meta')

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/4 - Copy.icon.png') }}">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    @yield('main.style')
</head>

<body>
    @yield('header')

    @yield('content')

    @yield('footer')

    <!-- Site Scripts -->
    {{-- <script src="{{ asset('app.js') }}"></script> --}}
    @yield('main.script')
</body>

</html>