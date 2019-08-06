<?php $__env->startSection('content'); ?>

    <!-- <div class="container"> -->
        <div class="row products-row" style="float:left;border:3px inset lightblue;height:100%;">
            <div id="art-product-list">
                <div id="app">
                    <thetool prodid="<?php echo e($product_id); ?>"/>
                </div>
            </div>

            <div  style="position:absolute;z-index:-20;padding:0px 150px;">
                <div class="product-image" id="ziggaza">
                    <script>
                    // compress(e) {
    var width = 400;
    var height = 400;
    const fileName = "<?php echo e($request->id); ?>";

        const img = new Image();
        img.src = "<?php echo e($request->full_url); ?>";
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
            try{
                ctx.canvas.toBlob((blob) => {
                    const file = new File([blob], fileName, {
                        type: 'image/jpeg',
                        lastModified: Date.now()
                    });
                }, 'image/jpeg', 1);
            }catch(e){
                console.log("CANVAS TO BLOB BROKE! IMG TOO SMALL?? Tainted canvas.");
                console.log(e);
            }
        };
</script>
                        <!-- <img id="productImage" src="<?php echo e($request->full_url); ?>" style="border:1px solid black;"/> -->
                    </div>
                    <br/><?php echo e($request->id); ?>

                <div class="product-content">
                    <h5 class="title"><?php echo e($request->label); ?></h5>
                    <div class="price">
                        <?php echo e($request->salePrice); ?>

                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.toolHead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>