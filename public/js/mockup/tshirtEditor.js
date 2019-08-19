// import Vue from ("vue");
// require('../components/ItemSelect.vue');

var canvas;
var tshirts = new Array(); //prototype: [{style:'x',color:'white',front:'a',back:'b',price:{tshirt:'12.95',frontPrint:'4.99',backPrint:'4.99',total:'22.47'}}]
var a;
var b;
var line1;
var line2;
var line3;
var line4;
var objectIndex = 1;
var timer;

var hoodieCanvas, shirtCanvas, hatCanvas, bagCanvas;

/**
 * 0: hoodie
 * 1: shirt
 * 2: hat
 * 4: bag
 */

var prevCanvas = [
    hoodieCanvas,
    shirtCanvas,
    hatCanvas,
    bagCanvas
];

/**
 * JSON 0 always empty
 *
 * type = nothing
 *
 * SHAPE: (by sides)
 *        1: circle
 *        4: rectangle
 */

var imageWidth, imageHeight, newWidth, newHeight, groupWidth, groupHeight, groupX, groupY, realW, realH, url, pid, size, mainG;
var tempRatio = [];
var upperLeft = 999;
var upperTop = 999;

var templateVars = {
    pid: 0,
    url: null,
    size: 'L'
};

function init(){
    /**
     * 
 * START PAGE FUNCTIONS
 */
    //var imageWidth = $width }};
    //var imageHeight =  $height }};
    console.log("INITIALIZING MOCKGEN!");


    $(".mock-block").on("click", function () {
        var block = this;
        $(".edit-function").each(function () {
            var editor = $(block).attr('data-toggle');

            if (editor === $(this).attr('id')) {
                $(this).fadeIn('slow');
            } else {
                $(this).hide();
            }
        });

        if ($(this).attr('id') === 'imageUpload') {
            $("#fileUpload").trigger('click');
        }

        if ($(this).attr('id') === 'productSearch') {
            // Get the modal
            var modal = document.getElementById("myModal");
            var amodal = document.getElementById("myArtModal");

            // Get the button that opens the modal
            var pbtn = document.getElementById("myPBtn");
            var abtn = document.getElementById("myArtBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            var aspan = document.getElementsByClassName("art-close")[0];

            // When the user clicks the button, open the modal 
            pbtn.onclick = function () {
                modal.style.display = "block";
            }
            abtn.onclick = function () {
                amodal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                // alert("SCREAMING DOGE!");
                modal.style.display = "none";
            }
            aspan.onclick = function () {
                // alert("BEAMING DOGE!");
                amodal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            window.onclick = function (event) {
                if (event.target == amodal) {
                    amodal.style.display = "none";
                }
            }
        }
    });

    $("#fileUpload").on('change', function (e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();

            reader.onload = function () {
                addAwkwardImage(reader.result, e.target.files[0]);
            };

            reader.readAsDataURL(e.target.files[0]);
        }
    });

    $(".design-images").on('click', function () {
        console.log($(this).attr('src'));
    });

    $("#saveMyDesign").on('click', function () {
        console.log("STORAGE: ");
        console.log(localStorage);
        let item = canvas.getObjects();

        for (let i in prevCanvas) {
            prevCanvas[i].clear();
        }

        for (let i in item) {
            for (let c in prevCanvas) {
                if(item[i].type==='group')
                {
                    // prevCanvas[c].add(allG[c]);
                    continue;
                }
                let obj = $.extend(true, {}, item[i]);
                obj.lockMovementX = true;
                obj.lockMovementY = true;
                // console.log("YO HERE IT IS (canvas width):");
                // console.log(prevCanvas[c].getObjects[0].width)
                // console.log(obj);
                // let newW = obj.aCoords.br.x - obj.aCoords.bl.x;
                // let newH = obj.aCoords.bl.y - obj.aCoords.tl.y;
                // console.log(newW);
                // console.log(newH);
                // obj.left = (prevCanvas[c].width - newW) * 0.5; 
                // obj.top = (prevCanvas[c].height - newH) * 0.5;
                prevCanvas[c].add(obj);
            }
        }

    });

    $(document).on('input', "#imageOpacity", function () {
        let obj = canvas.getActiveObject();
        if (obj.type === 'awkward-image' || obj.type === 'awkward-text') {
            obj.setOpacity(($(this).val() / 100));
            canvas.renderAll();
            if (obj.type === 'awkward-image' && obj.toObject().src.length > 200) {
                var startTimer = function () {
                    clearTimeout(timer);
                    sessionInfo(obj);
                };
                startTimer();
            } else {
                sessionInfo(obj);
            }
        }
    });

    $(document).on("click", ".remove-art", function () {
        let id = $(this).parent().parent().parent().attr('id');
        removeListItem(id);
        removeSessionItem(id);
        removeItemByName(id);
    });

    $(document).on("click", ".art-down", function () {
        let id = $(this).parent().parent().parent().attr('id');
        let sibling = $(this).parent().parent().parent().next();

        if (sibling.length) {
            moveItemDownByName(id, $(this).parent().parent().parent().next());
            let existing = $(this).parent().parent().parent()[0].outerHTML;
            $(this).parent().parent().parent().remove();
            sibling.after(existing);
        }

        $(this).prop('disabled', (!sibling.next().length));
    });

    $(document).on("click", ".art-up", function () {
        let id = $(this).parent().parent().parent().attr('id');
        let sibling = $(this).parent().parent().parent().prev();

        if (sibling.length) {
            moveItemUpByName(id, $(this).parent().parent().parent().prev());

            // Move down the list if possible
            let existing = $(this).parent().parent().parent()[0].outerHTML;
            $(this).parent().parent().parent().remove();
            sibling.before(existing);
        }

        $(this).prop('disabled', (!sibling.prev().length));
    });

    $("#clearAll").on('click', ()=>{clearAll();});

    /**
     * END PAGE FUNCTIONS
     */

    // let tmpOpacity = 0;

    canvas.on({
        'object:moving': function (e) {
            canvas.clipPath.opacity = 0.5;
            /*
            // Set objects?
            for(var c in prevCanvas){
                let can = prevCanvas[c].getObjects();
                for(var obj in can){
                    if(e.target.objectName === can[obj].objectName){
                        can[obj].left = e.target.left;
                        can[obj].top = e.target.top;
                        prevCanvas[c].renderAll();
                    }
                }

            }

             */

        },
        'object:modified': function (e) {
            canvas.clipPath.opacity = 0.5;
            setCoordinates(e.target);
            if (e.target.type === 'awkward-image' && e.target.toObject().src.length > 200) {
                var startTimer = function () {
                    clearTimeout(timer);
                    timer = setTimeout(function () { sessionInfo(e.target); }, 3000);
                };
                startTimer();
            } else {
                sessionInfo(e.target);
            }
        },
        'selection:updated': onObjectSelected,
        'selection:cleared': onSelectedCleared
    });

    $("#saveimage").click(function () {
        var img = canvas.toDataURL();
        $("#canvasdata").attr('src', img);
    });

    // piggyback on `canvas.findTarget`, to fire "object:over" and "object:out" events
    canvas.findTarget = (function (originalFn) {
        return function () {
            var target = originalFn.apply(this, arguments);
            if (target) {
                if (this._hoveredTarget !== target) {
                    canvas.fire('object:over', { target: target });
                    if (this._hoveredTarget) {
                        canvas.fire('object:out', { target: this._hoveredTarget });
                    }
                    this._hoveredTarget = target;
                }
            } else if (this._hoveredTarget) {
                canvas.fire('object:out', { target: this._hoveredTarget });
                this._hoveredTarget = null;
            }
            return target;
        };
    })(canvas.findTarget);

    canvas.on('object:over', function (e) {
        //e.target.setFill('red');
        //canvas.renderAll();
    });

    canvas.on('object:out', function (e) {
        //e.target.setFill('green');
        canvas.renderAll();
    });

    document.getElementById('add-text').onclick = function () {
        let textString = $("#text-string");
        var text = textString.val();
        let name = randomString();
        let objInd = objectIndex++;
        var textSample = new fabric.AwkwardText(text, {
            left: centerX(),
            top: centerY(),
            originX: 'left',
            originY: 'top',
            angle: 0,
            fill: textString.css('color'),
            fontFamily: textString.css('font-family'),
            underline: (textString.css('text-decoration') === 'underline'),
            hasRotatingPoint: true,
            objectName: name,
            objectIndex: objInd
        });

        textSample.toObject = (function (toObject) {
            return function () {
                return fabric.util.object.extend(toObject.call(this), {
                    objectName: name,
                    objectIndex: objInd
                });
            }
        })(textSample.toObject);
        textSample.fontStyle = textString.css('font-style');
        textSample.fontWeight = (textString.css('font-weight') > 400) ? 'bold' : '';

        createListItem(name, 'Text', {
            x: textSample.left,
            y: textSample.top
        });

        canvas.add(textSample);
        canvas.item(canvas.item.length - 1).hasRotatingPoint = true;
        $("#texteditor").css('display', 'block');
        $("#imageeditor").css('display', 'block');
    };

    $("#text-string").on('keyup', function () {
        var activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.setText(this.value);
            canvas.renderAll();
        }
    });

    $(".design-images").click(function (e) {
        var el = e.target;
        addAwkwardImage(el.src);
    });

    $("#font-family").change(function () {
        var activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.fontFamily = this.value;
            canvas.renderAll();
        }
    });
    $('#text-bgcolor').miniColors({
        change: function (hex, rgb) {
            var activeObject = canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.backgroundColor = this.value;
                canvas.renderAll();
            }
        },
        open: function (hex, rgb) {
            //
        },
        close: function (hex, rgb) {
            //
        }
    });

    $('#text-fontcolor').miniColors({
        change: function (hex, rgb) {
            var activeObject = canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.fill = this.value;
                canvas.renderAll();
            }
        },
        open: function (hex, rgb) {
            //
        },
        close: function (hex, rgb) {
            //
        }
    });

    $('#text-strokecolor').miniColors({
        change: function (hex, rgb) {
            var activeObject = canvas.getActiveObject();
            if (activeObject && activeObject.type === 'i-text') {
                activeObject.strokeStyle = this.value;
                canvas.renderAll();
            }
        },
        open: function (hex, rgb) {
            //
        },
        close: function (hex, rgb) {
            //
        }
    });

    //canvas.add(new fabric.fabric.Object({hasBorders:true,hasControls:false,hasRotatingPoint:false,selectable:false,type:'rect'}));
    $("#drawingArea").hover(
        function () {
            canvas.add(line1);
            canvas.add(line2);
            canvas.add(line3);
            canvas.add(line4);
        },
        function () {
            canvas.remove(line1);
            canvas.remove(line2);
            canvas.remove(line3);
            canvas.remove(line4);
        }
    );

    $('.color-preview').click(function () {
        var color = $(this).css("background-color");
        document.getElementById("shirtDiv").style.backgroundColor = color;
        document.getElementById("shirtDiv2").style.backgroundColor = color;
    });

    $('#flip').click(
        function () {
            if ($(this).attr("data-original-title") == "Show Back View") {
                $(this).attr('data-original-title', 'Show Front View');
                $("#tshirtFacing").attr("src", "img/crew_back.png");
                a = JSON.stringify(canvas);
                canvas.clear();
                try {
                    var json = JSON.parse(b);
                    canvas.loadFromJSON(b);
                } catch (e) {
                }

            } else {
                $(this).attr('data-original-title', 'Show Back View');
                $("#tshirtFacing").attr("src", "img/crew_front.png");
                b = JSON.stringify(canvas);
                canvas.clear();
                try {
                    var json = JSON.parse(a);
                    canvas.loadFromJSON(a);
                } catch (e) {
                }
            }
            canvas.renderAll();
            setTimeout(function () {
                canvas.calcOffset();
            }, 200);
        });
    $(".clearfix button,a").tooltip();
    line1 = new fabric.Line([0, 0, 200, 0], {
        "stroke": "#000000",
        "strokeWidth": 1,
        hasBorders: false,
        hasControls: false,
        hasRotatingPoint: false,
        selectable: false
    });
    line2 = new fabric.Line([199, 0, 200, 399], {
        "stroke": "#000000",
        "strokeWidth": 1,
        hasBorders: false,
        hasControls: false,
        hasRotatingPoint: false,
        selectable: false
    });
    line3 = new fabric.Line([0, 0, 0, 400], {
        "stroke": "#000000",
        "strokeWidth": 1,
        hasBorders: false,
        hasControls: false,
        hasRotatingPoint: false,
        selectable: false
    });
    line4 = new fabric.Line([0, 400, 200, 399], {
        "stroke": "#000000",
        "strokeWidth": 1,
        hasBorders: false,
        hasControls: false,
        hasRotatingPoint: false,
        selectable: false
    });

}

function clearAll() {
    console.log("CLEEEEEEAR!");
    // Clear storage and flush sessions
    localStorage.clear();
    $("#objectHolder").html(' ');

    $.ajax({
        url: "/api/mockgen/flush",
        type: 'GET',
        method: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: (result) => {
            console.log(result);
        },
        error: (error, data) => {
            console.log(error);
        }
    });

    // Clear All Objects
    canvas.clear();
    setTemplate("main");
}

var sessionInfo = function(item, file = null){

    item.percentX = (item.left - groupX) / groupWidth;
    item.percentY = (item.top - groupY) / groupHeight;

    if(item.type === 'awkward-image' && item.toObject().src.length > 200){

        var data = new FormData();
        var obj = item.toObject();
        delete obj.src;

        obj.objectIndex = canvas.getObjects().indexOf(item);

        data.append("name",obj.objectName);

        if(file){
            data.append("file", file);
        }

        data.append("myObject", JSON.stringify(obj));
        data.append("_token", $('[name="_token"]').val());

        $.ajax({
            url: "/api/mockgen",
            type: 'POST',
            method: 'POST',
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: (result) => {
                $.ajax({
                    url: "/api/mockgen",
                    type: 'GET',
                    method: 'GET',
                    cache: false,
                    contentType: 'application/json',
                    processData: false,
                    success: (result) => {

                        let cv = localStorage.getItem('canvas') ? JSON.parse(localStorage.getItem('canvas')) : {};

                        // Merge
                        if (result != null && Object.keys(result).length) {

                            // If downloaded, remove from site session
                            if (!cv.objects) { cv.objects = []; }
                            for (var i in result) {
                                let l = Object.keys(cv.objects).length;
                                if (result[i]) {
                                    cv.objects[l] = result[i];
                                    console.log(result[i]);
                                    // removeListItem(result[i].objectName);
                                    removeSessionItem(result[i].objectName, true);
                                    // removeItemByName(result[i].objectName);
                                    // $(document).ready();
                                }
                            }

                            localStorage.setItem('canvas', JSON.stringify(cv));
                        }


                    },
                    error: (error, data) => {
                        console.log(error);
                    }
                });
            },
            error: (error, data) => {
                console.log(error);
            }
        });

        return true;
    }

    let storage = (localStorage.getItem('canvas')) ? JSON.parse(localStorage.getItem('canvas')) : {};

    storage.objects = (storage.objects) ? storage.objects : [];
    var itemObject = item.toObject();

    itemObject.objectIndex = canvas.getObjects().indexOf(item);

    // Check for name
    let itemExists = false;
    for(var a in storage.objects){
        if(storage.objects[a] != null && storage.objects[a].objectName === itemObject.objectName){
            itemExists = a;
        }
    }

    if(itemExists){
        storage.objects[itemExists] = itemObject;
    } else {
        let l = (storage.objects.length) ? storage.objects.length : 0;
        storage.objects[l] = itemObject;
    }

    localStorage.setItem('canvas',JSON.stringify(storage));
    console.log(localStorage);
};

function setShirtImage(imgurl, canvasType = "canvas"){

    var canvasToUse = null;

    var tag = false;

    switch(canvasType) {
        default: tag = "main"; break;
        case 0: tag = 1456; break;
        case 1: tag = 112; break;
        case 2: tag = 1402; break;
        case 3: tag = 1455; break;
    }

    //setup front side canvas
    if(isNaN(canvasType)) {
        canvas = canvasToUse = new fabric.Canvas('tcanvas', {
            hoverCursor: 'pointer',
            selection: true,
            selectionBorderColor: 'blue',
            width: newWidth,
            height: newHeight,
            preserveObjectStacking: true
        });

    } else {
        canvasToUse = prevCanvas[canvasType] = new fabric.Canvas(tag + '_canvas', {
            hoverCursor: 'pointer',
            selection: true,
            selectionBorderColor: 'blue',
            width: 400,
            height: 400,
            preserveObjectStacking: true
        })
    }

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

        $("#" + ((!isNaN(tag)) ? tag + "_image" : "shirtFacing")).css({'width': newWidth, 'height': newHeight}).attr('src', imgurl);

        $("#" + ((!isNaN(tag)) ? tag + "_div"  : "shirtDiv")).css({'width': newWidth, 'height': newHeight});

        var drawingArea = "#" + ((!isNaN(tag)) ? tag + "_area" : "shirtDrawingArea");

        $(drawingArea).css({'width': newWidth, 'height': newHeight});
        $(drawingArea).find(".canvas-container").css({'width': newWidth, 'height': newHeight});
        canvasToUse.setHeight(newHeight);
        canvasToUse.setWidth(newWidth);

        setTemplate(tag);

        img = null;

    };

    img.src = imgurl;
}


function setTemplate(main = "main") {

    $.ajax({
        url: "/api/template/" + ((isNaN(main)) ? templateVars.pid : main) + "/" + templateVars.size,
        contentType: 'application/json',
        //dataType: 'json',
        type: 'GET',
        success: (result) => {
            template = result;

            var group = [];

            var upleft = uptop = 999;

            if (result.values) {

                // Run Through Template(s)
                for (var i = 1; i < result.values.length; i++) {

                    // EMPTY OBJECT
                    if (result.values[i].x === 0 && result.values[i].y === 0 && result.values[i].width === 0 && result.values[i].height === 0) {
                        continue;
                    }

                    if (result.values[i].shape === 1) {

                        group.push(new fabric.Circle({
                            radius: result.values[i].width / 2,
                            height: result.values[i].height,
                            width: result.values[i].width,
                            top: result.values[i].y, // y - h
                            left: result.values[i].x, // x - w
                            fill: '#000000',
                            originX: "left",
                            originY: "top",
                            stroke: "rgba(255,0,0,1)",
                            strokeWidth: 1,
                            opacity: 1
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
                            strokeWidth: 1,
                            opacity: 1
                        }));
                    }
                    upperTop = (result.values[i].y < upperTop) ? result.values[i].y : upperTop;
                    upperLeft = (result.values[i].x < upperLeft) ? result.values[i].x : upperLeft;

                    uptop = (result.values[i].y < uptop) ? result.values[i].y : uptop;
                    upleft = (result.values[i].x < upleft) ? result.values[i].x : upleft;
                    
                    //set templates ratio onto last tempRatio position
                    console.log(result);
                    if(main=='main')
                        tempRatio.push(result.dpi);
                }
            }

            if (group.length > 0) {
                var g = new fabric.Group(group, {
                    originY: "top",
                    originX: "left",
                    left: upleft,
                    top: uptop,
                    selectable: false,
                    opacity: 0.3
                });

                if (main == "main") {
                    groupX = g.left;
                    groupY = g.top;
                    groupWidth = g.width;
                    groupHeight = g.height;
                }



                let tag = main;
                switch (main) {
                    default: tag = false; break;
                    case 1456: tag = 0; break;
                    case 112: tag = 1; break;
                    case 1402: tag = 2; break;
                    case 1455: tag = 3; break;
                }

                if (isNaN(main)) {
                    mainG = g;
                    myCanvas = canvas;
                    $("#upper-canvas").width(newWidth).height(newHeight);
                } else {
                    myCanvas = prevCanvas[tag];
                }
                // allG.push(g);

                myCanvas.clipPath = g;

                myCanvas.add(g);

                myCanvas.moveTo(g, 0);

            }

            if (isNaN(main)) {
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
            }

        },
        error: (err, data) => {
            console.log("Error fetching template.");

            // IF EMPTY, USE GENERIC
            // SET TEMPLATE TO SHIRT
            var w = newWidth / 3;
            var h = newHeight / 3;

            $("#shirtDrawingArea").css({ "top": '35%', "left": '35%', "width": w, "height": h });
        }
    });
}


function fromStorage(result = null){
    let cv = localStorage.getItem('canvas') ? JSON.parse(localStorage.getItem('canvas')) : {};
    console.log(cv);

    // Merge
    if(result != null && Object.keys(result).length){

        // If downloaded, remove from site session
        if(!cv.objects) { cv.objects = []; }
        for(var i in result){
            let l = Object.keys(cv.objects).length;
            if(result[i]) {
                cv.objects[l] = result[i];
                console.log(result[i]);
                // removeListItem(result[i].objectName);
                removeSessionItem(result[i].objectName, true);
                // removeItemByName(result[i].objectName);
                // $(document).ready();
            }
        }
    }

    if(cv.objects && Object.keys(cv.objects).length > 0){

        let totalObjs = Object.keys(cv.objects).length;
        let count = 0;

        let listItems = [];

        if(totalObjs > 0) {
            console.log(cv.objects);
            cv.objects = Array.from(cv.objects);
            cv.objects.unshift(mainG.toObject());
            console.log(cv.objects);

            try{
            canvas.loadFromJSON(cv,canvas.renderAll.bind(canvas), function (o, object) {

                count++;

                if(listItems[object.objectIndex]){
                    listItems[object.objectIndex].push(object)
                } else {
                    listItems[object.objectIndex] = [object];
                }

                if(count === totalObjs){
                    for(var i in listItems){
                        for(var j in listItems[i]){
                            createListItem(listItems[i][j].objectName,
                                ((listItems[i][j].type === "awkward-image") ? "image" : "text"),
                                ((listItems[i][j].type === "awkward-image") ?
                                    {
                                        width: listItems[i][j].objectWidth*listItems[i][j].scaleX,
                                        height: listItems[i][j].objectHeight*listItems[i][j].scaleY,
                                        x: listItems[i][j].left,
                                        y: listItems[i][j].top
                                    } :
                                    {
                                        x: listItems[i][j].left,
                                        y: listItems[i][j].top
                                    } )
                            );
                        }
                    }
                }
                fabric.log(object, o);
            });
            } catch (e) {
                console.log("...inner break :(");
                console.log(e);
                // $("#clearAll").click();
            }
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

$(document).ready(function () {
    init();
});//doc ready

function addAwkwardImage(src, info = false){

    let name = randomString();
    let objInd = objectIndex++;

    console.log('used by image:');
    console.log(groupX, groupY);
    try{
    fabric.AwkwardImage.fromURL(src, function (image) {
        image.set({
            left: (groupWidth/2 + groupX),     //(newWidth / 3),
            top: (groupHeight/2 + groupY),    //(newHeight / 3),
            angle: 0,
            // padding: 10,
            cornersize: 10,
            hasRotatingPoint: true,
            crossOrigin: "anonymous",
            objectName: name,
            objectIndex: objInd
        });
        
        let w = image.width;
        let h = image.height;
        let options = null;
        
        console.log(image);
        let downRatio;

        realW = w * image.scaleX;//image.aCoords.tr.x - image.aCoords.tl.x;
        realH = h * image.scaleY;//image.aCoords.bl.y - image.aCoords.tl.y;

        // if image is oversized...
        if (realW > groupWidth || realH > groupHeight) {
            console.log("toobig...");
            // if mainly over width ELSE mainly over by height
            if (realW - groupWidth > realH - groupHeight) {
                downRatio = realW / groupWidth;
                console.log(downRatio);
            } else {
                downRatio = realH / groupHeight;
                console.log(downRatio);
            }
            realW = realW / downRatio;
            realH = realH / downRatio;
            image.scaleToWidth(realW);
            image.scaleToHeight(realH);
            console.log(w * image.scaleX);
            console.log(h* image.scaleY);
            // image.scaleWidth

            console.log("W/H:");
            console.log(realW, realH);
        }

        //CENTER IMAGE on TEMPLATE +10 for controls size
        image.left = (groupWidth / 2 + groupX) - (realW / 2);
        image.top = (groupHeight / 2 + groupY) - (realH / 2);


        image.objectWidth = w*image.scaleX;
        image.objectHeight = h*image.scaleY;
        
        image.crossOrigin = "anonymous";
        
        image.toObject = (function (toObject) {
            return function () {
                return fabric.util.object.extend(toObject.call(this), {
                    objectName: name,
                    objectIndex: objInd,
                });
            }
        })(image.toObject);

        if(info){
            options = {
                Width: image.objectWidth/tempRatio[tempRatio.length-1],
                Height: realH/tempRatio[tempRatio.length-1],
                x: image.left,
                y: image.top,
                DPI: image.width/(image.objectWidth/tempRatio[tempRatio.length-1]),
                percentX: (image.left - groupX) / groupWidth,
                percentY: (image.top - groupY) / groupHeight
            };
        } else {
            options = {
                x: image.left,
                y: image.top
            };
        // } else {
            // options = {
            //     x: image.left,
            //     y: image.top
            // }
        }

        createListItem(name, 'Image', options);

        // image.scaleToWidth(newWidth);
        //image.scale(getRandomNum(0.1, 0.25)).setCoords();
        canvas.add(image);

        for(var a in prevCanvas){
            prevCanvas[a].add(image);
        }

        canvas.add(image);

        console.log(prevCanvas[0].toObject());

        sessionInfo(image, info);
    });
    }catch(e){
        console.log("BREEEAKER!");
        console.log(e);
        // $("#clearAll").click();
    }
}

function renderAllCanvas() {
    canvas.renderAll();
}

function getRandomNum(min, max) {
    return Math.random() * (max - min) + min;
}

function onObjectSelected(e) {
    var selectedObject = e.target;
    $("#text-string").val("");
    selectedObject.hasRotatingPoint = true;
    $("#imageOpacity").val(selectedObject.getOpacity() * 100);
    $("#opacityLabel").html(selectedObject.getOpacity() * 100);
    setBorder(selectedObject);
    if (selectedObject && selectedObject.isType('awkward-text')) {

        let textString = $("#text-string");
        textString.val(selectedObject.getText());

        setBold(selectedObject.fontWeight);
        setItalic(selectedObject.fontStyle);
        setUnderline(selectedObject.underline);
        setFont(selectedObject.fontFamily);
        setColor(selectedObject.fill, true);

        //display text editor
        $("#show-text-editor").click();

    } else if (selectedObject && selectedObject.type === 'awkward-image') {
        //display image editor
        $("#text-editor").css('display', 'none');
        $("#design-editor").css('display','block');
    }
}

function onSelectedCleared(e) {
    $("#texteditor").css('display', 'none');
    $("#text-string").val("").removeAttr('style');
}

/**
 * Set the X and Y for object within UL
 * @param id
 */
function setCoordinates(id){
    $("#" + id.objectName).find(".object_x").html('X: ' + id.left.toFixed(2));
    $("#" + id.objectName).find(".object_y").html('Y: ' + id.top.toFixed(2));
}

function setBorder(id){

    $("#objectHolder").children().each(function(index, item){
        console.log(item);
        if($(item).attr('id') === id.objectName){
            $(item).addClass('border-danger').css("border-radius","10px");
        } else {
            $(item).removeClass('border-danger').css("border-radius", "0px");
        }
    });

}

/**
 * START TEXT FUNCTIONALITY
 */
function setBold(style = false){
    let activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'awkward-text' && !style) {
        activeObject.fontWeight = (activeObject.fontWeight === 'bold' ? '' : 'bold');
        canvas.renderAll();
    }

    let fw = parseInt($("#text-string").css('font-weight'));
    $("#text-string").css('font-weight',((style) ? style : (fw > 400) ? "" : "bold"));

}

function setItalic(style = false) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'awkward-text' && !style) {
        activeObject.fontStyle = (activeObject.fontStyle === 'italic' ? '' : 'italic');
        canvas.renderAll();
    }

    let textString = $("#text-string");
    textString.css('font-style', ((style) ? style : (textString.css('font-style') === 'normal') ? 'italic' : 'normal'));
}

function setFont(font, style = false) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'awkward-text') {
        activeObject.fontFamily = font;
        canvas.renderAll();
    }
    let textString = $("#text-string");
    textString.css('font-family', font);
}

function setUnderline(style = null){
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'awkward-text' && style === null) {
        console.log(activeObject.getUnderline());
        activeObject.setUnderline((!activeObject.getUnderline()));
        canvas.renderAll();
    }
    let textString = $("#text-string");
    let fd = (textString.css('text-decoration') === 'none') ? 'underline' : "none";
    textString.css('text-decoration', ((style !== null) ? ((style) ? 'underline' : 'none') : fd));
}

function setColor(color, style = false) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'awkward-text' && !style) {
        activeObject.setFill("#" + color);
        canvas.renderAll();
    }

    $("#text-string").css('color', ((!style) ? '#' : '') + color);
    $(".fa-circle").css('color', ((!style) ? '#' : '') + color);
}

/**
 * END TEXT FUNCTIONALITY
 */

function removeWhite() {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'image') {
        activeObject.filters[2] = new fabric.Image.filters.RemoveWhite({hreshold: 100, distance: 10});//0-255, 0-255
        activeObject.applyFilters(canvas.renderAll.bind(canvas));
    }
}

function percentageCalculator(x, w, y, h) {
    $("#xCoord").html(((x / w) * 100).toFixed(2) + "%");
    $("#yCoord").html(((y / h) * 100).toFixed(2) + "%");
}

function randomString(){
    return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15)
        + Math.random().toString(36).substring(2, 15);
}

function createListItem(id, type, options = null){

    var list = '<li class="list-group-item mb-3" id="'+id+'" draggable="true">' +
    '<div class="row"><div class="col-sm-6">' + type + '</div>' +
        '<div class="col-sm-6 text-right">' +
    '<span type="button" class="fa fa-arrow-up art-up"></span> ' +
    '<span type="button" class="fa fa-arrow-down art-down"></span> ' +
    '<span type="button" class="fa fa-trash-alt remove-art"></span>' +
    '</div></div>' +
        '<div class="row">' +
        '<div class="col-sm-6 object_x">X: ' + options.x + '</div>' +
        '<div class="col-sm-6 object_y">Y: ' + options.y + '</div>' +
        '<div class="col-sm-6 object_x">DPI: ' + Math.round(options.DPI) + '</div>' +
        '</div>';

    delete options.x;
    delete options.y;

    if(Object.keys(options).length > 0){
        list += '<div class="bg-info p-3 text-light font-weight-bold">';
        for(var a in options){
            if(a!='DPI')
            list += "| "+a + ": " + options[a] + "in |";
        }
        list += '</div>';
    }

    list += '</li>';

    // CREATE LIST ITEM
    $("#objectHolder").prepend(list);
}

/**
 * Remove an item from the list by object name
 * @param id
 */
function removeListItem(id){
    $("#"+id).remove();
}

/**
 * Remove an item from the session by object name
 * @param id
 * @param siteSession
 */
function removeSessionItem(id, siteSession = false){

    let item = findItemByName(id);

    console.log(item);

    if((item.type === 'awkward-image' && item.toObject().src.length > 200) || siteSession){

        console.log("ID: " + id);

        $.ajax({
            url: "/api/mockgen/remove/" + id,
            type: 'GET',
            method: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: (result) => {
                console.log(result);
            },
            error: (error, data) => {
                console.log(error);
            }
        });

        return true;
    }

    let storage = (localStorage.getItem('canvas')) ? JSON.parse(localStorage.getItem('canvas')) : {};
    let tmpObjects = {};

    // Check for name
    for(var a in storage.objects){
        if(storage.objects[a] !== null && storage.objects[a].objectName && storage.objects[a].objectName !== id){
            tmpObjects[a] = storage.objects[a];
        }
    }

    storage.objects = tmpObjects;
    console.log(id);
    localStorage.setItem('canvas',JSON.stringify(storage));
}

/**
 * Removes an item by object name
 * @param name
 */
function removeItemByName(name){
    let obj = findItemByName(name);
    if(obj){
        canvas.remove(obj);
    }
    for(var a in prevCanvas){
        obj = findItemByName(name, prevCanvas[a]);
        if(obj) {
            prevCanvas[a].remove(obj);
        }
    }
}

/**
 * Locate an item by object name
 * @param name
 * @param theCanvas
 * @returns {boolean|*}
 */
function findItemByName(name, theCanvas = null){

    let objs = (!theCanvas) ? canvas.getObjects() : theCanvas.getObjects();
    for(var i in objs){
        if(objs[i]['objectName'] === name){
            return objs[i];
        }
    }
    return false;
}

/**
 * Move the item up the list by object name
 * @param name
 * @param full  If you wish to bring to the very front, this should be set to true
 */
function moveItemUpByName(name, sibling, full = false){
    let obj = findItemByName(name);
    if(obj) {
        if(full){
            canvas.bringToFront(obj);
        } else {
            if(sibling.length) {
                let nextObj = findItemByName(sibling.attr('id'));
                let n = canvas.getObjects().indexOf(nextObj);
                let c = canvas.getObjects().indexOf(obj);

                // Swap
                canvas.moveTo(nextObj, c);
                canvas.moveTo(obj, n);
            } else {
                canvas.bringForward(obj);
            }
        }
        console.log(canvas.getObjects().indexOf(obj));
        obj.objectIndex = canvas.getObjects().indexOf(obj);
        sessionInfo(obj);
        canvas.renderAll();
    }
}

/**
 * Move the item down the list by object name
 * @param name
 * @param full  Set to true to send to the very back
 */
function moveItemDownByName(name, sibling, full = false){
    let obj = findItemByName(name);
    if(obj && canvas.getObjects().indexOf(obj) >= 1) {
        if(full){
            canvas.sendToBack(obj);
        } else {
            if(sibling.length) {
                let prevObj = findItemByName(sibling.attr('id'));
                let p = canvas.getObjects().indexOf(prevObj);
                let c = canvas.getObjects().indexOf(obj);

                // Swap
                canvas.moveTo(prevObj, c);
                canvas.moveTo(obj, p);
            } else {
                canvas.sendBackwards(obj);
            }
        }
        console.log(canvas.getObjects().indexOf(obj));
        obj.objectIndex = canvas.getObjects().indexOf(obj);
        sessionInfo(obj);
        canvas.renderAll();
    }
}

/**
 * Custom Classes being created to handle name and identification
 * @type {klass}
 */
fabric.AwkwardImage = fabric.util.createClass(fabric.Image, {
    type: 'awkward-image',

    initialize: function (element, options) {
        this.callSuper('initialize', element, options);
        options && this.set('objectName', options.objectName);
        options && this.set('objectIndex', options.objectIndex);
        options && this.set('objectWidth', options.objectWidth);
        options && this.set('objectHeight', options.objectHeight);
        options && this.set('percentX', options.percentX);
        options && this.set('percentY', options.percentY);
    },
    toObject: function (){
        return fabric.util.object.extend(this.callSuper('toObject'), {
            objectName: this.objectName,
            objectIndex: this.objectIndex,
            objectWidth: this.objectWidth,
            objectHeight: this.objectHeight,
            percentX: this.percentX,
            percentY: this.percentY            
        });
    }
});

fabric.AwkwardImage.fromObject = function (object, callback) {
    // let url = object.src;
    $.ajax({
        url: object.src,
        success: function (data, textStatus) {
            // URL is good
            fabric.util.loadImage(object.src, function(img) {
            callback && callback(new fabric.AwkwardImage(img,object));
            });
        }, error: function (jqXHR, textStatus, errorThrown) {
            // URL is bad
            console.log("...inner break :(");
            console.log(errorThrown);
            // clearAll();
            fromStorage();
            // $("#clearAll").click();
            // setTimeout(function () {$("#drawingArea").click();}, 50);
            // location.reload(true);
            // init();
            setTimeout(function () { canvas.renderAll(); }, 50);
            // canvas.
        }});
};

fabric.AwkwardImage.fromURL = function (url, callback, imageOptions){
    fabric.util.loadImage(url, function(img) {
        callback && callback(new fabric.AwkwardImage(img,imageOptions));
    });
};

fabric.AwkwardImage.async = true;

fabric.AwkwardText = fabric.util.createClass(fabric.IText, {
    type: 'awkward-text',

    initialize: function (element, options) {
        this.callSuper('initialize', element, options);
        options && this.set('objectName', options.objectName);
        options && this.set('objectIndex', options.objectIndex);
        options && this.set('percentX', options.percentX);
        options && this.set('percentY', options.percentY);
    },
    toObject: function (){
        return fabric.util.object.extend(this.callSuper('toObject'), {
            objectName: this.objectName,
            objectIndex: this.objectIndex,
            percentX: this.percentX,
            percentY: this.percentY
        });
    }
});

fabric.AwkwardText.fromObject = function (object, callback) {
    callback(new fabric.AwkwardText(object.text, object));
};

fabric.AwkwardText.async = true;

function saveDesign (csrfToken){

    let form = document.createElement('form');

    let csrf = document.createElement('input');
    let design_object = document.createElement('input');

    form.method = "POST";
    form.action = "";

    csrf.id = "_token";
    csrf.name = "_token";
    csrf.value = csrfToken;
    csrf.hidden = true;

    design_object.id = "design_object";
    design_object.name = "design_object";
    design_object.value = localStorage.getItem("canvas");

    form.appendChild(csrf);
    form.appendChild(design_object);

    document.body.appendChild(form);
    form.submit();
    timeout(readDesign(3), 1000);
};
