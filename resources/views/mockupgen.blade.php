@extends('layouts.dashboard')

@section('content')
@php 
$url = url('/');
$product_id = $product_id['product_id'];
@endphp
<head>
  <script src="https://unpkg.com/konva@2.4.2/konva.min.js"></script>
  <meta charset="utf-8">
  <title>Product Image Customizer</title>
  <link href="{{ asset('mockupgen_assets/css/theme.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('mockupgen_assets/css/markup-generator.css') }}">
  <script defer src="{{ asset('mockupgen_assets/js/html2canvas.js') }}"></script>
  <script defer src="{{ asset('mockupgen_assets/js/art_canvas.js') }}"></script>
  <script defer src="{{ asset('mockupgen_assets/js/markupimageupload.min.js') }}"></script>

  <script type="text/javascript">
        $(document).ready(function() {
            $('#markupimages-upload').markupimageupload();
        })
    </script>
    <script>
        $(function() {

            $("#GetPrice-click").click(function() {
                $("#GetPrice-div").addClass("active");
            });
            $("#GetPrice-div .close").click(function() {
                $("#GetPrice-div").removeClass("active");
            });
            $(".markup-pricebreakup-click").click(function() {
                $(".markup-pricebreakup-section").addClass("active");
            });
            $(".markup-pricebreakup-section-close").click(function() {
                $(".markup-pricebreakup-section").removeClass("active");
            });
            $(".markup-left-tabs .nav li").click(function() {
                $(".markup-pricebreakup-section").removeClass("active");
                $("#GetPrice-div").removeClass("active");
            });
        });
        $(function() {
            var $a = $(".markup-text-color ul li");
            $a.click(function() {
                $a.removeClass("active");
                $(this).addClass("active");
            });
        });
        $(function() {
            var $B = $(".markup-product-color ul li");
            $B.click(function() {
                $B.removeClass("active");
                $(this).addClass("active");
            });
        });
        $(function() {
            var $C = $(".markup-product-size ul li");
            $C.click(function() {
                $C.removeClass("active");
                $(this).addClass("active");
            });
        });

        function increaseClick(id) {
            let i = document.getElementById(id).value;
            i++;
            document.getElementById(id).value = i;
            if(id == 'input-text-size-s') {
                $('#change_price').text(parseFloat(i * 10).toFixed(2));
            }
        }

        function decreaseClick(id) {
            let i = document.getElementById(id).value;            
            if (i > 0) {
                i--;
                document.getElementById(id).value = i;                
            }
            if(id == 'input-text-size-s') {
                $('#change_price').text(parseFloat(i * 10).toFixed(2));
            }
        }
        $(".design-item-image").click(function() {
            $(this).parents(".markup-move").addClass("markup-move-left");
            $(".markup-design-selected").html($(this).parents(".product-grid2").clone());
            $(".markup-move-right").show();
        });
        $(".markup-move-right").click(function() {
            $(this).parents(".markup-move").removeClass("markup-move-left");
            $(".markup-move-right").hide();
        });
        $('#imagePreview').on('click', '.design-item-image', function() {
            $(this).parents(".markup-move").addClass("markup-move-left");
            $(".markup-design-selected").html($(this).parents(".product-grid2").clone());
            $(".markup-move-right").show();
        });
    </script>
</head>
    <div class="markup-generator">
        <div class="container">
            <div class="row ">
                <div class="col-sm-1">


                    <div class="d-flex markup-left-tabs">

                        <ul class="nav nav-pills nav-stacked flex-column">
                        <li data-toggle="modal" data-target="#productimages">
                                <a href="#tab_products" class="active show" data-toggle="pill">
                                    <span class="icon-image"></span>
                                    <p>Products</p>
                                </a>
                            </li>
                            <li data-toggle="modal" data-target="#availabeimages">
                                <a href="#tab_artimage" data-toggle="pill">
                                    <span class="icon-images"></span>
                                    <p>Designs</p>
                                </a>
                            </li>
                            <li data-toggle="modal" data-target="#uploadimageModal">
                                <a href="#tab_upload" data-toggle="pill">
                                    <span class="icon-upload"></span>
                                    <p>Upload</p>
                                </a>
                            </li>
                            <li>
                                <a href="#tab_font" data-toggle="pill">
                                    <span class="icon-font"></span>
                                    <p>Text</p>
                                </a>
                            </li>
                        </ul>


                    </div>
                </div>
                <div class="col-sm-7" id="downloadImage">
                    <div class="markup-main-image">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab_images_Front">
                                <div id="print_canvas" style="margin:0 auto; border:0px solid black; position: relative;">
                                    <img src="" id="add-images">
                                    <div id="canvas_parrent" style="width:50%; height:60%; margin:0 auto; border:1px solid #3c3c3c;position: absolute;left: 50%;top: 50%;z-index: 2;transform:translate(-50%,-50%);">
                                        <div id="container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="markup-pannel-right">
                        <div class="pannel">
                            <div class="tab-content">
                                <div class="tab-pane pull-left-right active show" id="tab_products">
                                    <div class="markup-product-color">
                                        <h3 class="name product_name" itemprop="name"></h3>
                                        <p><b><span class="value" id="p_price"></span>
                                        </b></p>
                                    </div>
                                    <h6 class="markup-title2">Color</h6>
                                    <div class="markup-product-color markup-variant-color">
                                        <ul id="varient-color">

                                        </ul>

                                    </div>
                                    <div class="markup-product-size markup-variant-size mt-4">
                                        <h6 class="markup-title2">Size</h6>
                                        <ul id="varient-size">

                                        </ul>
                                    </div>

                                </div>
                                <div class="tab-pane pull-left-right" id="tab_artimage">

                                    <div class="markup-artimage-color markup-variant-color">
                                        <ul>
                                            <li><span style="background-color: #ffffff;">white</span></li>
                                            <li><span style="background-color:#4285F4;">navy</span></li>
                                            <li class="active"><span style="background-color:#EA4335;">royal blue</span></li>
                                            <li><span style="background-color:#FBBC05;">black</span></li>
                                            <li><span style="background-color:#34A853;">white</span></li>
                                            <li><span style="background-color:#3863A0;">navy</span></li>
                                            <li><span style="background-color:#1E3250;">royal blue</span></li>
                                            <li><span style="background-color:#66CDA3;">black</span></li>

                                        </ul>

                                    </div>

                                </div>
                                <div class="tab-pane pull-left-right" id="tab_upload">
                                    tab_upload
                                </div>
                                <div class="tab-pane pull-left-right" id="tab_font">
                                    <div class="markup-text-edit">
                                        <div class="form-group">
                                        <textarea class="form-control" placeholder="Sample Text" rows="2" id="getText">Sample Text</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="markup-text-color markup-variant-color">
                                            <ul id="textColor">
                                                <li class="active"><span onClick="setColor('#ffffff')" color="#ffffff" style="background-color: #ffffff;">white</span></li>
                                                <li><span onClick="setColor('#4285F4')" color="#4285F4" style="background-color:#4285F4;">navy</span></li>
                                                <li><span onClick="setColor('#EA4335')" color="#EA4335" style="background-color:#EA4335;">royal blue</span></li>
                                                <li><span onClick="setColor('#FBBC05')" color="#FBBC05" style="background-color:#FBBC05;">black</span></li>
                                                <li><span onClick="setColor('#34A853')" color="#34A853" style="background-color:#34A853;">white</span></li>
                                                <li><span onClick="setColor('#3863A0')" color="#3863A0" style="background-color:#3863A0;">navy</span></li>
                                                <li><span onClick="setColor('#1E3250')" color="#1E3250" style="background-color:#1E3250;">royal blue</span></li>
                                                <li><span onClick="setColor('#66CDA3')" color="#66CDA3" style="background-color:#66CDA3;">black</span></li>

                                            </ul>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col">
                                                <select class="custom-select">
                                                        <option selected>Font Family</option>
                                                        <option value="1">Font Family</option>
                                                        <option value="2">Font Family</option>
                                                        <option value="3">Font Family</option>
                                                      </select>
                                            </div>
                                            <div class="col">
                                                <div class="input-group markup-text-size">
                                                    <div class="input-group-prepend">
                                                        <span class="icon-minus" onclick="decreaseClick('input-text-size')"></span>
                                                    </div>
                                                    <input type="text" class="form-control" value="12" id="input-text-size">
                                                    <div class="input-group-append">
                                                        <span class="icon-plus" onclick="increaseClick('input-text-size')"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mt-3"><button type="button" class="btn btn-secondary  btn-block" onclick="myFunction(document.getElementById('getText').value,ArtItemType.TEXT, $('#textColor li.active span').attr('color'))">Add Text</button></div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="mt-3 px-3 pb-3"><button type="button" id="GetPrice-click" class="btn btn-primary btn-lg btn-block">Get Price</button></div>
                        <div class="mt-3 px-3 pb-3"><button type="button" class="btn btn-primary btn-lg btn-block" onClick="downloadImage()">Save Image</button></div>
                        <div id="GetPrice-div" class="GetPrice-div pull-bottom-top ">
                            <button type="button" class="close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                            <div class="markup-bulk-section pannel">
                                <div class="markup-quntity-section">
                                    <div class="form-group row align-items-center">
                                        <div class="col">
                                            <strong>S</strong>
                                        </div>
                                        <div class="col">
                                            <div class="input-group markup-select-size">
                                                <div class="input-group-prepend">
                                                    <span class="icon-minus" onclick="decreaseClick('input-text-size-s')"></span>
                                                </div>
                                                <input type="text" class="form-control" value="1" id="input-text-size-s">
                                                <div class="input-group-append">
                                                    <span class="icon-plus" onclick="increaseClick('input-text-size-s')"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col">
                                            <strong>M</strong>
                                        </div>
                                        <div class="col">
                                            <div class="input-group markup-select-size">
                                                <div class="input-group-prepend">
                                                    <span class="icon-minus" onclick="decreaseClick('input-text-size-m')"></span>
                                                </div>
                                                <input type="text" class="form-control" value="0" id="input-text-size-m">
                                                <div class="input-group-append">
                                                    <span class="icon-plus" onclick="increaseClick('input-text-size-m')"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col">
                                            <strong>L</strong>
                                        </div>
                                        <div class="col">
                                            <div class="input-group markup-select-size">
                                                <div class="input-group-prepend">
                                                    <span class="icon-minus" onclick="decreaseClick('input-text-size-l')"></span>
                                                </div>
                                                <input type="text" class="form-control" value="0" id="input-text-size-l">
                                                <div class="input-group-append">
                                                    <span class="icon-plus" onclick="increaseClick('input-text-size-l')"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col">
                                            <strong>XL</strong>
                                        </div>
                                        <div class="col">
                                            <div class="input-group markup-select-size">
                                                <div class="input-group-prepend">
                                                    <span class="icon-minus" onclick="decreaseClick('input-text-size-xl')"></span>
                                                </div>
                                                <input type="text" class="form-control" value="0" id="input-text-size-xl">
                                                <div class="input-group-append">
                                                    <span class="icon-plus" onclick="increaseClick('input-text-size-xl')"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col">
                                            <strong>2XL</strong>
                                        </div>
                                        <div class="col">
                                            <div class="input-group markup-select-size">
                                                <div class="input-group-prepend">
                                                    <span class="icon-minus" onclick="decreaseClick('input-text-size-2xl')"></span>
                                                </div>
                                                <input type="text" class="form-control" value="0" id="input-text-size-2xl">
                                                <div class="input-group-append">
                                                    <span class="icon-plus" onclick="increaseClick('input-text-size-2xl')"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col">
                                            <strong>3XL</strong>
                                        </div>
                                        <div class="col">
                                            <div class="input-group markup-select-size">
                                                <div class="input-group-prepend">
                                                    <span class="icon-minus" onclick="decreaseClick('input-text-size-3xl')"></span>
                                                </div>
                                                <input type="text" class="form-control" value="0" id="input-text-size-3xl">
                                                <div class="input-group-append">
                                                    <span class="icon-plus" onclick="increaseClick('input-text-size-3xl')"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="markup-product-section">
                                    <div class="size-selection-item-price">
                                        <h5> Article price:&nbsp;<span class="">$00.00</span></h5>
                                        <span class="text-peach">0+ Articles – 0% off</span>
                                        <a href="#" class="markup-pricebreakup-click">Price Breakup</a>
                                    </div>
                                    <p>0 items selected</p>
                                    <h3>Total: $<span id="change_price">10</span></h3>

                                    <div class="mt-3"><button type="button" class="btn btn-primary btn-lg btn-block">Add to Cart</button></div>
                                </div>
                                <div class="markup-pricebreakup-section pannel pull-right-left">
                                    <h5 class="markup-pricebreakup-section-close"><span class="icon-angle-left"></span> Product Details</h5>
                                    <hr>
                                    <h6 class="mb-3">Product</h6>
                                    <div class="row">
                                        <div class="col-2">
                                            <img class="img-fluid" src="{{ url('/') }}/mockupgen_assets/images/markup-images/football.png" alt="" width='30' height='45'>
                                        </div>
                                        <div class="col-6">
                                            ABC
                                        </div>
                                        <div class="col-4">
                                            $10
                                        </div>
                                    </div>
                                    <hr>
                                    <h6 class="mb-3">Printing</h6>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <img class="img-fluid" src="{{ url('/') }}/mockupgen_assets/images/markup-images/football.png" alt="">
                                        </div>
                                        <div class="col-7">
                                            Football
                                        </div>
                                        <div class="col-3 text-right">
                                            $10
                                            <a href="#" class="ml-2 text-peach"><span class="icon-trash-alt "></span></a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <img class="img-fluid" src="{{ url('/') }}/mockupgen_assets/images/markup-images/text.png" alt="">
                                        </div>
                                        <div class="col-7">
                                            Sample Text
                                        </div>
                                        <div class="col-3 text-right">
                                            Free
                                            <a href="#" class="ml-2 text-peach"><span class="icon-trash-alt "></span></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product images -->
            <div class="modal markup-modal fade" id="productimages" tabindex="-1" role="dialog" aria-labelledby="availabeimagesLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row markup-move markupimages">

                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search..">

                                    </div>
                                    <!-- <h5>Categories</h5> -->
                                    <div class="refine-section">
                                        <div class="markup-modal-vh100" id="product-cat">

                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-8">
                                    <div class="markup-move-right">
                                        <span class="icon-angle-left"></span>
                                    </div>
                                    <div class="markup-modal-vh100">
                                        <div class="row" id="products-list">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="markup-modal-vh100 ">
                                        <div class="markup-design-selected">
                                            <div class="product-grid2">
                                                <div class="product-image2">
                                                    <a href="#" class="design-item-image">
                                                        <img class="pic-1" src="{{ asset('mockupgen_assets/images/products/product-5.png') }}">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <h3 class="title"><a href="#">Women's Designer Top</a></h3>
                                                    <span class="price">$599.99</span>
                                                </div>

                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary  btn-block">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- product images end-->

            <!-- Modal -->
            <div class="modal markup-modal fade" id="availabeimages" tabindex="-1" role="dialog" aria-labelledby="availabeimagesLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row markup-move markupimages">

                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search..">

                                    </div>
                                    <h5>Categories</h5>
                                    <div class="related-tags__item-container">
                                        <ul class="related-tags__items" id='artwork-categories'>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-sm-8">
                                    <div class="markup-move-right">
                                        <span class="icon-angle-left"></span>
                                    </div>
                                    <div class="markup-modal-vh100">


                                        <div class="row" id="artWorkProduct">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="markup-modal-vh100 ">
                                        <div class="markup-design-selected">
                                            <div class="product-grid2">
                                                <div class="product-image2">
                                                    <a href="#" class="design-item-image">
                                                        <img class="design-image-selected" src="http://bestjquery.com/tutorial/product-grid/demo3/images/img-7.jpeg">

                                                    </a>

                                                </div>
                                                <div class="product-content">
                                                    <h3 class="title"><a href="#">Women's Designer Top</a></h3>
                                                    <span class="price">$599.99</span>
                                                </div>

                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary  btn-block">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Upload image -->
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal markup-modal fade" id="uploadimageModal" tabindex="-1" role="dialog" aria-labelledby="uploadimageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                        <div class="modal-body">
                            <div class="row markup-move markupimages">
                                <div class="col-sm-4">
                                    <div class="mb-4">
                                        <label class="checkbox-container">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                                I confirm this content does not infringe any laws or third-party rights 
like copyright, trademark, or personality rights.  <a href="#">DMCA policy </a> and design <a href="#" >rejection reasons </a>.
                                              </label>

                                    </div>


                                    <div class="custom-file ">
                                        <form>
                                            <input type="file" id="markupimages-upload" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                        </form>



                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="markup-move-right">
                                        <span class="icon-angle-left"></span>
                                    </div>
                                    <div class="markup-modal-vh100">
                                        <div class="row" id="imagePreview">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="markup-modal-vh100 ">
                                        <div class="markup-design-selected">
                                            <div class="product-grid2">
                                                <div class="product-image2">
                                                    <a href="#" class="design-item-image">
                                                        <img class="design-image-selected" src="http://bestjquery.com/tutorial/product-grid/demo3/images/img-7.jpeg">

                                                    </a>

                                                </div>
                                                <div class="product-content">
                                                    <h3 class="title"><a href="#">Women's Designer Top</a></h3>
                                                    <span class="price">$599.99</span>
                                                </div>

                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary  btn-block">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Upload image end -->

        </div>
    </div>
@endsection
@section('footer_scripts')
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $.ajax({
        url: "{{env('API_URL')}}token",
        contentType: 'application/json',
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({
            "privateKey": "password"
        }),
        success: (result) => {
            if (result.token) {
                $.ajax({
                    url: "{{env('API_URL')}}api/product/getProductSpecifics?productId={{$product_id}}",
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        "Authorization": "Bearer " + result.token,
                        "Content-Type": "application/json"
                    },
                    type: 'GET',
                    success: function(products) {
                        if(products.properties.product.styleId.code == 'Other' || products.properties.product.styleId.code == 'Hats') {
                            $("#canvas_parrent").attr('style','width:68%; height:38%; left: 50%;top: 50%;margin:0 auto; border:1px solid #3c3c3c;position: absolute;z-index: 2;transform:translate(-50%,-50%)');
                        } else if(products.properties.product.styleId.code == 'Mugs') {
                            $("#canvas_parrent").attr('style','width:40%; height:45%; left: 60%;top: 56%;margin:0 auto; border:1px solid #3c3c3c;position: absolute;z-index: 2;transform:translate(-50%,-50%)')
                        } else if(products.properties.product.styleId.code == 'Tote Bags') {
                            $("#canvas_parrent").attr('style','width:40%; height:40%; left: 50%;top: 66%;margin:0 auto; border:1px solid #3c3c3c;position: absolute;z-index: 2;transform:translate(-50%,-50%)');
                        }
                        if(!products.properties.productVariants.length) {
                            $('.product_name').text(products.properties.product.label);
                            $('#p_price').text("$"+ products.properties.product
                                .salePrice);                                          
                            $(".markup-title2").hide();
                            let img;
                            if(products.properties.artworkProduct) {
                                img = products.properties.artworkProduct.designedImage
                            } else {
                                img = products.properties.product.image
                            }
                            $.ajax({
                                url: "{{env('API_URL')}}api/media/getById/" +
                                img.split(",")[
                                        0],
                                contentType: 'application/json',
                                dataType: 'json',
                                headers: {
                                    "Authorization": "Bearer " +
                                        result.token,
                                    "Content-Type": "application/json"
                                },
                                type: 'GET',
                                success: function(images) {
                                    $('#add-images').attr('src',`${images.properties.full_url}`);
                                    console.log(images);
                                    console.log(images
                                        .properties.full_url
                                        );
                                }
                            });
                        } else {
                            console.log(products);
                            console.log(products.properties.attributeDetails.length);
                            $('.product_name').text(products.properties.product.label);
                            
                            for (let i = 0; i < products.properties.attributeDetails
                                .length; i++) {
                                if (products.properties.attributeDetails[i].attributeId
                                    .label === 'color') {
                                    $("#varient-color").append(`
                                            <li class="select-entry-color" for="${products.properties.attributeDetails[i].code1}"><span style="background-color: ${products.properties.attributeDetails[i].code1};">${products.properties.attributeDetails[i].value}</span></li>
                                        `);
                                }
                                if (products.properties.attributeDetails[i].attributeId
                                    .label === 'size') {
                                    $("#varient-size").append(`
                                            <li for="${products.properties.attributeDetails[i].code1}"><span>${products.properties.attributeDetails[i].value}</span></li>
                                        `);
                                }
                            }
                            $("#varient-color li").first().addClass("active");
                            $("#varient-size li").first().addClass("active");
                            $(".select-entry-color").on('click', function(e) {
                                $(".select-entry-color.active")
                                    .removeClass('active');
                                $(this).addClass('active');
                                let newVariant = products.properties
                                    .productVariants.filter(function(el) {
                                        return el.colorCode1 == $(
                                                '.select-entry-color.active'
                                                ).attr('for') &&
                                            el.sizeCode == $(
                                                '#varient-size li.active').attr('for');
                                    });                                
                                $('#p_price').text("$" + newVariant[0]
                                    .salePrice);

                                $.ajax({
                                    url: "{{env('API_URL')}}api/media/getById/" +
                                        newVariant[0].image.split(",")[
                                            0],
                                    contentType: 'application/json',
                                    dataType: 'json',
                                    headers: {
                                        "Authorization": "Bearer " +
                                            result.token,
                                        "Content-Type": "application/json"
                                    },
                                    type: 'GET',
                                    success: function(images) {
                                        $('#add-images').attr('src',`${images.properties.full_url}`);
                                        console.log(images);
                                        console.log(images
                                            .properties.full_url
                                            );
                                    }
                                });
                                e.preventDefault();
                            });

                            $("#varient-size li").click(function() {
                                $("#varient-size li.active")
                                    .removeClass('active');
                                $(this).addClass('active');
                                let newVariant = products.properties
                                    .productVariants.filter(function(el) {
                                        return el.colorCode1 == $(
                                                '.select-entry-color.active'
                                                ).attr('for') &&
                                            el.sizeCode == $(
                                                '#varient-size li.active').attr('for');
                                    });
                                
                                $.ajax({
                                    url: "{{env('API_URL')}}api/media/getById/" +
                                        newVariant[0].image.split(",")[
                                            0],
                                    contentType: 'application/json',
                                    dataType: 'json',
                                    headers: {
                                        "Authorization": "Bearer " +
                                            result.token,
                                        "Content-Type": "application/json"
                                    },
                                    type: 'GET',
                                    success: function(images) {
                                        $('#add-images').attr('src',`${images.properties.full_url}`);
                                        console.log(images);
                                        console.log(images
                                            .properties.full_url
                                            );
                                    }
                                });
                            });

                            var newVariantGlobal = products.properties.productVariants
                                .filter(function(el) {
                                    return el.colorCode1 == $(
                                            '.select-entry-color.active')
                                        .attr('for') &&
                                        el.sizeCode == $(
                                            '#varient-size li.active').attr('for');
                                });
                            
                            $('#p_price').text("$" + newVariantGlobal[0]
                                .salePrice);

                            $.ajax({
                                url: "{{env('API_URL')}}api/media/getById/" +
                                    newVariantGlobal[0].image.split(",")[0],
                                contentType: 'application/json',
                                dataType: 'json',
                                headers: {
                                    "Authorization": "Bearer " + result.token,
                                    "Content-Type": "application/json"
                                },
                                type: 'GET',
                                success: function(images) {
                                    $('#add-images').attr('src',`${images.properties.full_url}`);
                                    console.log(images);
                                    console.log(images.properties.full_url);
                                }
                            });                            
                        }

                        $.ajax({
                            url: "{{env('API_URL')}}api/product/getProductList",
                            contentType: 'application/json',
                            dataType: 'json',
                            headers: {
                                "Authorization": "Bearer " +
                                    result.token,
                                "Content-Type": "application/json"
                            },
                            type: 'GET',
                            success: function(products) {
                                for(let i=0; i<=20;i++) {
                                    $.ajax({
                                        url: "{{env('API_URL')}}api/media/getById/" +
                                        products.properties.products[i].image.split(",")[0],
                                        contentType: 'application/json',
                                        dataType: 'json',
                                        headers: {
                                            "Authorization": "Bearer " + result.token,
                                            "Content-Type": "application/json"
                                        },
                                        type: 'GET',
                                        success: function(images) {
                                            console.log("----",products.properties.products[i].salePrice,"-----")
                                            $("#products-list").append(`
                                                <div class="col-md-4">
                                                    <div class="product-grid2">
                                                        <div class="product-image2">
                                                            <a href="{{url('/')}}/mockupgenerator/${products.properties.products[i].id}" class="design-item-image">
                                                                <img class="pic-1" src="${images.properties.full_url}">
                                                            </a>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3 class="title"><a href="{{url('/')}}/mockupgenerator/${products.properties.products[i].id}">${products.properties.products[i].label}</a></h3>
                                                            <span class="price">$${products.properties.products[i].salePrice}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            `);
                                            console.log(images);
                                            console.log(images.properties.full_url);
                                        }
                                    });                                        
                                }                                    
                            },
                            error: function(error) { 
                                console.log("Products ERROR:",error.responseJSON.message); 
                                $('#artWorkProduct').html(error.responseJSON.message);
                            }

                        });

                        $.ajax({
                            url: "{{env('API_URL')}}api/artwork/getAllArtworks",
                            contentType: 'application/json',
                            dataType: 'json',
                            headers: {
                                "Authorization": "Bearer " +
                                    result.token,
                                "Content-Type": "application/json"
                            },
                            type: 'GET',
                            success: function(artworkList) {
                                console.log("artwork---",artworkList);
                                let url = "{{url('/')}}";
                                for(let i=0; i<=20;i++) {
                                    if(artworkList.properties) {
                                        $('#artWorkProduct').append(`
                                            <div class="col-md-4">                                            
                                                <div class="product-grid2">
                                                    <div class="product-image2">
                                                        <a href="#" class="design-item-image">                                                            
                                                            <img class="pic-1" onclick="myFunction('${artworkList.properties[i].mediaId.full_url}',ArtItemType.IMAGE)" src="${artworkList.properties[i].mediaId.full_url}">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3 class="title"><a href="#">${artworkList.properties[i].artName}</a></h3>
                                                        <span class="price">$${artworkList.properties[i].royaltyFee}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        `);
                                    }     
                                }                                                                   
                            },
                            error: function(error) { 
                                console.log("artWorkProduct ERROR:",error.responseJSON.message); 
                                $('#artWorkProduct').html(error.responseJSON.message);
                            }
                        });

                        // $.ajax({
                        //     url: "{{env('API_URL')}}api/master/getAllProductCategories",
                        //     contentType: 'application/json',
                        //     dataType: 'json',
                        //     headers: {
                        //         "Authorization": "Bearer " + result.token,
                        //         "Content-Type": "application/json"
                        //     },
                        //     type: 'GET',
                        //     success: function(productCat) {
                        //         for(let i=0; i < productCat.properties.length;i++){
                        //             $("#product-categories").append(`<li><a href="#">${productCat.properties[i].name}</a></li>`);
                        //         }
                        //         console.log("productCat",productCat);
                        //     }
                        // });

                        $.ajax({
                            url: "{{env('API_URL')}}api/artcategory/getAllArtCategories",
                            contentType: 'application/json',
                            dataType: 'json',
                            headers: {
                                "Authorization": "Bearer " + result.token,
                                "Content-Type": "application/json"
                            },
                            type: 'GET',
                            success: function(artworkCat) {
                                for(let i=0; i < artworkCat.properties.length;i++){
                                    $("#artwork-categories").append(`<li><a href="#">${artworkCat.properties[i].name}</a></li>`);
                                }                                
                                console.log("ArtCat",artworkCat);
                            },
                            error: function(error) { 
                                console.log("artwork-categories ERROR:",error.responseJSON.message); 
                                //$('#artwork-categories').html(error.responseJSON.message);
                            }
                        });

                        $.ajax({
                            url: "{{env('API_URL')}}api/itemcategory/getAllItemCategories",
                            contentType: 'application/json',
                            dataType: 'json',
                            headers: {
                                "Authorization": "Bearer " + result.token,
                                "Content-Type": "application/json"
                            },
                            type: 'GET',
                            success: function(categories) {
                                for(let i=0; i < categories.properties.length;i++){
                                    $("#product-cat").append(`
                                        <div class="refine-filters">
                                            <h6 data-toggle="collapse" href="#Clothing${categories.properties[i].id}" role="button" aria-expanded="false" aria-controls="collapseExample" class="refine-filter-title collapsed">${categories.properties[i].name}</h6>
                                            <div class="Filter-list collapse" id="Clothing${categories.properties[i].id}" style="">
                                                <ul id="clothing-ul${categories.properties[i].id}">
                                                </ul>
                                            </div>
                                        </div>
                                    `);
                                    for(let j=0; j < categories.properties[i].styles.length;j++){
                                        $(`#clothing-ul${categories.properties[i].id}`).append(`
                                            <li>
                                                <label class="checkbox-container">${categories.properties[i].styles[j].label}
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        `);
                                    }
                                }                                
                                console.log("ProductCat",categories);
                            },
                            error: function(error) { 
                                console.log("product-categories ERROR:",error.responseJSON.message); 
                                //$('#artwork-categories').html(error.responseJSON.message);
                            }
                        });
                    }
                });
            }
        }
    });    
});
</script>
@endsection