<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('aimeos_header')
    <title>AWKWARD Styles</title>
    @yield('aimeos_styles')
    <link type="text/css" rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto:400,300'>
    <link href="{{ asset('css/graphic-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu-toggle').hover(function() {
                $('.dropdown-submenu-toggle').find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
                $('.dropdown-submenu-toggle').stop(true, true).removeClass("active");
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                $(this).stop(true, true).addClass("active");
            }, function() {

                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                $(this).stop(true, true).addClass("active");
            });
        });
    </script>

</head>
<body>
@include('layouts.header')

<main>
@yield('content')
</main>

<footer>
    @include('layouts.footer');
</footer>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
