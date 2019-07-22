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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/Custom.css') }}" rel="stylesheet">
   
</head>
<body>

@include('layouts.header')

        <main class="py-4">
            @yield('content')
        </main>

     <footer>
         @include('layouts.footer')
            @yield('footer_scripts')
        </footer>
        <!-- Scripts -->    
        
        <script src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="all" />
 <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
</body>
</html>