<?php $__env->startSection('content'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/mockup/fabric.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/mockup/tshirtEditor.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/mockup/jquery.miniColors.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/mockup/color-picker.min.js')); ?>"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/packages/aimeos/shop/themes/elegance/aimeos.css">
    <link href="https://fonts.googleapis.com/css?family=<?php echo e($googleFontLink); ?>&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('css/color-picker.min.css')); ?>" rel="stylesheet"/>
    <style type="text/css">
        .footer {
            padding: 70px 0;
            margin-top: 70px;
            border-top: 1px solid #E5E5E5;
            background-color: whiteSmoke;
        }

        body {
            /* padding-top: 60px; */
        }

        .color-preview {
            border: 1px solid #CCC;
            margin: 2px;
            zoom: 1;
            vertical-align: top;
            display: inline-block;
            cursor: pointer;
            overflow: hidden;
            width: 20px;
            height: 20px;
        }

        .rotate {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
        }

        <?php $__currentLoopData = $googleFontList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e(".".str_replace(" ", "_", $name)); ?> {
            <?php echo $css; ?>

        }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        .mock-block {
            border: 1px solid #000000;
            text-align: center;
            height: 150px;
            width: 150px;
            min-width: 100px;
            min-height: 100px;
            text-transform: uppercase;
            position: relative;
            cursor: pointer;
        }

        .mock-block-contents {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .mock-block:hover {
            background-color: #f7bf22;
            color: #000000;
        }

        .shirt-block {
            width: max-content;
            width: -moz-max-content;
            margin-left: auto;
            margin-right: auto;
            min-height: 500px;
        }

        body {
            background-color: #ffffff;
        }

        .design-images {
            cursor: pointer;
        }

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

    </style>
    <div class="container w-75"> <!-- mt-0 pt-0 w-75"> -->

        <section id="typography">
            <div class="page-header">
                <h1>Create Your Product</h1>
            </div>

            <div class="row">

                <div class="col-md-2">

                    <div class="mock-block border-primary" id="show-text-editor" data-toggle="text-editor">
                        <div class="mock-block-contents">
                            <h2 class="far fa-edit"></h2>
                            <p>Add Text</p>
                        </div>
                    </div>
                    <div type="button" class="mock-block border-primary" data-toggle="modal" data-target="#designModal">
                        <div class="mock-block-contents">
                            <h2 class="fas fa-palette"></h2>
                            <p>Designs</p>
                        </div>
                    </div>

                    <div class="mock-block border-primary" id="imageUpload" data-target="#fileUpload">
                        <div class="mock-block-contents">
                            <h1 class="fas fa-upload"></h1>
                            <p>Upload Image</p>
                        </div>
                    </div>

                    <div class="mock-block border-primary" id="productSearch">
                        <div class="mock-block-contents">
                            <h2 class="fas fa-tshirt"></h2>
                            <button id="myArtBtn">Art</button>
                            <button id="myPBtn">Products</button>
                        </div>
                    </div>

                </div>

                <div style="display:none;">
                    <input type="file" accept="image/*" id="fileUpload"/>
                </div>

                <div class="col-md-7">

                    <div class="container shirt-block" style="padding:50px 0px 0px 0px">

                        <div id="shirtDiv" class="page"
                             style="position: relative; background-color: rgb(255, 255, 255);">

                            <div id="myArtModal" class="modal">
                                <div class="art-modal-content">
                                    <span class="art-close">&times;</span>
                                    <p>NO ART PAGE!</p>
                                </div>
                            </div>

                            <div id="myModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <p>SWEET GOD IT WORKS!!!~</p>
                                    <iframe width="75%" src="/select/mens/">whoops!</iframe>
                                </div>
                            </div>


                            <img id="shirtFacing" src=""/>
                            <div id="shirtDrawingArea"
                                 style="position: absolute;top: 0px;left: 0px;z-index: 10;">
                                <canvas id="tcanvas" class="hover"
                                        style="-webkit-user-select: none; max-width:400px; max-height: 400px;"></canvas>
                            </div>
                        </div>

                    </div>

                    <div class="catalog-detail-basket">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="catalog-detail-basket-selection" id="product-color-size">

                                    <ul class="selection"
                                        data-proddeps="{&quot;117&quot;:[118,130],&quot;119&quot;:[131,100],&quot;120&quot;:[132,99],&quot;126&quot;:[118,99],&quot;127&quot;:[118,100],&quot;128&quot;:[131,130],&quot;129&quot;:[131,99],&quot;130&quot;:[132,130],&quot;131&quot;:[132,100],&quot;118&quot;:[141,130],&quot;147&quot;:[141,99],&quot;148&quot;:[141,100]}"
                                        data-attrdeps="{&quot;118&quot;:[117,126,127],&quot;130&quot;:[117,128,130,118],&quot;131&quot;:[119,128,129],&quot;100&quot;:[119,127,131,148],&quot;132&quot;:[120,130,131],&quot;99&quot;:[120,126,129,147],&quot;141&quot;:[118,147,148]}">


                                        <li class="select-item radio color">
                                            <div class="select-name">Color</div>


                                            <div class="select-value">

                                                <ul class="select-list-color" id="varient-color" data-index="0"
                                                    data-type="color">

                                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($attr->attribute_label == 'color'): ?>

                                                            <li class="select-entry-color">
                                                                <input class="select-option" type="radio"
                                                                       id="option-<?php echo e($attr->code1); ?>"
                                                                       name="<?php echo e($attr->value); ?>" value="<?php echo e($attr->code1); ?>">
                                                                <label class="select-label" name="<?php echo e($attr->value); ?>"
                                                                       for="<?php echo e($attr->code1); ?>"
                                                                       style="background-color:<?php echo e($attr->code1); ?>; width:30px;height:30px;"></label>

                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>

                                            </div>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                            <div class="col-md-7 d-flex">
                                <button type="button" name="saveMyDesign" id="saveMyDesign"
                                        class="btn btn-secondary my-auto" data-toggle="modal" data-target="#saveModal">
                                    Save My Design
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="card mb-3" id="objectContainer">
                        <div class="card-header">
                            Custom Item Editing
                        </div>
                        <div class="card-body">

                            <button type="button" class="btn btn-primary d-block m-2 mx-auto" id="clearAll">
                                Clean Slate
                            </button>

                            <span class="text-danger">
                            WARNING: Any images processed but not uploaded, may be lost.
                        </span>

                            <ul class="list-group" id="objectHolder">
                            </ul>

                        </div>
                    </div>

                    <div class="card mb-3" id="design-editor">
                        <div class="card-header">
                            Opacity <span class="text-sm-right" id="opacityLabel"></span>
                        </div>
                        <div class="card-body">
                            <input type="range" class="form-control" min="0" max="100" id="imageOpacity" value="100"/>

                        </div>
                    </div>

                    <div class="card edit-function" style="display:none" id="text-editor">

                        <div class="card-header">

                            <textarea class="form-control w-100" id="text-string"
                                      placeholder="Enter your text here.." style="font-family:'Source Code Pro';"></textarea>
                            <input type="button" class="btn mx-auto" id="add-text" value="Add/Edit Text"/>

                        </div>

                        <div class="card-body">
                            <button id="text-bold" class="btn" data-toggle="tooltip" data-placement="top" title="BOLD"
                                    onclick="setBold()">
                                <h4 class="fas fa-bold d-inline pr-2"></h4>
                            </button>

                            <button id="text-italic" class="btn" data-toggle="tooltip" data-placement="top"
                                    title="ITALIC" onclick="setItalic()">
                                <h4 class="fas fa-italic d-inline pr-2"></h4>
                            </button>

                            <button id="text-underline" class="btn" data-toggle="tooltip" data-placement="top"
                                    title="UNDERLINE" onclick="setUnderline()">
                                <h4 class="fas fa-underline d-inline pr-2" id="text-underline"></h4>
                            </button>

                            <button id="text-color" class="btn" data-toggle="tooltip" data-placement="top"
                                    title="COLOR">
                                <h4 class="fas fa-circle d-inline pr-2" style="color: #000;"></h4>
                            </button>
                            <script>
                                var picker = new CP(document.querySelector('button[id="text-color"]'));
                                picker.on("change", function (color) {
                                    setColor(color);
                                });
                            </script>

                            <button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown"
                                    title="Font Style"><i class="icon-font" style="width:19px;height:19px;"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">

                                <?php $__currentLoopData = $googleFontList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a tabindex="-1" href="javascript:void(0)" onclick="setFont('<?php echo e($name); ?>');"
                                           class="<?php echo e(str_replace(" ", "_", $name)); ?>"><?php echo e($name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>

                    </div>

                    <?php if($storefronts != null && $storefronts->isNotEmpty()): ?>
                    <div class="card">
                        <div class="card-header">
                            Add To Store Front
                        </div>
                        <div class="card-body">
                            <?php $__currentLoopData = $storefronts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storefront): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-3 form-check">
                                        <input type="checkbox" name="storefront" value="<?php echo e($storefront->id); ?>" class="form-check-input"/>
                                    </div>
                                    <div class="col-9">
                                        <?php echo e($storefront->name); ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

    <div class="modal" id="saveModal" tabindex="-1" role="document" aria-labelledby="saveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered w-75 mw-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="saveModalLabel">Love the art?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row" id="abcde">
                            <div class="col-md-3">
                                <div class="container shirt-block">

                                    <div id="1456_div" class="page"
                                         style="position: relative; background-color: rgb(255, 255, 255);">
                                        <img id="1456_image" src=""/>
                                        <div id="1456_area"
                                             style="position: absolute;top: 0px;left: 0px;z-index: 10;">
                                            <canvas id="1456_canvas" class="hover"
                                                    style="-webkit-user-select: none; max-width:400px; max-height: 400px;"></canvas>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="container shirt-block">

                                    <div id="112_div" class="page"
                                         style="position: relative; background-color: rgb(255, 255, 255);">
                                        <img id="112_image" src=""/>
                                        <div id="112_area"
                                             style="position: absolute;top: 0px;left: 0px;z-index: 10;">
                                            <canvas id="112_canvas" class="hover"
                                                    style="-webkit-user-select: none; max-width:400px; max-height: 400px;"></canvas>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="container shirt-block">

                                    <div id="1402_div" class="page"
                                         style="position: relative; background-color: rgb(255, 255, 255);">
                                        <img id="1402_image" src=""/>
                                        <div id="1402_area"
                                             style="position: absolute;top: 0px;left: 0px;z-index: 10;">
                                            <canvas id="1402_canvas" class="hover"
                                                    style="-webkit-user-select: none; max-width:400px; max-height: 400px;"></canvas>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="container shirt-block">

                                    <div id="1455_div" class="page"
                                         style="position: relative; background-color: rgb(255, 255, 255);">
                                        <img id="1455_image" src=""/>
                                        <div id="1455_area"
                                             style="position: absolute;top: 0px;left: 0px;z-index: 10;">
                                            <canvas id="1455_canvas" class="hover"
                                                    style="-webkit-user-select: none; max-width:400px; max-height: 400px;"></canvas>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="javascript:void(0);" class="close float-left" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                                    Go Back
                                </a>
                            </div>
                            <div class="col-md-6 text-right" id="continueSpace">
                                <a href="javascript:void(0);" class="close" id="saveAndContinue" onclick="saveDesign('<?php echo e(csrf_token()); ?>')">
                                    Continue
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal" id="designModal" tabindex="-1" role="document" aria-labelledby="designModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered w-75 mw-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="designModalLabel">Choose A Design</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 p-3">
                                <?php $__currentLoopData = $artwork; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img src="<?php echo e($a->full_url); ?>" width="200" class="design-images d-inline p-2"
                                         data-dismiss="modal"/>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        templateVars = {
            pid: '<?php echo e($pid); ?>',
            size: 'XS',
            url: null
        };

        function productImage(product_id, product_size, product_url){
            templateVars.pid = product_id;
            templateVars.size = product_size;
            templateVars.url = product_url;

            setShirtImage(product_url);
        }

        // MAIN IMAGE
        setShirtImage('<?php echo e($images[0]->full_url); ?>');

        <?php $__currentLoopData = $canvasUrls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $urls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            setShirtImage('<?php echo e($urls); ?>', <?php echo e($k); ?>);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        $(document).ready(function () {
            $(".select-entry-color label").first().addClass("active");

            let variants = <?php echo json_encode($variants); ?>;

            $(".select-entry-color label").on('click', function (e) {
                $(".select-entry-color label.active")
                    .removeClass('active');
                $(this).addClass('active');

                let newVariant = variants.filter(function (el) {
                    return el.color_code_1 == $(
                        '.select-entry-color label.active'
                    ).attr('for'); //&& el.size_code == $('#varient-size').val();
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
                    url: "<?php echo e(env('API_URL')); ?>api/media/getById/" +
                        newVariant[0].image.split(",")[
                            0],
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        "Authorization": "Bearer <?php echo e($token); ?>",
                        "Content-Type": "application/json"
                    },
                    type: 'GET',
                    success: function (images) {
                        $("#shirtFacing").attr('src', images.properties.full_url);
                    }
                });
                e.preventDefault();
            });

            $("#imageOpacity").on('input', function () {
                $("#opacityLabel").html($(this).val());
            });

        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>