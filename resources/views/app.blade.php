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
  
   
</head>
<body>
	
<header>
        <div class="head-top bg-dark">
            <div class="container">
                <ul class="head-top-ul">
                    <li>
                        <a href="#">Open Your Store</a>
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
                    <div class="col">
                        <a href="/list">
                            <img src="{{ asset('images/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <ul class="head-middle-list">

                            <li>
							<div class="dropdown">
                                    <a href="#" class="iconlinks dropdown-toggle" id="userdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-search"></span></a>

                                    <form class="dropdown-menu dropdown-menu-right p-4" style="width: 400px;" aria-labelledby="userdropdown">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search.." aria-label="Search" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


							</li>


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
                                <span class="icon-home"></span>

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
                                                        <a href="#" class="nav-l3-title">Tank Tops</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="/mockupgenerator/1233" class="nav-l3-title">Hoodies</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="#" class="nav-l3-title">More</a>
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
                                                        <a href="#" class="nav-l3-title">Mugs</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="#" class="nav-l3-title">Pillows</a>
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
                                                        <a href="#" class="nav-l3-title">Tote Bags</a>

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
                            <a class="nav-link" href="#">
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

                    </ul>

                </div>
            </div>
        </nav>
    </header>

   
   
@yield('aimeos_body')



	
@if (Request::path() == 'list')



<section class="product-section" style="display:none">
       

        <div class="container">
            <h3 class="section-title color-purple">New Arrivals</h3>
            <div class="row products-row" id="products-data-ajax">                    
               
            </div>
        </div>
  <script type = "text/javascript"  src = "https://code.jquery.com/jquery-3.3.1.min.js">
      </script>
         <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
           
                $.ajax({url: "{{env('API_URL')}}token", contentType: 'application/json', dataType: 'json', type: 'POST',   data: JSON.stringify({ "privateKey": "password"}) , success: function(result){ 


                        if(result.token){

                            var productsHtml = '';

                      $.ajax({url: "{{env('API_URL')}}api/product/getProductList", contentType: 'application/json', dataType: 'json', headers: {
                            "Authorization":"Bearer "+result.token,
                            "Content-Type":"application/json"
                        }, type: 'GET',
                         success: function(products){ console.log("-0---",products);
                            
                            if(products.operationCode == 200){


                                var productsHtml = '';

                               for (var i = 3; i <= products.properties.length; i++) {


                               if(i==11) 
                               break;                             

                                var image = products.properties[i].image.split(',');
                                 
                             $.ajax({url: "{{env('API_URL')}}api/media/getById/"+image[0], contentType: 'application/json', dataType: 'json', headers: {
                            "Authorization":"Bearer "+result.token,
                            "Content-Type":"application/json"
                        }, type: 'GET', success: function(imagedata){ 
                            
                            if(imagedata.operationCode == 200){
                                        console.log(imagedata.properties);
                                productsHtml += '<div class="col-3 item product " data-reqstock="1"> <div class="product-grid"> <div><a href="/product-details/'+products.properties[i].id+'"><img class="media-item" src="'+imagedata.properties.full_url+'" width="258" height="266"> </a> <span class="product-new-label">Sale</span>                            <span class="product-discount-label">20%</span> </div>                        <div class="product-content">                        <a href="/product-details/'+products.properties[i].id+'">                            <h3 class="title">'+products.properties[i].label+'</h3> </a>                            <div class="price">                                <div class="articleitem price price-actual" data-prodid="119" data-prodcode="103"><meta itemprop="price" content="25.00"><div class="price-item default" itemprop="priceSpecification" itemscope="" itemtype="http://schema.org/PriceSpecification"><meta itemprop="valueAddedTaxIncluded" content="true"><meta itemprop="priceCurrency" content="USD"><meta itemprop="price" content="25.00"><span class="quantity" ><meta itemprop="minValue" content="1"> </span><span class="value"> $ '+products.properties[i].price+'</span><span class="taxrate">Incl. 0.01% VAT</span></div></div></div></div><div class="offer" ><div class="stock-list"><div class="articleitem stock-actual" data-prodid="119" data-prodcode="103"></div></div><div class="price-list"></div></div></div></div>';

                                $("#products-data-ajax").html(productsHtml);
                            }
                            } 

                            });   


                               
                                }

                                

                            }

                    }


                });

                     }


                }});
          });       
             </script>
        
    </section>
  
   <div class="container">
        <section class="pt-4">
            <div class="row">
                <div class="col-12">
                    <img  src="{{ asset('images/home/contest.jpg') }}" class="img-100" alt="">
                </div>
            </div>
        </section>
    </div>

      
@endif

    <footer>
    <script src="{{asset('js/app.js')}}"></script>
        <!-- <img src="{{ asset('images/footer.png') }}" class="img-100" alt=""> -->
    </footer>
	<!-- Scripts -->	

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   	 <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" media="all" />
 <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script type="text/javascript">
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
            $("#owl-main").owlCarousel({
                nav: false,
				loop: true,
                autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
                items: 1,
            });

            $('#owl-Intrest').owlCarousel({
                stagePadding: 50,
                loop: true,
                 autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
                margin: 10,
                nav: false,
                items: 2,

            });
        });
    </script>
@yield('aimeos_scripts')
	</body>
</html>