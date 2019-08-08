$(document).ready(function () {

    /**
     * ORIGINAL JAVASCRIPT
     */
    // $.ajax({
    //     url: "{{env('API_URL')}}token",
    //     contentType: 'application/json',
    //     dataType: 'json',
    //     type: 'POST',
    //     data: JSON.stringify({
    //         "privateKey": "password"
    //     }),
    //     success: (result) => {
    //         if (result.token) {
    //
    //             /**
    //              * AJAX CALL TO GET PRODUCT BY ID
    //              */
    //             $.ajax({
    //                 url: "{{env('API_URL')}}api/product/getProductSpecifics?productId={{ $product_id }}",
    //                 contentType: 'application/json',
    //                 dataType: 'json',
    //                 headers: {
    //                     "Authorization": "Bearer " + result.token,
    //                     "Content-Type": "application/json"
    //                 },
    //                 type: 'GET',
    //                 success: function (artProduct) {
    //                     let pid;
    //                     if (artProduct.properties.artworkProduct) {
    //                         pid = artProduct.properties.artworkProduct.productId;
    //                         $('.product_name').text(artProduct.properties.product.label);
    //                         $('.product_sku').text(artProduct.properties.product.sku);
    //                         $('.product_shortdesc').text('');
    //                         $('.product_shortdesc').append(artProduct.properties.product
    //                             .shortDescription);
    //                         $('#longDescription').text('');
    //                         $("#longDescription").append(artProduct.properties.product
    //                             .shortDescription);
    //                         $('.product_price').text("$" + artProduct.properties.product
    //                             .salePrice);
    //                         $("#product-characteristics").hide();
    //                         if (!artProduct.properties.product.isPrintEnable) {
    //                             $("#mockgen-url").hide();
    //                         } else if (artProduct.properties.product.productType == 2) {
    //                             $("#mockgen-url").hide();
    //                         }
    //                         $("#product-color-size").hide();
    //                         $('#current_product').text(artProduct.properties.product.label);
    //
    //                         /**
    //                          * AJAX CALL TO GET IMAGE(S) BY ID
    //                          */
    //                         var imageI = 0;
    //                         var productImages = [];
    //                         var designedImages = artProduct.properties.artworkProduct.designedImage.split(",");
    //
    //                         for(imageI = 0; imageI < designedImages.length; imageI++) {
    //                             $.ajax({
    //                                 url: "{{env('API_URL')}}api/media/getById/" +
    //                                     designedImages[imageI],
    //                                 contentType: 'application/json',
    //                                 dataType: 'json',
    //                                 headers: {
    //                                     "Authorization": "Bearer " +
    //                                         result.token,
    //                                     "Content-Type": "application/json"
    //                                 },
    //                                 type: 'GET',
    //                                 success: function (images) {
    //                                     productImages.push(images.properties.full_url);
    //
    //                                     if(imageI < 1) {
    //                                         $('#add-images').html(`
    //                                                         <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
    //                                                             <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
    //                                                             <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
    //                                                         </figure>
    //                                                     `);
    //
    //                                     }
    //                                 }
    //                             });
    //                         }
    //
    //                         console.log("IMAGES: " + JSON.stringify(productImages));
    //
    //                         /**
    //                          * AJAX CALL TO GET THE ARTIST DETAILS BY ARTIST ID
    //                          */
    //                         $.ajax({
    //                             url: "{{env('API_URL')}}api/users/getUserDetailsById/" + artProduct.properties.artworkProduct.createdById,
    //                             contentType: 'application/json',
    //                             dataType: 'json',
    //                             headers: {
    //                                 "Authorization": "Bearer " +
    //                                     result.token,
    //                                 "Content-Type": "application/json"
    //                             },
    //                             type: 'GET',
    //                             success: function (userData) {
    //                                 $("#artistName").html(userData.properties.firstName + " " + userData.properties.lastName);
    //                                 $("#about-artist").html(userData.properties.aboutYou);
    //                                 $("#artist-sfront").html(`<a href="{{ url('/') }}/artiststorefront/${artProduct.properties.artworkProduct.createdById}">Go to designer’s store</a>`);
    //                                 $("#artistNameHere").html(`<span class="name">Designed By: </span><span class="text-peach OpenSans-Bold product_artistname" itemprop="artistname"><a href="{{ url('/') }}/artiststorefront/${artProduct.properties.artworkProduct.createdById}">${userData.properties.firstName} ${userData.properties.lastName}</a></spam>`)
    //                                 $("#moredesignsBy").html(userData.properties.firstName + " " + userData.properties.lastName);
    //                                 console.log("---2--", userData);
    //                             }
    //
    //                         });
    //
    //                         /**
    //                          * AJAX CALL TO GET ART PRODUCTS
    //                          */
    //                         $.ajax({
    //                             url: "{{env('API_URL')}}api/artworkProduct/getAllArtProducts?pageNumber=1&limit=4",
    //                             contentType: 'application/json',
    //                             dataType: 'json',
    //                             headers: {
    //                                 "Authorization": "Bearer " +
    //                                     result.token,
    //                                 "Content-Type": "application/json"
    //                             },
    //                             type: 'GET',
    //                             success: function (otherProducts) {
    //                                 console.log("---other--", otherProducts);
    //                                 for (let i = 0; i < otherProducts.properties.length; i++) {
    //
    //                                     /**
    //                                      * AJAX CALL TO GET ART PRODUCT IMAGES BY ID
    //                                      */
    //                                     $.ajax({
    //                                         url: "{{env('API_URL')}}api/media/getById/" +
    //                                             otherProducts.properties[i].artworkProduct.designedImage.split(",")[
    //                                                 0],
    //                                         contentType: 'application/json',
    //                                         dataType: 'json',
    //                                         headers: {
    //                                             "Authorization": "Bearer " +
    //                                                 result.token,
    //                                             "Content-Type": "application/json"
    //                                         },
    //                                         type: 'GET',
    //                                         success: function (images) {
    //                                             $('#otherArtistProducts').append(`
    //                                                 <div class="col-3 item">
    //                                                     <div class="product-grid">
    //                                                         <div class="product-image">
    //                                                             <a href="{{url('/')}}/product-details/${otherProducts.properties[i].product.id}"><img src="${images.properties.full_url}"></a>
    //                                                         </div>
    //                                                         <div class="product-content">
    //                                                             <h3 class="title"><a style="color:#362865" href="{{url('/')}}/product-details/${otherProducts.properties[i].product.id}">${otherProducts.properties[i].product.label}</a></h3>
    //                                                             <div class="price">
    //                                                                 $${otherProducts.properties[i].product.salePrice}
    //                                                             </div>
    //
    //                                                         </div>
    //                                                     </div>
    //                                                 </div>
    //                                                 `);
    //                                         }
    //                                     });
    //                                 }
    //                             }
    //                         });
    //
    //                         /**
    //                          * AJAX CALL TO GET ART PRODUCTS BY ARTIST ID
    //                          */
    //                         $.ajax({
    //                             url: "{{env('API_URL')}}api/artworkProduct/getAllArtProductsByArtist?artistId=" + artProduct.properties.artworkProduct.createdById + "&pageNumber=1&limit=4",
    //                             contentType: 'application/json',
    //                             dataType: 'json',
    //                             headers: {
    //                                 "Authorization": "Bearer " +
    //                                     result.token,
    //                                 "Content-Type": "application/json"
    //                             },
    //                             type: 'GET',
    //                             success: function (sameArtistProducts) {
    //                                 console.log("---other--", sameArtistProducts);
    //                                 for (let i = 0; i < sameArtistProducts.properties.length; i++) {
    //
    //                                     $('#sameArtistProducts').append(`
    //                                             <div class="col-3 item">
    //                                                 <div class="product-grid">
    //                                                     <div class="product-image">
    //                                                         <a href="{{url('/')}}/product-details/${sameArtistProducts.properties[i].product.id}"><img src="${sameArtistProducts.properties[i].artworkProduct.designedImage}"></a>
    //                                                     </div>
    //                                                     <div class="product-content">
    //                                                         <h3 class="title"><a style="color:#362865" href="{{url('/')}}/product-details/${sameArtistProducts.properties[i].product.id}">${sameArtistProducts.properties[i].product.label}</a></h3>
    //                                                         <div class="price">
    //                                                             $${sameArtistProducts.properties[i].product.salePrice}
    //                                                         </div>
    //
    //                                                     </div>
    //                                                 </div>
    //                                             </div>
    //                                         `);
    //                                 }
    //                             }
    //
    //                         });
    //                     } else {
    //                         $("#artist-details").show();
    //                         $("#artist-details-reply").show();
    //                         $("#products-by-artist").show();
    //                         $("#artist-other-products").show();
    //                         pid = {{$product_id}};
    //                         console.log("art-", artProduct);
    //
    //                         /**
    //                          * AJAX CALL TO GET PRODUCT INFORMATION BY PRODUCT ID
    //                          */
    //                         $.ajax({
    //                             url: "{{env('API_URL')}}api/product/getProductSpecifics?productId=" + pid,
    //                             contentType: 'application/json',
    //                             dataType: 'json',
    //                             headers: {
    //                                 "Authorization": "Bearer " + result.token,
    //                                 "Content-Type": "application/json"
    //                             },
    //                             type: 'GET',
    //                             success: function (products) {
    //                                 if (products.operationCode == 200) {
    //                                     if (!products.properties.productVariants.length) {
    //                                         $('.product_name').text(products.properties.product.label);
    //                                         $('.product_sku').text(products.properties.product.sku);
    //                                         $('.product_shortdesc').text('');
    //                                         $('.product_shortdesc').append(products.properties.product
    //                                             .shortDescription);
    //                                         $('#longDescription').text('');
    //                                         $("#longDescription").append(products.properties.product
    //                                             .shortDescription);
    //                                         $('.product_price').text("$" + products.properties.product
    //                                             .salePrice);
    //                                         $("#product-characteristics").hide();
    //                                         if (!products.properties.product.isPrintEnable) {
    //                                             $("#mockgen-url").hide();
    //                                         } else if (products.properties.product.productType == 2 == 2) {
    //                                             $("#mockgen-url").hide();
    //                                         }
    //                                         $("#product-color-size").hide();
    //
    //                                         /**
    //                                          * AJAX CALL TO GET IMAGE(s) BY ID
    //                                          */
    //
    //                                         var productImageUrls = [];
    //                                         var productImages = products.properties.product.image.split(",");
    //
    //                                         for(var imageI = 0; imageI < productImages.length; imageI++) {
    //                                             $.ajax({
    //                                                 url: "{{env('API_URL')}}api/media/getById/" +
    //                                                     productImages[i],
    //                                                 contentType: 'application/json',
    //                                                 dataType: 'json',
    //                                                 headers: {
    //                                                     "Authorization": "Bearer " +
    //                                                         result.token,
    //                                                     "Content-Type": "application/json"
    //                                                 },
    //                                                 type: 'GET',
    //                                                 success: function (images) {
    //                                                     productImageUrls.push(images.properties.full_url);
    //
    //                                                     if(imageI < 1) {
    //                                                         $('#add-images').html(`
    //                                                                         <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
    //                                                                             <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
    //                                                                             <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
    //                                                                         </figure>
    //                                                                     `);
    //                                                     }
    //                                                 }
    //                                             });
    //                                         }
    //
    //                                         console.log("Product Images: " + JSON.stringify(productImageUrls));
    //
    //                                     } else {
    //                                         console.log(products);
    //                                         console.log(products.properties.attributeDetails.length);
    //                                         $('.product_name').text(products.properties.product.label);
    //                                         if (!products.properties.product.isPrintEnable) {
    //                                             $("#mockgen-url").hide();
    //                                         } else if (products.properties.product.productType == 2 == 2) {
    //                                             $("#mockgen-url").hide();
    //                                         }
    //                                         for (let i = 0; i < products.properties.attributeDetails
    //                                             .length; i++) {
    //                                             if (products.properties.attributeDetails[i].attributeId
    //                                                 .label === 'color') {
    //                                                 $("#varient-color").append(`
    //                                                             <li class="select-entry-color">
    //                                                                 <input class="select-option" type="radio" id="option-${products.properties.attributeDetails[i].code1}" name="${products.properties.attributeDetails[i].value}" value="${products.properties.attributeDetails[i].code1}">
    //                                                                 <label class="select-label" name="${products.properties.attributeDetails[i].value}" for="${products.properties.attributeDetails[i].code1}" style="background-color:${products.properties.attributeDetails[i].code1}; width:30px;height:30px;"></label>
    //                                                             </li>
    //                                                         `);
    //                                             }
    //                                             if (products.properties.attributeDetails[i].attributeId
    //                                                 .label === 'size') {
    //                                                 $("#varient-size").append(`
    //                                                             <option class="select-option" value="${products.properties.attributeDetails[i].code1}">${products.properties.attributeDetails[i].value}</option>
    //                                                             </li>
    //                                                         `);
    //                                             }
    //                                         }
    //                                         $(".select-entry-color label").first().addClass("active");
    //
    //                                         $(".select-entry-color label").on('click', function (e) {
    //                                             $(".select-entry-color label.active")
    //                                                 .removeClass('active');
    //                                             $(this).addClass('active');
    //                                             let newVariant = products.properties
    //                                                 .productVariants.filter(function (el) {
    //                                                     return el.colorCode1 == $(
    //                                                         '.select-entry-color label.active'
    //                                                         ).attr('for') &&
    //                                                         el.sizeCode == $(
    //                                                             '#varient-size').val();
    //                                                 });
    //                                             $('.product_sku').text(newVariant[0].sku);
    //                                             $('.product_shortdesc').text('');
    //                                             $('.product_shortdesc').append(newVariant[0]
    //                                                 .shortDescription);
    //                                             $('#longDescription').text('');
    //                                             $("#longDescription").append(artProduct.properties.product
    //                                                 .shortDescription);
    //                                             $('.product_price').text("$" + newVariant[0]
    //                                                 .salePrice);
    //                                             $('#selected-color').text($(
    //                                                 '.select-entry-color label.active')
    //                                                 .attr('name'));
    //                                             $('#selected-size').text($(
    //                                                 '#varient-size option:selected')
    //                                                 .text());
    //
    //
    //
    //
    //                                             $.ajax({
    //                                                 url: "{{env('API_URL')}}api/media/getById/" +
    //                                                     newVariant[0].image.split(",")[
    //                                                         0],
    //                                                 contentType: 'application/json',
    //                                                 dataType: 'json',
    //                                                 headers: {
    //                                                     "Authorization": "Bearer " +
    //                                                         result.token,
    //                                                     "Content-Type": "application/json"
    //                                                 },
    //                                                 type: 'GET',
    //                                                 success: function (images) {
    //                                                     $('#add-images').html(`
    //                                                         <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
    //                                                             <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
    //                                                             <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
    //                                                         </figure>
    //                                                         `);
    //                                                     console.log(images);
    //                                                     console.log(images
    //                                                         .properties.full_url
    //                                                     );
    //                                                 }
    //                                             });
    //                                             e.preventDefault();
    //                                         });
    //
    //                                         $("#varient-size").change(function () {
    //                                             let newVariant = products.properties
    //                                                 .productVariants.filter(function (el) {
    //                                                     return el.colorCode1 == $(
    //                                                         '.select-entry-color label.active'
    //                                                         ).attr('for') &&
    //                                                         el.sizeCode == $(
    //                                                             '#varient-size').val();
    //                                                 });
    //                                             $('.product_sku').text(newVariant[0].sku);
    //                                             $('.product_shortdesc').text('');
    //                                             $('.product_shortdesc').append(newVariant[0]
    //                                                 .shortDescription);
    //                                             $('#longDescription').text('');
    //                                             $("#longDescription").append(artProduct.properties.product
    //                                                 .shortDescription);
    //                                             $('.product_price').text("$" + newVariant[0]
    //                                                 .salePrice);
    //                                             $('#selected-color').text($(
    //                                                 '.select-entry-color label.active')
    //                                                 .attr('name'));
    //                                             $('#selected-size').text($(
    //                                                 '#varient-size option:selected')
    //                                                 .text());
    //                                             $.ajax({
    //                                                 url: "{{env('API_URL')}}api/media/getById/" +
    //                                                     newVariant[0].image.split(",")[
    //                                                         0],
    //                                                 contentType: 'application/json',
    //                                                 dataType: 'json',
    //                                                 headers: {
    //                                                     "Authorization": "Bearer " +
    //                                                         result.token,
    //                                                     "Content-Type": "application/json"
    //                                                 },
    //                                                 type: 'GET',
    //                                                 success: function (images) {
    //                                                     $('#add-images').html(`
    //                                                         <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
    //                                                             <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
    //                                                             <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
    //                                                         </figure>
    //                                                         `);
    //                                                     console.log(images);
    //                                                     console.log(images
    //                                                         .properties.full_url
    //                                                     );
    //                                                 }
    //                                             });
    //                                         });
    //
    //                                         $("#varient-size").prop("selectedIndex", 1);
    //                                         var newVariantGlobal = products.properties.productVariants
    //                                             .filter(function (el) {
    //                                                 return el.colorCode1 == $(
    //                                                     '.select-entry-color label.active')
    //                                                         .attr('for') &&
    //                                                     el.sizeCode == $('#varient-size').val();
    //                                             });
    //                                         $('.product_sku').text(newVariantGlobal[0].sku);
    //                                         $('.product_shortdesc').text('');
    //                                         $('.product_shortdesc').append(newVariantGlobal[0]
    //                                             .shortDescription);
    //                                         $('#longDescription').text('');
    //                                         $("#longDescription").append(artProduct.properties.product
    //                                             .shortDescription);
    //                                         $('.product_price').text("$" + newVariantGlobal[0]
    //                                             .salePrice);
    //                                         console.log($('.select-entry-color label.active').attr(
    //                                             'name'), '----');
    //                                         $('#selected-color').text($(
    //                                             '.select-entry-color label.active').attr(
    //                                             'name'));
    //                                         $('#selected-size').text($('#varient-size option:selected')
    //                                             .text());
    //                                         $.ajax({
    //                                             url: "{{env('API_URL')}}api/media/getById/" +
    //                                                 newVariantGlobal[0].image.split(",")[0],
    //                                             contentType: 'application/json',
    //                                             dataType: 'json',
    //                                             headers: {
    //                                                 "Authorization": "Bearer " + result.token,
    //                                                 "Content-Type": "application/json"
    //                                             },
    //                                             type: 'GET',
    //                                             success: function (images) {
    //                                                 $('#add-images').html(`
    //                                                     <figure id="image-0" class="item" style="background-image: url(&quot;${images.properties.full_url}&quot;); background-size: contain;" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" data-image="${images.properties.full_url}">
    //                                                         <a href="${images.properties.full_url}" itemprop="contentUrl"></a>
    //                                                         <figcaption itemprop="caption description">${images.properties.full_url}</figcaption>
    //                                                     </figure>
    //                                                     `);
    //                                                 console.log(images);
    //                                                 console.log(images.properties.full_url);
    //                                             }
    //                                         });
    //                                     }
    //                                 }
    //                             }
    //                         });
    //                     }
    //                 }
    //             });
    //         }
    //     }
    // });


});