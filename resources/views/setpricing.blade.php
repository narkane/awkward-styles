@extends('layouts.dashboard')

@section('content')

<div class="container">
  
    <div class="row">
       <div class="col-md-3">
        @include('menu')
       </div>
     
      <div class="col-md-9">
                <h4 class="mb-4">Set Price</h4>
                <div class="pannel">
                    <div class="mb-3 text-right">
                        <button type="button" class="btn btn-sm btn-primary">Save & Push</button>
                    </div>
                   <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Clothing </th>
                                <th scope="col">Style </th>
                                <th scope="col">Base Price</th>
                                <th scope="col">Margin</th>
                                <th scope="col">Price Retail</th>
                                <th scope="col">Markup</th>
                            </tr>
                        </thead>
                        <tbody id="products">
                            
         


                        </tbody>
                    </table>
                    <div class="mt-3 text-right">
                        <button type="button" class="btn btn-sm btn-primary">Save & Push</button>
                    </div>
                </div>





            </div>
     
    
     
    </div>

    
    
    </div>

     <script type="text/javascript">
        $(document).ready(function() {
            $("#owl-main").owlCarousel({
                nav: false,
                slideSpeed: 800,
                paginationSpeed: 800,
                singleItem: true,
                pagination: true,
                autoPlay: true,
                stopOnHover: true,
                items: 1,
            });

            $('#owl-Intrest').owlCarousel({
                stagePadding: 50,
                loop: true,
                autoPlay: true,
                stopOnHover: true,
                margin: 10,
                nav: false,
                items: 2,

            });
      
      $('#Add-Products').owlCarousel({
                stagePadding: 10,
                loop: true,
                autoPlay: true,
                stopOnHover: true,
                margin: 10,
                nav: true,
                items: 5,

            });
        
      @if(count($selectedproducts)>0)
      @foreach($selectedproducts as $selectedproduct)
      $.ajax({ 
                    
                	type: 'GET', 
                	url: '{{ url("jsonapi/product?id=".$selectedproduct)}}'+'&include=media', 
                	dataType:'json',
                	success: function (productdata) {
                     console.log('{{ url("jsonapi/product?id=".$selectedproduct)}}'+'&include=media'); 
                     console.log(productdata);   
                    var getUrl = window.location;
                    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];  
                	var pdata = $(productdata['included'][0]['attributes']);	
                	var pimage = baseUrl+pdata[0]['media.url']; 	
                	$('#products').append('<tr><th><input type="checkbox" name="" id=""> </th><td> <img src="'+pimage+'" width="80" height="100" class="img-fluid" alt=""> </td><td>Regular T Short</td><td> $12 - $15</td><td> <span class="text-peach">$13</span></td><td> $12 - $15</td><td><input type="text" class="form-control" value="20%"></td></tr>');	
                	},
                completed: function() {
                    console.log('{{ url("jsonapi/product?id=".$selectedproduct)}}'+'&include=media');  
                }
            		});
      @endforeach
      @endif
      
        });
    </script>

@endsection
