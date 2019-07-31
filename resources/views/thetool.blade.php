@extends('layouts.toolHead')

@section('content')

    <!-- <div class="container"> -->
        <div class="row products-row" style="float:left;border:3px inset lightblue;height:100%;">
            <div id="art-product-list">
                <div id="app">
                    <thetool prodid="{{$product_id}}"/>
                </div>
            </div>

            <div  style="position:absolute;z-index:-20;padding:0px 150px;">
                <div class="product-image" id="ziggaza">
                    <script>
                    // compress(e) {
    var width = 400;
    var height = 400;
    const fileName = "{{$request->id}}";
    // const reader = new FileReader();
    // reader.readAsDataURL("{{$request->full_url}}");
    // reader.onload = event => {
        const img = new Image();
        img.src = "{{$request->full_url}}";
        img.onload = () => {
            const elem = document.createElement('canvas');
            document.getElementById('ziggaza').appendChild(elem);
            if(img.naturalWidth/width > img.naturalHeight/height){
                height = img.naturalHeight / (img.naturalWidth / width);
            }else{
                width = img.naturalWidth / (img.naturalHeight / height);
            }
            elem.width = width;
            elem.height = height;
            const ctx = elem.getContext('2d');
            // img.naturalWidth and img.naturalHeight will contain the original dimensions
            ctx.drawImage(img, 0, 0, width, height);
            ctx.canvas.toBlob((blob) => {
                const file = new File([blob], fileName, {
                    type: 'image/jpeg',
                    lastModified: Date.now()
                });
            }, 'image/jpeg', 1);
        };
</script>
                        <!-- <img id="productImage" src="{{ $request->full_url }}" style="border:1px solid black;"/> -->
                    </div>
                    <br/>{{$request->id}}
                <div class="product-content">
                    <h5 class="title">{{ $request->label }}</h5>
                    <div class="price">
                        {{ $request->salePrice }}
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->

@endsection