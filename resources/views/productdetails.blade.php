@extends('layouts.dashboard')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>
    <div class="pannel catalog-detail" itemscope="" itemtype="http://schema.org/Product"
        data-jsonurl="{{ url('/') }}/jsonapi">



        <div class="product row " data-id="116">
            <div class="col-sm-7">
                <div class="catalog-detail-image">
                    <div class="image-single" id="add-images" data-pswp="{bgOpacity: 0.75, shareButtons: false}">

                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div>
                    <h1 class="name product_name" itemprop="name"></h1>
                    <p id="artistNameHere"></p>
                    <p><span class="name">Article no.: </span><span class="text-peach OpenSans-Bold product_sku"
                            itemprop="sku"></span></p>
                    <p class="short product_shortdesc" itemprop="description"></p>
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

                                    <span class="quantity" itemscope="" itemtype="http://schema.org/QuantitativeValue">
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

                                    <span class="quantity" itemscope="" itemtype="http://schema.org/QuantitativeValue">
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

                                    <span class="quantity" itemscope="" itemtype="http://schema.org/QuantitativeValue">
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

                                    <span class="quantity" itemscope="" itemtype="http://schema.org/QuantitativeValue">
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

                                    <span class="quantity" itemscope="" itemtype="http://schema.org/QuantitativeValue">
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
                        <!-- catalog.detail.csrf -->
                        <input class="csrf-token" type="hidden" name="_token"
                            value="Uc9QhaZCrcSQKS7PTHj2FQSAncC1q1e7RRfFKsO8"><!-- catalog.detail.csrf -->


                        <div class="catalog-detail-basket-selection" id="product-color-size">
                            <ul class="selection"
                                data-proddeps="{&quot;117&quot;:[118,130],&quot;119&quot;:[131,100],&quot;120&quot;:[132,99],&quot;126&quot;:[118,99],&quot;127&quot;:[118,100],&quot;128&quot;:[131,130],&quot;129&quot;:[131,99],&quot;130&quot;:[132,130],&quot;131&quot;:[132,100],&quot;118&quot;:[141,130],&quot;147&quot;:[141,99],&quot;148&quot;:[141,100]}"
                                data-attrdeps="{&quot;118&quot;:[117,126,127],&quot;130&quot;:[117,128,130,118],&quot;131&quot;:[119,128,129],&quot;100&quot;:[119,127,131,148],&quot;132&quot;:[120,130,131],&quot;99&quot;:[120,126,129,147],&quot;141&quot;:[118,147,148]}">


                                <li class="select-item radio color">
                                    <div class="select-name">Color</div>


                                    <div class="select-value">


                                        <ul class="select-list-color" id="varient-color" data-index="0"
                                            data-type="color">

                                        </ul>

                                    </div>
                                </li>

                                <li class="select-item select size">
                                    <div class="select-name">Size</div>


                                    <div class="select-value">


                                        <select class="form-control select-list" id="varient-size" name="">

                                            <option class="select-option" value="">
                                                Please select</option>

                                        </select>

                                    </div>
                                </li>
                            </ul>
                        </div>

                        <p id="mockgen-url">
                            <a href="/mockupgenerator/{{ $product_id }}" class="Customize text-peach"><span
                                    class="icon-paint-brush"></span> <span class="OpenSans-Semibold"> Customize
                                </span><span class="font-italic">Change Artwork or Add Text</span></a>
                        </p>

                        <div class="product-price">
                            <h1>
                                <div class="price-list">
                                    <div class="articleitem price price-actual" data-prodid="116" data-prodcode="101">

                                        <meta itemprop="price" content="10.00">


                                        <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                            itemtype="http://schema.org/PriceSpecification">

                                            <meta itemprop="valueAddedTaxIncluded" content="true">
                                            <meta itemprop="priceCurrency" content="USD">
                                            <meta itemprop="price" content="10.00">

                                            <span class="quantity" itemscope=""
                                                itemtype="http://schema.org/QuantitativeValue">
                                                <meta itemprop="minValue" content="1">
                                                from 1</span>

                                            <span class="value product_price"></span>



                                            <span class="taxrate">
                                                Incl. 0.00% VAT</span>
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
                                                <meta itemprop="minValue" content="1">
                                                from 1</span>

                                            <span class="value">
                                                $ 27.00</span>



                                            <span class="taxrate">
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
                                <input type="hidden" name="b_prod[0][prodid]" value="116">
                                <input type="number" class="quntity-input" name="b_prod[0][quantity]" min="1"
                                    max="2147483647" maxlength="10" step="1" required="required" value="1">
                                <a class="aminus" href="#" role="button">
                                    <span class="icon-plus"></span>
                                </a>
                            </div>
                            <div class="cart-div">
                                <button class="btn btn-orange" type="submit" value="">
                                    <span class="icon-shopping-cart"></span> Add to cart</button>
                            </div>
                            <div class="share-div">
                                <a href="#"><span class="icon-heart"></span></a>
                                <a href="#"><span class="icon-share-alt"></span></a>
                            </div>
                        </div>

                        <!--<div class="cart-section">
        <div class="input-group row">
        <div class="col">
        <input type="hidden" value="add"
        name="b_action"
        />
        <input type="hidden"
        name="b_prod[0][prodid]"
        value="116"
        />
        <input type="number" class="form-control" name="b_prod[0][quantity]"
        min="1" max="2147483647" maxlength="10" step="1" required="required" value="1"
        />
        </div>
        <div class="col">
        <button class="btn btn-orange" type="submit" value=""  >
        <span class="icon-shopping-cart"></span>Add to cart</button>
        </div>
        </div>
        </div> -->

                    </form>

                </div>


                <div class="catalog-actions">

                    <a class="actions-button actions-button-pin" href="/detail/pin/add/116/116/Puma_Crewneck_Tshirt/1"
                        title="Pin"></a>


                    <a class="actions-button actions-button-watch"
                        href="/myaccount/watch/add/116/116/Puma_Crewneck_Tshirt/1" title="watch"></a>


                    <a class="actions-button actions-button-favorite"
                        href="/myaccount/favorite/add/116/116/Puma_Crewneck_Tshirt/1" title="favorite"></a>

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
            
            <section class="col-sm-12" id="artist-other-products">
                <h3>Get this designs on other products</h3>
                <div class="row products-row" id="otherArtistProducts">                   
                    
                </div>
            </section>
            <section class="col-sm-12" id="products-by-artist">
                <h3>More designs by <span id="moredesignsBy"></span></h3>
                <div class="row products-row" id="sameArtistProducts">                    
                </div>
            </section>

            <div class="col-sm-12">
                <div class="catalog-detail-additional">
                    <div class="additional-box">
                        <h5 class="header description">Description</h5>
                        <div class="content description" style="display: none;">
                            <div class="long item" id="longDescription">
                            </div>
                        </div>
                    </div>
                    <div class="additional-box" id="product-characteristics">
                        <h5 class="header attributes">Characteristics</h5>
                        <div class="content attributes">
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

            <section class="Aboutdesigner col-sm-12" id="artist-details">
                <h3>About the designer</h3>
                <div class="media">
                    <img src="{{ asset('images/designer-image.png') }}" class="mr-3" class="img-fluid" alt="...">
                    <div class="media-body">
                        <h5 id="artistName"></h5>
                        <strong></strong>
                        <h4 class="mt-2 text-peach" id="artist-sfront"></h4>
                        <div id="about-artist"></div>
                    </div>
                </div>
            </section>

            <section class="review-section col-sm-12" id="artist-details-reply">
                <h3>Top Reviews</h3>
                <ul class="list-unstyled">
                    <li class="media">
                        <img src="{{ asset('images/user-review-image.png') }}" class="mr-3">
                        <div class="media-body">

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                            tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                            tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. <a href="#"
                                class="text-peach">More</a>
                            <h5 class="mt-1 mb-0 text-peach font-italic">Christopher, Texas</h5>
                        </div>
                    </li>
                    <li class="media">
                        <img src="{{ asset('images/user-review-image.png') }}" class="mr-3" alt="...">
                        <div class="media-body">

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                            tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                            tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu.
                            <h5 class="mt-1 mb-0 text-peach font-italic">Christopher, Texas</h5>
                        </div>
                    </li>
                    <li class="media">
                        <img src="{{ asset('images/user-review-image.png') }}" class="mr-3" alt="...">
                        <div class="media-body">

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                            tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit. Maecenas dignissim ultrices arcu a
                            tincidunt. Morbi feugiat aliquam urna, et dapibus velit egestas eu. <a href="#"
                                class="text-peach">More</a>
                            <h5 class="mt-1 mb-0 text-peach font-italic">Christopher, Texas</h5>
                        </div>
                    </li>
                </ul>
            </section>            
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
                    url: "{{env('API_URL')}}api/product/getProductSpecifics?productId={{ $product_id }}",
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        "Authorization": "Bearer " + result.token,
                        "Content-Type": "application/json"
                    },
                    type: 'GET',
                    success: function(artProduct) {
                        let pid;
                        if(artProduct.properties.artworkProduct) {
                            pid = artProduct.properties.artworkProduct.productId;
                            $('.product_name').text(artProduct.properties.product.label);
                            $('.product_sku').text(artProduct.properties.product.sku);
                            $('.product_shortdesc').text('');
                            $('.product_shortdesc').append(artProduct.properties.product
                                .shortDescription);
                            $('#longDescription').text('');
                            $("#longDescription").append(artProduct.properties.product
                                .shortDescription);
                            $('.product_price').text("$" + artProduct.properties.product
                                .salePrice);
                            $("#product-characteristics").hide();
                            if(!artProduct.properties.product.isPrintEnable){
                                $("#mockgen-url").hide();
                            } else if(artProduct.properties.product.productType == 2) {
                                $("#mockgen-url").hide();
                            }
                            $("#product-color-size").hide();
                            $.ajax({
                                url: "{{env('API_URL')}}api/media/getById/" +
                                artProduct.properties.artworkProduct.designedImage.split(",")[
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
                                    $('#add-images').html(`
                                    <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
                                        <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
                                        <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
                                    </figure>
                                    `);
                                    console.log(images);
                                    console.log(images
                                        .properties.full_url
                                        );
                                }
                            });
                            $.ajax({
                                url: "{{env('API_URL')}}api/users/getUserDetailsById/"+artProduct.properties.artworkProduct.createdById,
                                contentType: 'application/json',
                                dataType: 'json',
                                headers: {
                                    "Authorization": "Bearer " +
                                        result.token,
                                    "Content-Type": "application/json"
                                },
                                type: 'GET',
                                success: function(userData) {
                                    $("#artistName").html(userData.properties.firstName+" "+userData.properties.lastName);
                                    $("#about-artist").html(userData.properties.aboutYou);
                                    $("#artist-sfront").html(`<a href="{{ url('/') }}/artiststorefront/${artProduct.properties.artworkProduct.createdById}">Go to designer’s store</a>`);
                                    $("#artistNameHere").html(`<span class="name">Designed By: </span><span class="text-peach OpenSans-Bold product_artistname" itemprop="artistname"><a href="{{ url('/') }}/artiststorefront/${artProduct.properties.artworkProduct.createdById}">${userData.properties.firstName} ${userData.properties.lastName}</a></spam>`)
                                    $("#moredesignsBy").html(userData.properties.firstName+" "+userData.properties.lastName);
                                    console.log("---2--", userData);
                                }

                            });
                            $.ajax({
                                url: "{{env('API_URL')}}api/artworkProduct/getAllArtProducts?pageNumber=1&limit=4",
                                contentType: 'application/json',
                                dataType: 'json',
                                headers: {
                                    "Authorization": "Bearer " +
                                        result.token,
                                    "Content-Type": "application/json"
                                },
                                type: 'GET',
                                success: function(otherProducts) {
                                    console.log("---other--", otherProducts);
                                    for(let i=0; i<otherProducts.properties.length;i++) {
                                        $.ajax({
                                            url: "{{env('API_URL')}}api/media/getById/" +
                                            otherProducts.properties[i].artworkProduct.designedImage.split(",")[
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
                                                $('#otherArtistProducts').append(`
                                                <div class="col-3 item">
                                                    <div class="product-grid">
                                                        <div class="product-image">
                                                            <a href="{{url('/')}}/product-details/${otherProducts.properties[i].product.id}"><img src="${images.properties.full_url}"></a>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3 class="title"><a style="color:#362865" href="{{url('/')}}/product-details/${otherProducts.properties[i].product.id}">${otherProducts.properties[i].product.label}</a></h3>
                                                            <div class="price">
                                                                $${otherProducts.properties[i].product.salePrice}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                `);
                                            }
                                        });
                                    }
                                }
                            });

                            $.ajax({
                                url: "{{env('API_URL')}}api/artworkProduct/getAllArtProductsByArtist?artistId="+artProduct.properties.artworkProduct.createdById+"&pageNumber=1&limit=4",
                                contentType: 'application/json',
                                dataType: 'json',
                                headers: {
                                    "Authorization": "Bearer " +
                                        result.token,
                                    "Content-Type": "application/json"
                                },
                                type: 'GET',
                                success: function(sameArtistProducts) {
                                    console.log("---other--", sameArtistProducts);
                                    for(let i=0; i<sameArtistProducts.properties.length;i++) {
                                        
                                        $('#sameArtistProducts').append(`
                                            <div class="col-3 item">
                                                <div class="product-grid">
                                                    <div class="product-image">
                                                        <a href="{{url('/')}}/product-details/${sameArtistProducts.properties[i].product.id}"><img src="${sameArtistProducts.properties[i].artworkProduct.designedImage}"></a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3 class="title"><a style="color:#362865" href="{{url('/')}}/product-details/${sameArtistProducts.properties[i].product.id}">${sameArtistProducts.properties[i].product.label}</a></h3>
                                                        <div class="price">
                                                            $${sameArtistProducts.properties[i].product.salePrice}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        `);
                                    }
                                }

                            });
                        } else {
                            $("#artist-details").hide();
                            $("#artist-details-reply").hide();
                            $("#products-by-artist").hide()
                            $("#artist-other-products").hide()
                            pid = {{$product_id}};
                            console.log("art-",artProduct)
                            $.ajax({
                                url: "{{env('API_URL')}}api/product/getProductSpecifics?productId="+pid,
                                contentType: 'application/json',
                                dataType: 'json',
                                headers: {
                                    "Authorization": "Bearer " + result.token,
                                    "Content-Type": "application/json"
                                },
                                type: 'GET',
                                success: function(products) {
                                    if(products.operationCode == 200) {
                                        if(!products.properties.productVariants.length) {
                                            $('.product_name').text(products.properties.product.label);
                                            $('.product_sku').text(products.properties.product.sku);
                                            $('.product_shortdesc').text('');
                                            $('.product_shortdesc').append(products.properties.product
                                                .shortDescription);
                                            $('#longDescription').text('');
                                            $("#longDescription").append(products.properties.product
                                                .shortDescription);
                                            $('.product_price').text("$" + products.properties.product
                                                .salePrice);
                                            $("#product-characteristics").hide();
                                            if(!products.properties.product.isPrintEnable){
                                                $("#mockgen-url").hide();
                                            } else if(products.properties.product.productType == 2 == 2) {
                                                $("#mockgen-url").hide();
                                            }                                           
                                            $("#product-color-size").hide();
                                            $.ajax({
                                                url: "{{env('API_URL')}}api/media/getById/" +
                                                products.properties.product.image.split(",")[
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
                                                    $('#add-images').html(`
                                                    <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
                                                        <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
                                                        <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
                                                    </figure>
                                                    `);
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
                                            if(!products.properties.product.isPrintEnable){
                                                $("#mockgen-url").hide();
                                            } else if(products.properties.product.productType == 2 == 2) {
                                                $("#mockgen-url").hide();
                                            }
                                            for (let i = 0; i < products.properties.attributeDetails
                                                .length; i++) {
                                                if (products.properties.attributeDetails[i].attributeId
                                                    .label === 'color') {
                                                    $("#varient-color").append(`
                                                            <li class="select-entry-color">
                                                                <input class="select-option" type="radio" id="option-${products.properties.attributeDetails[i].code1}" name="${products.properties.attributeDetails[i].value}" value="${products.properties.attributeDetails[i].code1}">
                                                                <label class="select-label" name="${products.properties.attributeDetails[i].value}" for="${products.properties.attributeDetails[i].code1}" style="background-color:${products.properties.attributeDetails[i].code1}"></label>
                                                            </li>
                                                        `);
                                                }
                                                if (products.properties.attributeDetails[i].attributeId
                                                    .label === 'size') {
                                                    $("#varient-size").append(`
                                                            <option class="select-option" value="${products.properties.attributeDetails[i].code1}">${products.properties.attributeDetails[i].value}</option>
                                                            </li>
                                                        `);
                                                }
                                            }
                                            $(".select-entry-color label").first().addClass("active");

                                            $(".select-entry-color label").on('click', function(e) {
                                                $(".select-entry-color label.active")
                                                    .removeClass('active');
                                                $(this).addClass('active');
                                                let newVariant = products.properties
                                                    .productVariants.filter(function(el) {
                                                        return el.colorCode1 == $(
                                                                '.select-entry-color label.active'
                                                                ).attr('for') &&
                                                            el.sizeCode == $(
                                                                '#varient-size').val();
                                                    });
                                                $('.product_sku').text(newVariant[0].sku);
                                                $('.product_shortdesc').text('');
                                                $('.product_shortdesc').append(newVariant[0]
                                                    .shortDescription);
                                                $('#longDescription').text('');
                                                $("#longDescription").append(artProduct.properties.product
                                                    .shortDescription);
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
                                                            result.token,
                                                        "Content-Type": "application/json"
                                                    },
                                                    type: 'GET',
                                                    success: function(images) {
                                                        $('#add-images').html(`
                                                        <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
                                                            <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
                                                            <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
                                                        </figure>
                                                        `);
                                                        console.log(images);
                                                        console.log(images
                                                            .properties.full_url
                                                            );
                                                    }
                                                });
                                                e.preventDefault();
                                            });

                                            $("#varient-size").change(function() {
                                                let newVariant = products.properties
                                                    .productVariants.filter(function(el) {
                                                        return el.colorCode1 == $(
                                                                '.select-entry-color label.active'
                                                                ).attr('for') &&
                                                            el.sizeCode == $(
                                                                '#varient-size').val();
                                                    });
                                                $('.product_sku').text(newVariant[0].sku);
                                                $('.product_shortdesc').text('');
                                                $('.product_shortdesc').append(newVariant[0]
                                                    .shortDescription);
                                                $('#longDescription').text('');
                                                $("#longDescription").append(artProduct.properties.product
                                                    .shortDescription);
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
                                                            result.token,
                                                        "Content-Type": "application/json"
                                                    },
                                                    type: 'GET',
                                                    success: function(images) {
                                                        $('#add-images').html(`
                                                        <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
                                                            <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
                                                            <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
                                                        </figure>
                                                        `);
                                                        console.log(images);
                                                        console.log(images
                                                            .properties.full_url
                                                            );
                                                    }
                                                });
                                            });

                                            $("#varient-size").prop("selectedIndex", 1);
                                            var newVariantGlobal = products.properties.productVariants
                                                .filter(function(el) {
                                                    return el.colorCode1 == $(
                                                            '.select-entry-color label.active')
                                                        .attr('for') &&
                                                        el.sizeCode == $('#varient-size').val();
                                                });
                                            $('.product_sku').text(newVariantGlobal[0].sku);
                                            $('.product_shortdesc').text('');
                                            $('.product_shortdesc').append(newVariantGlobal[0]
                                                .shortDescription);
                                            $('#longDescription').text('');
                                            $("#longDescription").append(artProduct.properties.product
                                                .shortDescription);
                                            $('.product_price').text("$" + newVariantGlobal[0]
                                                .salePrice);
                                            console.log($('.select-entry-color label.active').attr(
                                                'name'), '----');
                                            $('#selected-color').text($(
                                                    '.select-entry-color label.active').attr(
                                                'name'));
                                            $('#selected-size').text($('#varient-size option:selected')
                                                .text());
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
                                                    $('#add-images').html(`
                                                    <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
                                                        <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
                                                        <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
                                                    </figure>
                                                    `);
                                                    console.log(images);
                                                    console.log(images.properties.full_url);
                                                }
                                            });
                                        }
                                    }
                            }
                        });                        
                }
            }
        });
        }
        }
    });
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
</style>
@endsection