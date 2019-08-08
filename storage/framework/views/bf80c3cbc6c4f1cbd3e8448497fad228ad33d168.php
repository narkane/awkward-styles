<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/mockup/fabric.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/mockup/tshirtEditor.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/mockup/jquery.miniColors.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/mockup/color-picker.min.js')); ?>"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/packages/aimeos/shop/themes/elegance/aimeos.css">
    <link href="<?php echo e(asset('css/color-picker.min.css')); ?>" rel="stylesheet"/>
    <style type="text/css">
        .footer {
            padding: 70px 0;
            margin-top: 70px;
            border-top: 1px solid #E5E5E5;
            background-color: whiteSmoke;
        }

        body {
            padding-top: 60px;
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

        .Arial {
            font-family: "Arial";
        }

        .Helvetica {
            font-family: "Helvetica";
        }

        .MyriadPro {
            font-family: "Myriad Pro";
        }

        .Delicious {
            font-family: "Delicious";
        }

        .Verdana {
            font-family: "Verdana";
        }

        .Georgia {
            font-family: "Georgia";
        }

        .Courier {
            font-family: "Courier";
        }

        .ComicSansMS {
            font-family: "Comic Sans MS";
        }

        .Impact {
            font-family: "Impact";
        }

        .Monaco {
            font-family: "Monaco";
        }

        .Optima {
            font-family: "Optima";
        }

        .HoeflerText {
            font-family: "Hoefler Text";
        }

        .Plaster {
            font-family: "Plaster";
        }

        .Engagement {
            font-family: "Engagement";
        }

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
            -ms-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }

        .mock-block:hover {
            background-color: #f7bf22;
            color: #000000;
        }

        .shirt-block {
            width: max-content;
            width: -moz-max-content;
            margin-left: auto;
            margin-right:auto;
            min-height:500px;
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
</head>
<body>

<div class="container shirt-block">

    <div id="<?php echo e($pid); ?>_div" class="page"
         style="position: relative; background-color: rgb(255, 255, 255);">
        <img id="<?php echo e($pid); ?>_image" src=""/>
        <div id="<?php echo e($pid); ?>_area"
             style="position: absolute;top: 0px;left: 0px;z-index: 10;">
            <canvas id="<?php echo e($pid); ?>_canvas" class="hover"
                    style="-webkit-user-select: none; max-width:400px; max-height: 400px;"></canvas>
        </div>
    </div>

</div>

<script>
    templateVars = {
        pid: '<?php echo e($pid); ?>',
        size: 'XS',
        url: null
    };

    // MAIN IMAGE
    setTimeout(
    setShirtImage('<?php echo e($images[0]->full_url); ?>'),
    5000);

    var myCanvas;

    function setShirtImage(imgurl){

        //setup front side canvas
        myCanvas = new fabric.Canvas('<?php echo e($pid); ?>_canvas', {
            hoverCursor: 'pointer',
            selection: false,
            selectionBorderColor: 'blue',
            width: newWidth,
            height: newHeight,
            preserveObjectStacking: true
        });

        let img = new Image();

        img.onload = function(){

            imageWidth = img.width;
            imageHeight = img.height;

            console.log("Width: " + imageWidth);
            console.log("Height: " + imageHeight);

            newWidth = 400;
            newHeight = 400;

            if((imageWidth/newWidth) > (imageHeight/newHeight)) {
                newHeight = imageHeight / (imageWidth / newWidth);
            } else {
                newWidth = imageWidth / (imageHeight / newHeight);
            }

            $("#<?php echo e($pid); ?>_image").css({'width': newWidth, 'height': newHeight}).attr('src', imgurl);

            $("#<?php echo e($pid); ?>_div").css({'width': newWidth, 'height': newHeight});
            //$(".canvas-container").css({'width': newWidth, 'height': newHeight});
            $("#<?php echo e($pid); ?>_area").css({'width': newWidth, 'height': newHeight});

            myCanvas.setHeight(newHeight);
            myCanvas.setWidth(newWidth);

            //setTemplate();

            img = null;

        };

        img.src = imgurl;
    }

    function setTemplate() {

        $.ajax({
            url: "/api/template/" + templateVars.pid + "/" + templateVars.size,
            contentType: 'application/json',
            //dataType: 'json',
            type: 'GET',
            success: (result) => {
                template = result;

                var group = [];

                // Run Through Template(s)
                for (var i = 1; i < result.values.length; i++) {

                    // EMPTY OBJECT
                    if(result.values[i].x === 0 && result.values[i].y === 0 && result.values[i].width === 0 && result.values[i].height === 0){
                        continue;
                    }

                    if (result.values[i].shape === 1) {

                        group.push(new fabric.Circle({
                            radius: result.values[i].width / 2,
                            height: result.values[i].height,
                            width: result.values[i].width,
                            top: result.values[i].y , // y - h
                            left: result.values[i].x , // x - w
                            fill: '#000000',
                            originX: "left",
                            originY: "top",
                            stroke: "rgba(255,0,0,1)",
                            strokeWidth: 1
                        }));

                    } else if (result.values[i].shape === 4) {

                        group.push(new fabric.Rect({
                            width: result.values[i].width,
                            height: result.values[i].height,
                            top: result.values[i].y,
                            left: result.values[i].x,
                            fill: '#000000',
                            originX: "left",
                            originY: "top",
                            stroke: "rgba(255,0,0,1)",
                            strokeWidth: 1
                        }));
                    }
                    upperTop = (result.values[i].y < upperTop) ? result.values[i].y : upperTop;
                    upperLeft = (result.values[i].x < upperLeft) ? result.values[i].x : upperLeft;
                }

                if(group.length > 0) {
                    var g = new fabric.Group(group, {
                        originY: "top",
                        originX: "left",
                        left: upperLeft,
                        top: upperTop,
                        selectable: false,
                        opacity: 0.3
                    });

                    groupWidth = g.width;
                    groupHeight = g.height;

                    myCanvas.clipPath = g;

                    myCanvas.add(g);

                    myCanvas.moveTo(g, 0);

                    $("#upper-canvas").width(newWidth).height(newHeight);

                }

                $.ajax({
                    url: "/api/mockgen",
                    type: 'GET',
                    method: 'GET',
                    cache: false,
                    contentType: 'application/json',
                    processData: false,
                    success: (result) => {

                        fromStorage(result);

                    },
                    error: (error, data) => {
                        console.log(error);

                        fromStorage();
                    }
                });

            },
            error: (err, data) => {
                console.log("Error fetching template.");

                // IF EMPTY, USE GENERIC
                // SET TEMPLATE TO SHIRT
                var w = newWidth / 3;
                var h = newHeight / 3;

                $("#hoddieDrawingArea").css({"top": '35%', "left": '35%', "width": w, "height": h});
            }
        });
    }

    function fromStorage(result = null){
        let cv = localStorage.getItem('canvas') ? JSON.parse(localStorage.getItem('canvas')) : {};

        // Merge
        if(result != null && Object.keys(result).length){

            // If downloaded, remove from site session
            if(!cv.objects) { cv.objects = []; }
            for(var i in result){
                let l = Object.keys(cv.objects).length;
                if(result[i]) {
                    cv.objects[l] = result[i];
                    console.log(result[i]);
                    removeSessionItem(result[i].objectName, true);
                }
            }
        }

        if(cv.objects && Object.keys(cv.objects).length > 0){

            let totalObjs = Object.keys(cv.objects).length;
            let count = 0;

            let listItems = [];

            if(totalObjs > 0) {

                myCanvas.loadFromJSON(cv,myCanvas.renderAll.bind(myCanvas), function (o, object) {

                    count++;

                    if(listItems[object.objectIndex]){
                        listItems[object.objectIndex].push(object)
                    } else {
                        listItems[object.objectIndex] = [object];
                    }

                    // fabric.log(object, o);

                });

                myCanvas.selectable = false;
                myCanvas.renderAll();

            }
        }
    }

    var radius = function (a, b) {
        let aSquared = a * a;
        let bSquared = b * b;

        return Math.sqrt(aSquared + bSquared) / Math.sqrt(2);
    };

    var centerX = function(){
        var x = Math.round(upperLeft + (groupWidth/3));
        console.log("CENTERX: " + x);
        return x;
    };

    var centerY = function(){
        var y = Math.round(upperTop + (groupHeight/2));
        console.log("CENTERY: " + y);
        return y;
    };

    prevCanvas.push(myCanvas);

</script>

</body>
</html>