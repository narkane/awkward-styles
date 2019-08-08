@extends('layouts.dashboard')


@section('content')

    @yield('aimeos_body')



@if (Request::path() == 'list')



<section class="product-section" style="display:none">
       

        <div class="container">
            <h3 class="section-title color-purple">New Arrivals</h3>
            <div class="row products-row" id="products-data-ajax">                    
               
            </div>
        </div>
  <!--<script type = "text/javascript"  src = "https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
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
                                productsHtml += '<div class="col-3 item product " data-reqstock="1">' +
                                    '<div class="product-grid"> ' +
                                    '<div>' +
                                    '<a href="/product-details/'+products.properties[i].id+'">' +
                                    '<img class="media-item" src="'+imagedata.properties.full_url+'" width="258" height="266"> ' +
                                    '</a> ' +
                                    '<span class="product-new-label">Sale</span>                            ' +
                                    '<span class="product-discount-label">20%</span> ' +
                                    '</div>                        ' +
                                    '<div class="product-content">                        ' +
                                    '<a href="/product-details/'+products.properties[i].id+'"> ' +
                                    '<h3 class="title">'+products.properties[i].label+'</h3> </a> ' +
                                    '<div class="price">                                ' +
                                    '<div class="articleitem price price-actual" data-prodid="119" data-prodcode="103">' +
                                    '<meta itemprop="price" content="25.00"><div class="price-item default" itemprop="priceSpecification" itemscope="" itemtype="http://schema.org/PriceSpecification">' +
                                    '<meta itemprop="valueAddedTaxIncluded" content="true"><meta itemprop="priceCurrency" content="USD">' +
                                    '<meta itemprop="price" content="25.00">' +
                                    '<span class="quantity" ><meta itemprop="minValue" content="1"> </span>' +
                                    '<span class="value"> $ '+products.properties[i].price+'</span>' +
                                    '<span class="taxrate">Incl. 0.01% VAT</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="offer" >' +
                                    '<div class="stock-list">' +
                                    '<div class="articleitem stock-actual" data-prodid="119" data-prodcode="103"></div>' +
                                    '</div><div class="price-list"></div></div></div></div>';

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
                    <img src="{{ asset('images/home/contest.jpg') }}" class="img-100 rounded" alt="">
                </div>
            </div>
        </section>
    </div>


@endif

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
        @endsection