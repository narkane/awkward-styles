@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white border">
                <li class="breadcrumb-item"><a href="/list">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page"
                    id="current_product">{{ $product[0]->label }}</li>
            </ol>
        </nav>
        <div class="pannel catalog-detail bg-white" itemscope="" itemtype="http://schema.org/Product"
             data-jsonurl="{{ url('/') }}/jsonapi">

            <div class="product row " data-id="116">

                <div class="col-sm-2 bg-white">
                    @foreach($media as $img)
                        <div>
                            @if(!is_null($img->thumbnail))
                                <img class="thumbnails" src="{{ $img->thumbnail }}"/>
                            @else
                                <img class="thumbnails" src="{{ $img->full_url }}"
                                     style="max-width:100px; max-height: 100px;"/>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-6 bg-white" id="previewHolder">
                    <div class="catalog-detail-image pt-5">
                        <div class="image-single" id="add-images" data-pswp="{bgOpacity: 0.75, shareButtons: false}">
                            <img id="image-0" src="{{ $media[0]->full_url }}" alt="{{ $product[0]->label }}"/>
                        </div>
                    </div>
                    <div id="imagePreview"></div>
                </div>

                <div class="col-sm-4 bg-white rounded">
                    <div>
                        <h1 class="name product_name" itemprop="name">{{ $product[0]->label }}</h1>
                        <p id="artistNameHere"></p>
                        <p><span class="name">Article no.: </span><span class="text-peach OpenSans-Bold product_sku"
                                                                        itemprop="sku">{{ $product[0]->sku }}</span></p>
                        <p class="short product_shortdesc"
                           itemprop="description">{!! $product[0]->shortDescription !!}</p>
                    </div>


                    <div class="catalog-detail-basket" data-reqstock="1" itemprop="offers" itemscope=""
                         itemtype="http://schema.org/Offer">

                        <div class="catalog-detail-service">
                            <span class="service-intro">+ shipping costs</span>

                            <ul class="service-list" style="display: none;">


                                <li class="service-item">
                                    <span class="service-name">Click &amp; Collect</span>


                                    <meta itemprop="price" content="0.00">


                                    <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                         itemtype="http://schema.org/PriceSpecification">

                                        <meta itemprop="valueAddedTaxIncluded" content="true">
                                        <meta itemprop="priceCurrency" content="USD">
                                        <meta itemprop="price" content="0.00">

                                        <span class="quantity" itemscope=""
                                              itemtype="http://schema.org/QuantitativeValue">
                                                            <meta itemprop="minValue" content="1">
                                                            from 1</span>

                                        <span class="value">
                                                            $ 0.00</span>


                                        <span class="taxrate">
                                                            Incl. 0.00% VAT</span>
                                    </div>


                                    <span class="service-short">Local pick-up</span>
                                </li>


                                <li class="service-item">
                                    <span class="service-name">DHL</span>


                                    <meta itemprop="price" content="0.00">


                                    <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                         itemtype="http://schema.org/PriceSpecification">

                                        <meta itemprop="valueAddedTaxIncluded" content="true">
                                        <meta itemprop="priceCurrency" content="USD">
                                        <meta itemprop="price" content="0.00">

                                        <span class="quantity" itemscope=""
                                              itemtype="http://schema.org/QuantitativeValue">
                                                            <meta itemprop="minValue" content="1">
                                                            from 1</span>

                                        <span class="value">
                                                            $ 0.00</span>


                                        <span class="costs">
                                                            $ 7.90</span>

                                        <span class="taxrate">
                                                            Incl. 10.00% VAT</span>
                                    </div>


                                    <span class="service-short">Delivery within three days</span>
                                </li>


                                <li class="service-item">
                                    <span class="service-name">DHL Express</span>


                                    <meta itemprop="price" content="0.00">


                                    <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                         itemtype="http://schema.org/PriceSpecification">

                                        <meta itemprop="valueAddedTaxIncluded" content="true">
                                        <meta itemprop="priceCurrency" content="USD">
                                        <meta itemprop="price" content="0.00">

                                        <span class="quantity" itemscope=""
                                              itemtype="http://schema.org/QuantitativeValue">
                                                            <meta itemprop="minValue" content="1">
                                                            from 1</span>

                                        <span class="value">
                                                            $ 0.00</span>


                                        <span class="costs">
                                                            $ 15.90</span>

                                        <span class="taxrate">
                                                            Incl. 10.00% VAT</span>
                                    </div>


                                    <span class="service-short">Delivery on the next day</span>
                                </li>


                                <li class="service-item">
                                    <span class="service-name">Fedex</span>


                                    <meta itemprop="price" content="0.00">


                                    <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                         itemtype="http://schema.org/PriceSpecification">

                                        <meta itemprop="valueAddedTaxIncluded" content="true">
                                        <meta itemprop="priceCurrency" content="USD">
                                        <meta itemprop="price" content="0.00">

                                        <span class="quantity" itemscope=""
                                              itemtype="http://schema.org/QuantitativeValue">
                                                            <meta itemprop="minValue" content="1">
                                                            from 1</span>

                                        <span class="value">
                                                            $ 0.00</span>


                                        <span class="costs">
                                                            $ 8.50</span>

                                        <span class="taxrate">
                                                            Incl. 10.00% VAT</span>
                                    </div>


                                    <span class="service-short">Delivery within three days</span>
                                </li>


                                <li class="service-item">
                                    <span class="service-name">TNT</span>


                                    <meta itemprop="price" content="0.00">


                                    <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                         itemtype="http://schema.org/PriceSpecification">

                                        <meta itemprop="valueAddedTaxIncluded" content="true">
                                        <meta itemprop="priceCurrency" content="USD">
                                        <meta itemprop="price" content="0.00">

                                        <span class="quantity" itemscope=""
                                              itemtype="http://schema.org/QuantitativeValue">
                                                            <meta itemprop="minValue" content="1">
                                                            from 1</span>

                                        <span class="value">
                                                            $ 0.00</span>


                                        <span class="costs">
                                                            $ 12.90</span>

                                        <span class="taxrate">
                                                            Incl. 10.00% VAT</span>
                                    </div>


                                    <span class="service-short">Delivery within three days</span>
                                </li>


                            </ul>

                        </div>


                        <!-- <button type="button" class="btn btn-sm btn-info btn-lg" data-toggle="modal" data-target="#myModal">Customise</button> -->


                        <style type="text/css">
                            .modal-dialog {
                                width: 90%;
                                height: 90%;

                                margin: 0;
                                top: 50px;
                                left: 100px;
                                padding: 0;
                            }

                            .modal-content {
                                height: auto;
                                min-height: 90%;
                                border-radius: 0;
                            }
                        </style>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">

                                    <iframe align="center" height="550" width="100%" src="">loading...</iframe>

                                </div>

                            </div>
                        </div>


                        <form method="POST" action="/basket">
                            {{ csrf_field() }}


                            <div class="catalog-detail-basket-selection" id="product-color-size">
                                <ul class="selection"
                                    data-proddeps="{&quot;117&quot;:[118,130],&quot;119&quot;:[131,100],&quot;120&quot;:[132,99],&quot;126&quot;:[118,99],&quot;127&quot;:[118,100],&quot;128&quot;:[131,130],&quot;129&quot;:[131,99],&quot;130&quot;:[132,130],&quot;131&quot;:[132,100],&quot;118&quot;:[141,130],&quot;147&quot;:[141,99],&quot;148&quot;:[141,100]}"
                                    data-attrdeps="{&quot;118&quot;:[117,126,127],&quot;130&quot;:[117,128,130,118],&quot;131&quot;:[119,128,129],&quot;100&quot;:[119,127,131,148],&quot;132&quot;:[120,130,131],&quot;99&quot;:[120,126,129,147],&quot;141&quot;:[118,147,148]}">


                                    <li class="select-item radio color">
                                        <div class="select-name">Color</div>


                                        <div class="select-value">

                                            <ul class="select-list-color" id="varient-color" data-index="0"
                                                data-type="color">

                                                @foreach($attributes as $attr)

                                                    @if($attr->attribute_label == 'color')

                                                        <li class="select-entry-color">
                                                            <input class="select-option" type="radio"
                                                                   id="option-{{ $attr->code1 }}"
                                                                   name="{{ $attr->value }}" value="{{ $attr->code1 }}">
                                                            <label class="select-label" name="{{ $attr->value }}"
                                                                   for="{{ $attr->code1 }}"
                                                                   style="background-color:{{ $attr->code1 }}; width:30px;height:30px;"></label>

                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>

                                        </div>
                                    </li>

                                    <li class="select-item select size">
                                        <div class="select-name">Size</div>


                                        <div class="select-value">


                                            <select class="form-control select-list" id="varient-size" name="">

                                                @foreach($attributes as $attr)
                                                    @if($attr->attribute_label == 'size')
                                                        <option class="select-option" @if($attr->value == 'L') selected
                                                                @endif value="{{ $attr->code1 }}">
                                                            {{ $attr->value }}
                                                        </option>
                                                        @endif
                                                        @endforeach

                                                        </option>
                                            </select>

                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <p id="mockgen-url">
                                <a href="/thetool/{{ $product_id }}" class="Customize text-peach"><span
                                            class="icon-paint-brush"></span> <span class="OpenSans-Semibold"> Customize
                                                                                            </span><span
                                            class="font-italic">Change Artwork or Add Text</span></a>
                            </p>

                            <div class="product-price">
                                <h1>
                                    <div class="price-list">
                                        <div class="articleitem price price-actual" data-prodid="116"
                                             data-prodcode="101">

                                            <meta itemprop="price" content="10.00">


                                            <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                                 itemtype="http://schema.org/PriceSpecification">

                                                <meta itemprop="valueAddedTaxIncluded" content="true">
                                                <meta itemprop="priceCurrency" content="USD">
                                                <meta itemprop="price" content="10.00">

                                                <span class="quantity" itemscope=""
                                                      itemtype="http://schema.org/QuantitativeValue">
                                                                                                            <meta itemprop="minValue"
                                                                                                                  content="1">
                                                                                                            from 1</span>

                                                <h3 class="value product_price">${{ $product[0]->salePrice }}</h3>


                                                <span class="taxrate">
                                                                                                            Incl. 8.25% VAT</span>
                                            </div>

                                        </div>


                                        <div class="articleitem price" data-prodid="148" data-prodcode="104_2">

                                            <meta itemprop="price" content="27.00">


                                            <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                                 itemtype="http://schema.org/PriceSpecification">

                                                <meta itemprop="valueAddedTaxIncluded" content="true">
                                                <meta itemprop="priceCurrency" content="USD">
                                                <meta itemprop="price" content="27.00">

                                                <span class="quantity" itemscope=""
                                                      itemtype="http://schema.org/QuantitativeValue">
                                                                                                            <meta itemprop="minValue"
                                                                                                                  content="1">
                                                                                                            from 1</span>

                                                <span class="value" id="totalPrice">
                                                                                                            $ 27.00</span>


                                                <span class="taxrate" id="included-tax">
                                                                                                            Incl. 0.01% VAT</span>
                                            </div>

                                        </div>

                                    </div>
                                </h1>
                            </div>
                            <p>Quantity 1</p>

                            <div class="cart-section">
                                <div class="quntity">
                                    <a class="aplus" href="#" role="button">
                                        <span class="icon-minus"></span>
                                    </a>
                                    <input type="hidden" value="add" name="b_action">
                                    <input type="hidden" name="b_prod[0][prodid]" value="{{ $product_id }}">
                                    <input type="number" class="quntity-input" name="b_prod[0][quantity]" min="1"
                                           max="2147483647" maxlength="10" step="1" required="required" value="1">
                                    <a class="aminus" href="#" role="button">
                                        <span class="icon-plus"></span>
                                    </a>
                                </div>
                                <div class="cart-div">
                                    <button class="btn btn-orange" type="submit" value="">
                                        <span class="icon-shopping-cart"></span> Add to cart
                                    </button>
                                </div>
                                <div class="share-div">
                                    <a href="#"><span class="icon-heart"></span></a>
                                    <a href="#"><span class="icon-share-alt"></span></a>
                                </div>
                            </div>

                        </form>

                    </div>


                    <div class="catalog-actions">

                        <a class="actions-button actions-button-pin"
                           href="/detail/pin/add/{{ $product_id }}/{{ $product_id }}/Puma_Crewneck_Tshirt/1"
                           title="Pin"></a>


                        <a class="actions-button actions-button-watch"
                           href="/myaccount/watch/add/{{ $product_id }}/{{ $product_id }}/Puma_Crewneck_Tshirt/1"
                           title="watch"></a>


                        <a class="actions-button actions-button-favorite"
                           href="/myaccount/favorite/add/{{ $product_id }}/{{ $product_id }}/Puma_Crewneck_Tshirt/1"
                           title="favorite"></a>

                    </div>


                    <div class="catalog-social">

                        <a class="social-button social-button-facebook"
                           href="https://www.facebook.com/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fdetail%2F116%2FPuma_Crewneck_Tshirt&amp;t=Puma_Crewneck_Tshirt"
                           title="facebook" target="_blank"></a>


                        <a class="social-button social-button-gplus"
                           href="https://plus.google.com/share?url=http%3A%2F%2F127.0.0.1%3A8000%2Fdetail%2F116%2FPuma_Crewneck_Tshirt"
                           title="gplus" target="_blank"></a>


                        <a class="social-button social-button-twitter"
                           href="https://twitter.com/share?url=http%3A%2F%2F127.0.0.1%3A8000%2Fdetail%2F116%2FPuma_Crewneck_Tshirt&amp;text=Puma_Crewneck_Tshirt"
                           title="twitter" target="_blank"></a>


                        <a class="social-button social-button-pinterest"
                           href="https://pinterest.com/pin/create/button/?url=http%3A%2F%2F127.0.0.1%3A8000%2Fdetail%2F116%2FPuma_Crewneck_Tshirt&amp;description=Puma_Crewneck_Tshirt&amp;media=http%3A%2F%2F127.0.0.1%3A8000%2Ffiles%2F2%2F3%2F2350ae78ecc09da88aa85321701f9fd4.jpg"
                           title="pinterest" target="_blank"></a>

                    </div>

                </div>

                <div class="col-md-12 bg-white rounded">

                    <ul class="nav nav-tabs catlist">
                        <li class="nav-item catitems">
                            <a href="#" title="Men" class="nav-link active subcat" id="subcat_men">
                                <i class="fas fa-mars"></i> Men
                            </a>
                        </li>
                        <li class="nav-item catitems">
                            <a href="#" title="Women" class="nav-link subcat" id="subcat_women">
                                <i class="fas fa-venus"></i> Women
                            </a>
                        </li>
                        <li class="nav-item catitems">
                            <a href="#" title="Kids" class="nav-link subcat" id="subcat_kids">
                                <i class="fas fa-child"></i> Kids
                            </a>
                        </li>
                        <li class="nav-item catitems">
                            <a href="#" title="Accessories" class="nav-link subcat" id="subcat_accessories">
                                <i class="fas fa-shopping-bag"></i> Accessories
                            </a>
                        </li>
                        <li class="nav-item catitems">
                            <a href="#" title="Phone Cases" class="nav-link subcat" id="subcat_phones">
                                <i class="fas fa-mobile-alt"></i> Phone Cases
                            </a>
                        </li>
                        <li class="nav-item catitems">
                            <a href="#" title="Home" class="nav-link subcat" id="subcat_home">
                                <i class="fas fa-home"></i> Home & Living
                            </a>
                        </li>
                    </ul>

                    <div class="m-2 p-2 text-center">

                        <div id="previousSubs" style="width:10%; margin-top: auto; margin-bottom: auto;" hidden="true">
                            <i class="fas fa-arrow-circle-left"></i>
                        </div>

                        <div id="pulled_subs" class="d-inline" style="width:80%">

                        </div>

                        <div id="nextSubs" style="width:10%; margin-top: auto; margin-bottom: auto;">
                            <i class="fas fa-arrow-circle-right"></i>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 p-0">
                    <div class="catalog-detail-additional">
                        <div class="additional-box rounded">
                            <h5 class="header description font-weight-bold">Description / Characteristics</h5>
                            <div class="content description row m-0 p-0" style="display: none;">
                                <div class="long item col-sm-6 py-1 px-5" id="longDescription">
                                </div>
                                <div class="col-sm-6 py-1 px-5">
                                    <table class="attributes">
                                        <tbody>
                                        <tr class="item">
                                            <td class="name">Color</td>
                                            <td class="value">
                                                <div class="media-list">
                                                </div>
                                                <span class="attr-name" id="selected-color"></span>
                                            </td>
                                        <tr class="item">
                                            <td class="name">Size</td>
                                            <td class="value">
                                                <div class="media-list">
                                                </div>
                                                <span class="attr-name" id="selected-size"></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 p-0">
                    <div class="catalog-detail-additional">
                        <div class="additional-box rounded" id="artist-details">

                            <h5 class="header description font-weight-bold">About the designer</h5>
                            <div class="content">
                                <img src="{{ asset('images/designer-image.png') }}" class="mr-3" class="img-fluid"
                                     alt="...">
                                <div class="media-body">
                                    <h5 id="artistName"></h5>
                                    <strong></strong>
                                    <h4 class="mt-2 text-peach" id="artist-sfront"></h4>
                                    <div id="about-artist"></div>
                                </div>
                            </div>
                        </div>

                        <div class="additional-box rounded" id="artist-details-reply">
                            <h5 class="header font-weight-bold">Top Reviews</h5>
                            <ul class="content list-unstyled">
                                <li class="media">
                                    <img src="{{ asset('images/user-review-image.png') }}" class="mr-3">
                                    <div class="media-body">

                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dignissim
                                        ultrices
                                        arcu a
                                        tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. Lorem ipsum
                                        dolor
                                        sit
                                        amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                                        tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. <a href="#"
                                                                                                               class="text-peach">More</a>
                                        <h5 class="mt-1 mb-0 text-peach font-italic">Christopher, Texas</h5>
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="{{ asset('images/user-review-image.png') }}" class="mr-3" alt="...">
                                    <div class="media-body">

                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dignissim
                                        ultrices
                                        arcu a
                                        tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. Lorem ipsum
                                        dolor
                                        sit
                                        amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                                        tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu.
                                        <h5 class="mt-1 mb-0 text-peach font-italic">Christopher, Texas</h5>
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="{{ asset('images/user-review-image.png') }}" class="mr-3" alt="...">
                                    <div class="media-body">

                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dignissim
                                        ultrices
                                        arcu a
                                        tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. Lorem ipsum
                                        dolor
                                        sit
                                        amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                                        tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. <a href="#"
                                                                                                               class="text-peach">More</a>
                                        <h5 class="mt-1 mb-0 text-peach font-italic">Christopher, Texas</h5>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function () {

            /**
             * MAIN AJAX CALL TO COLLECT TOKEN
             */
            {{--$.ajax({--}}
            {{--    url: "{{env('API_URL')}}token",--}}
            {{--    contentType: 'application/json',--}}
            {{--    dataType: 'json',--}}
            {{--    type: 'POST',--}}
            {{--    data: JSON.stringify({--}}
            {{--        "privateKey": "password"--}}
            {{--    }),--}}
            {{--    success: (result) => {--}}
            {{--        if (result.token) {--}}

            {{--            /**--}}
            {{--             * AJAX CALL TO GET PRODUCT BY ID--}}
            {{--             */--}}
            {{--            $.ajax({--}}
            {{--                url: "{{env('API_URL')}}api/product/getProductSpecifics?productId={{ $product_id }}",--}}
            {{--                contentType: 'application/json',--}}
            {{--                dataType: 'json',--}}
            {{--                headers: {--}}
            {{--                    "Authorization": "Bearer " + result.token,--}}
            {{--                    "Content-Type": "application/json"--}}
            {{--                },--}}
            {{--                type: 'GET',--}}
            {{--                success: function (artProduct) {--}}
            {{--                    let pid;--}}
            {{--                    if (artProduct.properties.artworkProduct) {--}}
            {{--                        pid = artProduct.properties.artworkProduct.productId;--}}
            {{--                        $('.product_name').text(artProduct.properties.product.label);--}}
            {{--                        $('.product_sku').text(artProduct.properties.product.sku);--}}
            {{--                        $('.product_shortdesc').text('');--}}
            {{--                        $('.product_shortdesc').append(artProduct.properties.product--}}
            {{--                            .shortDescription);--}}
            {{--                        $('#longDescription').text('');--}}
            {{--                        $("#longDescription").append(artProduct.properties.product--}}
            {{--                            .shortDescription);--}}
            {{--                        $('.product_price').text("$" + artProduct.properties.product--}}
            {{--                            .salePrice);--}}
            {{--                        $("#product-characteristics").hide();--}}
            {{--                        if (!artProduct.properties.product.isPrintEnable) {--}}
            {{--                            $("#mockgen-url").hide();--}}
            {{--                        } else if (artProduct.properties.product.productType == 2) {--}}
            {{--                            $("#mockgen-url").hide();--}}
            {{--                        }--}}
            {{--                        $("#product-color-size").hide();--}}
            {{--                        $('#current_product').text(artProduct.properties.product.label);--}}

            {{--                        /**--}}
            {{--                         * AJAX CALL TO GET IMAGE(S) BY ID--}}
            {{--                         */--}}
            {{--                        var imageI = 0;--}}
            {{--                        var productImages = [];--}}
            {{--                        var designedImages = artProduct.properties.artworkProduct.designedImage.split(",");--}}

            {{--                        for(imageI = 0; imageI < designedImages.length; imageI++) {--}}
            {{--                            $.ajax({--}}
            {{--                                url: "{{env('API_URL')}}api/media/getById/" +--}}
            {{--                                    designedImages[imageI],--}}
            {{--                                contentType: 'application/json',--}}
            {{--                                dataType: 'json',--}}
            {{--                                headers: {--}}
            {{--                                    "Authorization": "Bearer " +--}}
            {{--                                        result.token,--}}
            {{--                                    "Content-Type": "application/json"--}}
            {{--                                },--}}
            {{--                                type: 'GET',--}}
            {{--                                success: function (images) {--}}
            {{--                                    productImages.push(images.properties.full_url);--}}

            {{--                                    if(imageI < 1) {--}}
            {{--                                        $('#add-images').html(`--}}
            {{--                                            <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">--}}
            {{--                                                <a href="${images.properties.full_url}" itemprop="contentUrl"></a>--}}
            {{--                                                <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>--}}
            {{--                                            </figure>--}}
            {{--                                        `);--}}

            {{--                                    }--}}
            {{--                                }--}}
            {{--                            });--}}
            {{--                        }--}}

            {{--                        console.log("IMAGES: " + JSON.stringify(productImages));--}}

            {{--                        /**--}}
            {{--                         * AJAX CALL TO GET THE ARTIST DETAILS BY ARTIST ID--}}
            {{--                         */--}}
            {{--                        $.ajax({--}}
            {{--                            url: "{{env('API_URL')}}api/users/getUserDetailsById/" + artProduct.properties.artworkProduct.createdById,--}}
            {{--                            contentType: 'application/json',--}}
            {{--                            dataType: 'json',--}}
            {{--                            headers: {--}}
            {{--                                "Authorization": "Bearer " +--}}
            {{--                                    result.token,--}}
            {{--                                "Content-Type": "application/json"--}}
            {{--                            },--}}
            {{--                            type: 'GET',--}}
            {{--                            success: function (userData) {--}}
            {{--                                $("#artistName").html(userData.properties.firstName + " " + userData.properties.lastName);--}}
            {{--                                $("#about-artist").html(userData.properties.aboutYou);--}}
            {{--                                $("#artist-sfront").html(`<a href="{{ url('/') }}/artiststorefront/${artProduct.properties.artworkProduct.createdById}">Go to designer’s store</a>`);--}}
            {{--                                $("#artistNameHere").html(`<span class="name">Designed By: </span><span class="text-peach OpenSans-Bold product_artistname" itemprop="artistname"><a href="{{ url('/') }}/artiststorefront/${artProduct.properties.artworkProduct.createdById}">${userData.properties.firstName} ${userData.properties.lastName}</a></spam>`)--}}
            {{--                                $("#moredesignsBy").html(userData.properties.firstName + " " + userData.properties.lastName);--}}
            {{--                                console.log("---2--", userData);--}}
            {{--                            }--}}

            {{--                        });--}}

            {{--                        /**--}}
            {{--                         * AJAX CALL TO GET ART PRODUCTS--}}
            {{--                         */--}}
            {{--                        $.ajax({--}}
            {{--                            url: "{{env('API_URL')}}api/artworkProduct/getAllArtProducts?pageNumber=1&limit=4",--}}
            {{--                            contentType: 'application/json',--}}
            {{--                            dataType: 'json',--}}
            {{--                            headers: {--}}
            {{--                                "Authorization": "Bearer " +--}}
            {{--                                    result.token,--}}
            {{--                                "Content-Type": "application/json"--}}
            {{--                            },--}}
            {{--                            type: 'GET',--}}
            {{--                            success: function (otherProducts) {--}}
            {{--                                console.log("---other--", otherProducts);--}}
            {{--                                for (let i = 0; i < otherProducts.properties.length; i++) {--}}

            {{--                                    /**--}}
            {{--                                     * AJAX CALL TO GET ART PRODUCT IMAGES BY ID--}}
            {{--                                     */--}}
            {{--                                    $.ajax({--}}
            {{--                                        url: "{{env('API_URL')}}api/media/getById/" +--}}
            {{--                                            otherProducts.properties[i].artworkProduct.designedImage.split(",")[--}}
            {{--                                                0],--}}
            {{--                                        contentType: 'application/json',--}}
            {{--                                        dataType: 'json',--}}
            {{--                                        headers: {--}}
            {{--                                            "Authorization": "Bearer " +--}}
            {{--                                                result.token,--}}
            {{--                                            "Content-Type": "application/json"--}}
            {{--                                        },--}}
            {{--                                        type: 'GET',--}}
            {{--                                        success: function (images) {--}}
            {{--                                            $('#otherArtistProducts').append(`--}}
            {{--                                    <div class="col-3 item">--}}
            {{--                                        <div class="product-grid">--}}
            {{--                                            <div class="product-image">--}}
            {{--                                                <a href="{{url('/')}}/product-details/${otherProducts.properties[i].product.id}"><img src="${images.properties.full_url}"></a>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="product-content">--}}
            {{--                                                <h3 class="title"><a style="color:#362865" href="{{url('/')}}/product-details/${otherProducts.properties[i].product.id}">${otherProducts.properties[i].product.label}</a></h3>--}}
            {{--                                                <div class="price">--}}
            {{--                                                    $${otherProducts.properties[i].product.salePrice}--}}
            {{--                                                </div>--}}

            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                    `);--}}
            {{--                                        }--}}
            {{--                                    });--}}
            {{--                                }--}}
            {{--                            }--}}
            {{--                        });--}}

            {{--                        /**--}}
            {{--                         * AJAX CALL TO GET ART PRODUCTS BY ARTIST ID--}}
            {{--                         */--}}
            {{--                        $.ajax({--}}
            {{--                            url: "{{env('API_URL')}}api/artworkProduct/getAllArtProductsByArtist?artistId=" + artProduct.properties.artworkProduct.createdById + "&pageNumber=1&limit=4",--}}
            {{--                            contentType: 'application/json',--}}
            {{--                            dataType: 'json',--}}
            {{--                            headers: {--}}
            {{--                                "Authorization": "Bearer " +--}}
            {{--                                    result.token,--}}
            {{--                                "Content-Type": "application/json"--}}
            {{--                            },--}}
            {{--                            type: 'GET',--}}
            {{--                            success: function (sameArtistProducts) {--}}
            {{--                                console.log("---other--", sameArtistProducts);--}}
            {{--                                for (let i = 0; i < sameArtistProducts.properties.length; i++) {--}}

            {{--                                    $('#sameArtistProducts').append(`--}}
            {{--                                <div class="col-3 item">--}}
            {{--                                    <div class="product-grid">--}}
            {{--                                        <div class="product-image">--}}
            {{--                                            <a href="{{url('/')}}/product-details/${sameArtistProducts.properties[i].product.id}"><img src="${sameArtistProducts.properties[i].artworkProduct.designedImage}"></a>--}}
            {{--                                        </div>--}}
            {{--                                        <div class="product-content">--}}
            {{--                                            <h3 class="title"><a style="color:#362865" href="{{url('/')}}/product-details/${sameArtistProducts.properties[i].product.id}">${sameArtistProducts.properties[i].product.label}</a></h3>--}}
            {{--                                            <div class="price">--}}
            {{--                                                $${sameArtistProducts.properties[i].product.salePrice}--}}
            {{--                                            </div>--}}

            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            `);--}}
            {{--                                }--}}
            {{--                            }--}}

            {{--                        });--}}
            {{--                    } else {--}}
            {{--                        $("#artist-details").show();--}}
            {{--                        $("#artist-details-reply").show();--}}
            {{--                        $("#products-by-artist").show();--}}
            {{--                        $("#artist-other-products").show();--}}
            {{--                        pid = {{$product_id}};--}}
            {{--                        console.log("art-", artProduct);--}}

            {{--                        /**--}}
            {{--                         * AJAX CALL TO GET PRODUCT INFORMATION BY PRODUCT ID--}}
            {{--                         */--}}
            {{--                        $.ajax({--}}
            {{--                            url: "{{env('API_URL')}}api/product/getProductSpecifics?productId=" + pid,--}}
            {{--                            contentType: 'application/json',--}}
            {{--                            dataType: 'json',--}}
            {{--                            headers: {--}}
            {{--                                "Authorization": "Bearer " + result.token,--}}
            {{--                                "Content-Type": "application/json"--}}
            {{--                            },--}}
            {{--                            type: 'GET',--}}
            {{--                            success: function (products) {--}}
            {{--                                if (products.operationCode == 200) {--}}
            {{--                                    if (!products.properties.productVariants.length) {--}}
            {{--                                        $('.product_name').text(products.properties.product.label);--}}
            {{--                                        $('.product_sku').text(products.properties.product.sku);--}}
            {{--                                        $('.product_shortdesc').text('');--}}
            {{--                                        $('.product_shortdesc').append(products.properties.product--}}
            {{--                                            .shortDescription);--}}
            {{--                                        $('#longDescription').text('');--}}
            {{--                                        $("#longDescription").append(products.properties.product--}}
            {{--                                            .shortDescription);--}}
            {{--                                        $('.product_price').text("$" + products.properties.product--}}
            {{--                                            .salePrice);--}}
            {{--                                        $("#product-characteristics").hide();--}}
            {{--                                        if (!products.properties.product.isPrintEnable) {--}}
            {{--                                            $("#mockgen-url").hide();--}}
            {{--                                        } else if (products.properties.product.productType == 2 == 2) {--}}
            {{--                                            $("#mockgen-url").hide();--}}
            {{--                                        }--}}
            {{--                                        $("#product-color-size").hide();--}}

            {{--                                        /**--}}
            {{--                                         * AJAX CALL TO GET IMAGE(s) BY ID--}}
            {{--                                         */--}}

            {{--                                        var productImageUrls = [];--}}
            {{--                                        var productImages = products.properties.product.image.split(",");--}}

            {{--                                        for(var imageI = 0; imageI < productImages.length; imageI++) {--}}
            {{--                                            $.ajax({--}}
            {{--                                                url: "{{env('API_URL')}}api/media/getById/" +--}}
            {{--                                                    productImages[i],--}}
            {{--                                                contentType: 'application/json',--}}
            {{--                                                dataType: 'json',--}}
            {{--                                                headers: {--}}
            {{--                                                    "Authorization": "Bearer " +--}}
            {{--                                                        result.token,--}}
            {{--                                                    "Content-Type": "application/json"--}}
            {{--                                                },--}}
            {{--                                                type: 'GET',--}}
            {{--                                                success: function (images) {--}}
            {{--                                                    productImageUrls.push(images.properties.full_url);--}}

            {{--                                                    if(imageI < 1) {--}}
            {{--                                                        $('#add-images').html(`--}}
            {{--                                                            <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">--}}
            {{--                                                                <a href="${images.properties.full_url}" itemprop="contentUrl"></a>--}}
            {{--                                                                <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>--}}
            {{--                                                            </figure>--}}
            {{--                                                        `);--}}
            {{--                                                    }--}}
            {{--                                                }--}}
            {{--                                            });--}}
            {{--                                        }--}}

            {{--                                        console.log("Product Images: " + JSON.stringify(productImageUrls));--}}

            {{--                                    } else {--}}
            {{--                                        console.log(products);--}}
            {{--                                        console.log(products.properties.attributeDetails.length);--}}
            {{--                                        $('.product_name').text(products.properties.product.label);--}}
            {{--                                        if (!products.properties.product.isPrintEnable) {--}}
            {{--                                            $("#mockgen-url").hide();--}}
            {{--                                        } else if (products.properties.product.productType == 2 == 2) {--}}
            {{--                                            $("#mockgen-url").hide();--}}
            {{--                                        }--}}
            {{--                                        for (let i = 0; i < products.properties.attributeDetails--}}
            {{--                                            .length; i++) {--}}
            {{--                                            if (products.properties.attributeDetails[i].attributeId--}}
            {{--                                                .label === 'color') {--}}
            {{--                                                $("#varient-color").append(`--}}
            {{--                                                <li class="select-entry-color">--}}
            {{--                                                    <input class="select-option" type="radio" id="option-${products.properties.attributeDetails[i].code1}" name="${products.properties.attributeDetails[i].value}" value="${products.properties.attributeDetails[i].code1}">--}}
            {{--                                                    <label class="select-label" name="${products.properties.attributeDetails[i].value}" for="${products.properties.attributeDetails[i].code1}" style="background-color:${products.properties.attributeDetails[i].code1}; width:30px;height:30px;"></label>--}}
            {{--                                                </li>--}}
            {{--                                            `);--}}
            {{--                                            }--}}
            {{--                                            if (products.properties.attributeDetails[i].attributeId--}}
            {{--                                                .label === 'size') {--}}
            {{--                                                $("#varient-size").append(`--}}
            {{--                                                <option class="select-option" value="${products.properties.attributeDetails[i].code1}">${products.properties.attributeDetails[i].value}</option>--}}
            {{--                                                </li>--}}
            {{--                                            `);--}}
            {{--                                            }--}}
            {{--                                        }--}}
            {{--                                        $(".select-entry-color label").first().addClass("active");--}}

            {{--                                        $(".select-entry-color label").on('click', function (e) {--}}
            {{--                                            $(".select-entry-color label.active")--}}
            {{--                                                .removeClass('active');--}}
            {{--                                            $(this).addClass('active');--}}
            {{--                                            let newVariant = products.properties--}}
            {{--                                                .productVariants.filter(function (el) {--}}
            {{--                                                    return el.colorCode1 == $(--}}
            {{--                                                        '.select-entry-color label.active'--}}
            {{--                                                        ).attr('for') &&--}}
            {{--                                                        el.sizeCode == $(--}}
            {{--                                                            '#varient-size').val();--}}
            {{--                                                });--}}
            {{--                                            $('.product_sku').text(newVariant[0].sku);--}}
            {{--                                            $('.product_shortdesc').text('');--}}
            {{--                                            $('.product_shortdesc').append(newVariant[0]--}}
            {{--                                                .shortDescription);--}}
            {{--                                            $('#longDescription').text('');--}}
            {{--                                            $("#longDescription").append(artProduct.properties.product--}}
            {{--                                                .shortDescription);--}}
            {{--                                            $('.product_price').text("$" + newVariant[0]--}}
            {{--                                                .salePrice);--}}
            {{--                                            $('#selected-color').text($(--}}
            {{--                                                '.select-entry-color label.active')--}}
            {{--                                                .attr('name'));--}}
            {{--                                            $('#selected-size').text($(--}}
            {{--                                                '#varient-size option:selected')--}}
            {{--                                                .text());--}}




            {{--                                            $.ajax({--}}
            {{--                                                url: "{{env('API_URL')}}api/media/getById/" +--}}
            {{--                                                    newVariant[0].image.split(",")[--}}
            {{--                                                        0],--}}
            {{--                                                contentType: 'application/json',--}}
            {{--                                                dataType: 'json',--}}
            {{--                                                headers: {--}}
            {{--                                                    "Authorization": "Bearer " +--}}
            {{--                                                        result.token,--}}
            {{--                                                    "Content-Type": "application/json"--}}
            {{--                                                },--}}
            {{--                                                type: 'GET',--}}
            {{--                                                success: function (images) {--}}
            {{--                                                    $('#add-images').html(`--}}
            {{--                                            <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">--}}
            {{--                                                <a href="${images.properties.full_url}" itemprop="contentUrl"></a>--}}
            {{--                                                <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>--}}
            {{--                                            </figure>--}}
            {{--                                            `);--}}
            {{--                                                    console.log(images);--}}
            {{--                                                    console.log(images--}}
            {{--                                                        .properties.full_url--}}
            {{--                                                    );--}}
            {{--                                                }--}}
            {{--                                            });--}}
            {{--                                            e.preventDefault();--}}
            {{--                                        });--}}

            {{--                                        $("#varient-size").change(function () {--}}
            {{--                                            let newVariant = products.properties--}}
            {{--                                                .productVariants.filter(function (el) {--}}
            {{--                                                    return el.colorCode1 == $(--}}
            {{--                                                        '.select-entry-color label.active'--}}
            {{--                                                        ).attr('for') &&--}}
            {{--                                                        el.sizeCode == $(--}}
            {{--                                                            '#varient-size').val();--}}
            {{--                                                });--}}
            {{--                                            $('.product_sku').text(newVariant[0].sku);--}}
            {{--                                            $('.product_shortdesc').text('');--}}
            {{--                                            $('.product_shortdesc').append(newVariant[0]--}}
            {{--                                                .shortDescription);--}}
            {{--                                            $('#longDescription').text('');--}}
            {{--                                            $("#longDescription").append(artProduct.properties.product--}}
            {{--                                                .shortDescription);--}}
            {{--                                            $('.product_price').text("$" + newVariant[0]--}}
            {{--                                                .salePrice);--}}
            {{--                                            $('#selected-color').text($(--}}
            {{--                                                '.select-entry-color label.active')--}}
            {{--                                                .attr('name'));--}}
            {{--                                            $('#selected-size').text($(--}}
            {{--                                                '#varient-size option:selected')--}}
            {{--                                                .text());--}}
            {{--                                            $.ajax({--}}
            {{--                                                url: "{{env('API_URL')}}api/media/getById/" +--}}
            {{--                                                    newVariant[0].image.split(",")[--}}
            {{--                                                        0],--}}
            {{--                                                contentType: 'application/json',--}}
            {{--                                                dataType: 'json',--}}
            {{--                                                headers: {--}}
            {{--                                                    "Authorization": "Bearer " +--}}
            {{--                                                        result.token,--}}
            {{--                                                    "Content-Type": "application/json"--}}
            {{--                                                },--}}
            {{--                                                type: 'GET',--}}
            {{--                                                success: function (images) {--}}
            {{--                                                    $('#add-images').html(`--}}
            {{--                                            <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">--}}
            {{--                                                <a href="${images.properties.full_url}" itemprop="contentUrl"></a>--}}
            {{--                                                <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>--}}
            {{--                                            </figure>--}}
            {{--                                            `);--}}
            {{--                                                    console.log(images);--}}
            {{--                                                    console.log(images--}}
            {{--                                                        .properties.full_url--}}
            {{--                                                    );--}}
            {{--                                                }--}}
            {{--                                            });--}}
            {{--                                        });--}}

            {{--                                        $("#varient-size").prop("selectedIndex", 1);--}}
            {{--                                        var newVariantGlobal = products.properties.productVariants--}}
            {{--                                            .filter(function (el) {--}}
            {{--                                                return el.colorCode1 == $(--}}
            {{--                                                    '.select-entry-color label.active')--}}
            {{--                                                        .attr('for') &&--}}
            {{--                                                    el.sizeCode == $('#varient-size').val();--}}
            {{--                                            });--}}
            {{--                                        $('.product_sku').text(newVariantGlobal[0].sku);--}}
            {{--                                        $('.product_shortdesc').text('');--}}
            {{--                                        $('.product_shortdesc').append(newVariantGlobal[0]--}}
            {{--                                            .shortDescription);--}}
            {{--                                        $('#longDescription').text('');--}}
            {{--                                        $("#longDescription").append(artProduct.properties.product--}}
            {{--                                            .shortDescription);--}}
            {{--                                        $('.product_price').text("$" + newVariantGlobal[0]--}}
            {{--                                            .salePrice);--}}
            {{--                                        console.log($('.select-entry-color label.active').attr(--}}
            {{--                                            'name'), '----');--}}
            {{--                                        $('#selected-color').text($(--}}
            {{--                                            '.select-entry-color label.active').attr(--}}
            {{--                                            'name'));--}}
            {{--                                        $('#selected-size').text($('#varient-size option:selected')--}}
            {{--                                            .text());--}}
            {{--                                        $.ajax({--}}
            {{--                                            url: "{{env('API_URL')}}api/media/getById/" +--}}
            {{--                                                newVariantGlobal[0].image.split(",")[0],--}}
            {{--                                            contentType: 'application/json',--}}
            {{--                                            dataType: 'json',--}}
            {{--                                            headers: {--}}
            {{--                                                "Authorization": "Bearer " + result.token,--}}
            {{--                                                "Content-Type": "application/json"--}}
            {{--                                            },--}}
            {{--                                            type: 'GET',--}}
            {{--                                            success: function (images) {--}}
            {{--                                                $('#add-images').html(`--}}
            {{--                                        <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">--}}
            {{--                                            <a href="${images.properties.full_url}" itemprop="contentUrl"></a>--}}
            {{--                                            <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>--}}
            {{--                                        </figure>--}}
            {{--                                        `);--}}
            {{--                                                console.log(images);--}}
            {{--                                                console.log(images.properties.full_url);--}}
            {{--                                            }--}}
            {{--                                        });--}}
            {{--                                    }--}}
            {{--                                }--}}
            {{--                            }--}}
            {{--                        });--}}
            {{--                    }--}}
            {{--                }--}}
            {{--            });--}}
            {{--        }--}}
            {{--    }--}}
            {{--});--}}

            /**
             * Load Thumbnails into Main Image
             */
            $(".thumbnails").on('click', function (e) {

                $("#add-images").html('<img id="image-0" src="' + $(this).attr('src') + '" alt="{{ $product[0]->label }}"/>');

                $("#imagePreview").remove();

                $("#previewHolder").append("<div id=\"imagePreview\"></div>");

                imagePreviewer();

            });

            /**
             * GET TOKEN FOR API
             */
            var token = null;

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
                        token = result.token;
                    }
                }
            });

            $(".select-entry-color label").first().addClass("active");

            let variants = {!! json_encode($variants) !!};

            $(".select-entry-color label").on('click', function (e) {
                $(".select-entry-color label.active")
                    .removeClass('active');
                $(this).addClass('active');

                let newVariant = variants.filter(function (el) {
                    return el.color_code_1 == $(
                        '.select-entry-color label.active'
                        ).attr('for') &&
                        el.size_code == $('#varient-size').val();
                });

                $('.product_sku').text(newVariant[0].sku);

                $('.product_price').text("$" + newVariant[0]
                    .salePrice);

                $('#selected-color').text($(
                    '.select-entry-color label.active')
                    .attr('name'));

                $('#selected-size').text($(
                    '#varient-size option:selected')
                    .text());


                $.ajax({
                    url: "{{env('API_URL')}}api/media/getById/" +
                        newVariant[0].image.split(",")[
                            0],
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        "Authorization": "Bearer " +
                            token,
                        "Content-Type": "application/json"
                    },
                    type: 'GET',
                    success: function (images) {
                        $("#add-images").html('<img id="image-0" src="' + images.properties.full_url + '" alt="{{ $product[0]->label }}"/><div id="imagePreview"></div>');
                        imagePreviewer();
                    }
                });
                e.preventDefault();
            });

            /**
             * HANDLES SUB CATEGORY FUNCTIONALITY
             */
            var subType = "men";
            var subPage = 0;

            $(".subcat").on("click", function (e) {

                $("a.active").removeClass("active");

                var elementID = $(this).attr('id');
                var subBox = $("#pulled_subs");

                switch (elementID) {

                    case 'subcat_women':
                        if (subType !== "women") {
                            subType = "women";
                            subPage = 0;
                        }
                        break;

                    case 'subcat_kids':
                        if (subType !== "kid") {
                            subType = "kid";
                            subPage = 0;
                        }
                        break;

                    case 'subcat_accessories':
                        if (subType !== "accessories") {
                            subType = "accessories";
                            subPage = 0;
                        }
                        break;

                    case 'subcat_phones':
                        if (subType !== "phone") {
                            subType = "phone";
                            subPage = 0;
                        }
                        break;

                    case 'subcat_home':
                        if (subType !== "home") {
                            subType = "home";
                            subPage = 0;
                        }
                        break;

                    default: // MEN
                        if (subType !== "men") {
                            subType = "men";
                            subPage = 0;
                        }
                        break;

                }

                fetchProducts();

                $(this).addClass("active");

                return false;
            });

            function fetchProducts() {

                $("#pulled_subs").html("<div class=\"d-inline fa-4x\">\n" +
                    "  <strong>Loading...</strong>\n" +
                    "  <i class=\"fas fa-sync-alt fa-spin\"></i>\n" +
                    "</div>");

                subPage++;

                var previousSubs = $("#previousSubs");
                var nextSubs = $("#nextSubs");

                // Remove Arrows while we load
                previousSubs[0].style.setProperty("display", "none");
                nextSubs[0].style.setProperty("display", "none");

                $.ajax({
                    url: "/api/productinformation/" + subType + "/" + subPage,
                    contentType: 'application/json',
                    dataType: 'json',
                    type: 'GET',
                    success: (result) => {

                        var products = result.products;

                        var newHtml = '';

                        for (var i = 0; i < products.length; i++) {
                            newHtml += '<div class="d-inline p-4">' +
                                '<img src="' + products[i].full_url + '" style="max-height:250px" alt="' + products[i].label + '"/>' +
                                '</div>';
                        }

                        $("#pulled_subs").html(newHtml);

                        var currentPage = parseInt(result.currentPage);
                        var totalPages = parseInt(result.totalPages);

                        if (currentPage >= 2) {
                            previousSubs.removeAttr("hidden");
                            previousSubs[0].style.setProperty("display", "inline");
                        }

                        if (currentPage < totalPages) {
                            nextSubs.removeAttr("hidden");
                            nextSubs[0].style.setProperty("display", "inline");
                        }
                    }

                });
            }

            $("#nextSubs").on('click', function (e) {
                fetchProducts();
            });

            $("#previousSubs").on('click', function (e) {
                subPage = subPage - 2;
                fetchProducts();
            });

            fetchProducts();

            function imagePreviewer(e) {
                var img, lens, result, cx, cy;
                img = document.getElementById("image-0");
                result = document.getElementById("imagePreview");

                lens = document.createElement("DIV");
                lens.setAttribute("id", "image-lens");
                lens.setAttribute("class", "img-zoom-lens");
                img.parentElement.insertBefore(lens, img);

                cx = (result.offsetWidth / lens.offsetWidth) / 1.5;
                cy = (result.offsetHeight / lens.offsetHeight) / 1.5;

                result.style.backgroundImage = "url('" + img.src + "')";

                var im = new Image();
                im.src = img.src;

                console.log("Image width: " + im.width);
                console.log("Image height: " + im.height);

                result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";

                lens.addEventListener("mousemove", moveLens);
                img.addEventListener("mousemove", moveLens);
                lens.addEventListener("touchmove", moveLens);
                img.addEventListener("touchmove", moveLens);

                lens.addEventListener("mouseleave", function () {
                    $("#imagePreview").hide();
                });
                img.addEventListener("mouseleave", function () {
                    $("#imagePreview").hide();
                });

                $("#imagePreview").hide();

                function moveLens(e) {
                    var pos, x, y;

                    $("#imagePreview").show();

                    /*prevent any other actions that may occur when moving over the image:*/
                    e.preventDefault();

                    /*get the cursor's x and y positions:*/
                    pos = getCursorPos(e);

                    /*calculate the position of the lens:*/
                    x = pos.x - (lens.offsetWidth / 2);
                    y = pos.y - (lens.offsetHeight / 2);

                    /*prevent the lens from being positioned outside the image:*/
                    if (x > img.width - lens.offsetWidth) {
                        x = img.width - lens.offsetWidth;
                    }
                    if (x < 0) {
                        x = 0;
                    }
                    if (y > img.height - lens.offsetHeight) {
                        y = img.height - lens.offsetHeight;
                    }
                    if (y < 0) {
                        y = 0;
                    }

                    /*set the position of the lens:*/
                    lens.style.left = x + "px";
                    lens.style.top = y + "px";

                    /*display what the lens "sees":*/
                    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
                }

                function getCursorPos(e) {
                    var a, x = 0, y = 0;
                    e = e || window.event;

                    /*get the x and y positions of the image:*/
                    a = img.getBoundingClientRect();

                    /*calculate the cursor's x and y coordinates, relative to the image:*/
                    x = e.pageX - a.left;
                    y = e.pageY - a.top;

                    /*consider any page scrolling:*/
                    x = x - window.pageXOffset;
                    y = y - window.pageYOffset;
                    return {x: x, y: y};
                }
            }

            imagePreviewer();

        });
    </script>
    <script type="text/javascript" src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/packages/aimeos/shop/themes/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/packages/aimeos/shop/themes/aimeos.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/packages/aimeos/shop/themes/elegance/aimeos.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/packages/aimeos/shop/themes/aimeos-detail.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ url('/') }}/packages/aimeos/shop/themes/elegance/aimeos.css">
    <style>
        .select-entry-color {
            display: inline-block;
            cursor: pointer;
        }

        label.select-label {
            cursor: pointer;
        }

        ul.select-list-color {
            padding: 0;
        }

        label.select-label.active {
            border: solid 3px #ea972ef7 !important;
        }

        .catalog-detail-image {
            text-align: center;
        }

        .catalog-detail-image .image-single {
            background-image: url(none) !important;
        }

        .product.row {
            margin-right: 0px;
            margin-left: 0px;
        }

        .product-price h1, .product-price .h1 {
            font-size: 1.1875rem;
        }

        .catalog-detail-basket .price-list {
            display: block;
            color: #555;
        }

        .product_artistname a, #artist-sfront a {
            color: #ff6666;
            text-decoration: none;
            background-color: transparent;
        }

        li {
            font-weight: bold;
        }

        .additional-box {
            background-color: #ffffff;
        }

        ul.catlist {
            display: flex;
            align-items: stretch; /* Default */
            justify-content: space-between;
            width: 100%;
            background: #ffffff;
            margin: 0;
            padding: 0;
        }

        li.catitems {
            display: block;
            flex: 0 1 auto; /* Default */
            list-style-type: none;
        }

        li.catitems:hover,
        li.catitems:active {
            border: 0px;
            background-color: #ffffff;
        }

        #nextSubs, #previousSubs {
            cursor: pointer;
        }

        .thumbnails {
            border: 1px solid rgba(0, 0, 0, 0.6);
            border-radius: 5px 5px 5px 5px;
            padding: 10px;
            margin-top: 10px;
            cursor: pointer;
        }

        #imagePreview {
            width: 300px;
            height: 300px;
            border: 1px solid rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 250px;
            right: -150px;
            z-index: 7;
            background-color: #ffffff;
        }

        .img-zoom-lens {
            position: absolute;
            //border: 1px solid rgba(0, 0, 0, 0.3);
            width: 60px;
            height: 60px;
        }
    </style>
@endsection