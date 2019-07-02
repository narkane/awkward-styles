<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('aimeos_header')
	<title>ACKWARD STYLES</title>
@yield('aimeos_styles')
	<link type="text/css" rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto:400,300'>
	  <link href="{{ asset('css/graphic-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{asset('css/Custom.css')}}" rel="stylesheet">
  
   
</head>
<body>
<header>
        <div class="head-top bg-dark">
            <div class="container">
                <ul class="head-top-ul">
                    <li>
                        <a href="/createstore">Open Your Store</a>
                    </li>
                    <li>
                        <a href="/seller">Sell Anything</a>
                    </li>
                    <li>
                        <a href="/seller">Sell Everywhere</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="head-middle">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    
                </div>

            </div>

        </div>

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm  bg-light ">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mega-menu" aria-controls="mega-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

                <div class="collapse navbar-collapse" id="mega-menu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item nav-home">
                            <a href="/list" class="nav-link">
                                <span class="icon-home" style="borderRadius:20px;"></span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                START DESIGNING
                            <span>Create your own style</span>
                            </a>
                            <div class="dropdown-menu mega-menu-dropdown">
                                <ul class="multi-level">
                                    <li class="dropdown-submenu dropdown-submenu-toggle active">
                                        <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Clothing</a>
                                        <ul class="dropdown-menu" style="display: block;">
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="/mockupgenerator/1354" class="nav-l3-title">T-Shirts</a>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="/mockupgenerator/720" class="nav-l3-title">Tank Tops</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="/mockupgenerator/1233" class="nav-l3-title">Hoodies</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="/comingsoon" class="nav-l3-title">More</a>
                                                    </div>

                                                </div>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu dropdown-submenu-toggle">
                                        <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Home</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <a href="/comingsoon" class="nav-l3-title">Mugs</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="/comingsoon" class="nav-l3-title">Pillows</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="/mockupgenerator/1033" class="nav-l3-title">Canvas</a>
                                                    </div>

                                                </div>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu dropdown-submenu-toggle">
                                        <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Accessories</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="/mockupgenerator/550" class="nav-l3-title">Bags</a>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="/mockupgenerator/1222" class="nav-l3-title">Hats</a>
                                                    </div>


                                                </div>
                                            </li>

                                        </ul>
                                    </li>


                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">
                                    SHOP
                                    <span>Custom design products</span>
                                 </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                    EXPLORE
                                    <span>Artists and more</span>
                            </a>
                        </li>
                        <li class="nav-logo">


<div class="col">
                        <a href="/list">
                            <img src="{{ asset('images/logo.png') }}" alt="">
                        </a>
                    </div>
                    </li>
                    <li class="nav-login">
                    <div class="col">
                        <ul class="head-middle-list">

                        <script type = "text/javascript" language = "javascript">

function searchfunc(){
    var action_src = "/search/" + document.getElementsByName("keywords")[0].value;
    var form = document.getElementById('searcharea');
    form.action = action_src ;
}</script>

                        <li>
							<div class="dropdown">
                                    <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-search"></span></a>

                                    <form id="searcharea" onSubmit="searchfunc()" class="dropdown-menu dropdown-menu-right p-4" style="width: 400px;" aria-labelledby="userdropdown">
                                        <div class="input-group">
                                            <input type="text" name="keywords" class="form-control" placeholder="Search.." aria-label="Search" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <input class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>


							</li>
                            <!-- <li>
							<div class="dropdown">
                                <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-search"></span></a>
                                <div id="app" class="dropdown-menu">
                                    <searchbar class="dropdown-item"/>
                                </div>
                            </div>


							</li> -->


                            <li><a href="/basket#" class="iconlinks"><span class="icon-shopping-cart"></span>
                            </a></li>

                         

                            @if (Auth::guest())

                               <li>
                            <div class="dropdown">
                                    <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user-circle"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userdropdown">
                                        <a class="dropdown-item" href="/login#">Login</a>
                                        <a class="dropdown-item" href="/register#">Register</a>

                                        <!-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Logout</a> -->
                                    </div>
                                </div>
                            </li>
					
					@else
						<li>
                        <div class="dropdown">    
                            <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userdropdown">
                                <a class="dropdown-item" href="/dashboard" title="My account">My Dashboard</a>
                                <!-- <li><a href="{{
route('aimeos_shop_account',['site'=>Route::current()->parameter('site','default'),'locale'=>Route::current()->parameter('locale','en'),'currency'=>Route::current()->parameter('currency','DOL')])
}}" title="My account">My account</a></li> -->
                                <form id="logout" action="/logout" method="POST">{{csrf_field()}}</form><a  class="dropdown-item" href="javascript: document.getElementById('logout').submit();">Logout</a>
                            </div>
                        </div>
                        </li>
					@endif

					
                        </ul>
                    </div>
                    </li>
                    </ul>


                </div>
            </div>
        </nav>
    </header>

   
   
@yield('aimeos_body')

<div id="app">
  <comingsoon />
</div>
	
@if (Request::path() == 'list')


@endif

    <footer  style="width:100vw;">
    </footer>


	<!-- Scripts -->	
    <script src="{{asset('js/app.js')}}"></script>
	</body>
</html>