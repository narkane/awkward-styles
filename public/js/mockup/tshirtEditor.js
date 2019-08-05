var canvas;
var tshirts = new Array(); //prototype: [{style:'x',color:'white',front:'a',back:'b',price:{tshirt:'12.95',frontPrint:'4.99',backPrint:'4.99',total:'22.47'}}]
var a;
var b;
var line1;
var line2;
var line3;
var line4;

/**
 * JSON 0 always empty
 *
 * type = nothing
 *
 * SHAPE: (by sides)
 *        1: circle
 *        4: rectangle
 */

var imageWidth, imageHeight, newWidth, newHeight, groupWidth, groupHeight, url, pid, size;
var upperLeft = 999;
var upperTop = 999;

var templateVars = {
    pid: 0,
    url: null,
    size: 'L'
};

var sessionInfo = function(item){
    let storage = (sessionStorage.getItem('canvas')) ? JSON.parse(sessionStorage.getItem('canvas')) : {};

    storage.objects = (storage.objects) ? storage.objects : [];
    var itemObject = item.toObject();

    // Check for name
    let itemExists = false;
    for(var a in storage){
        if(a.name && a.name === itemObject.name){
            itemExists = a;
        }
    }

    if(itemExists){
        storage.objects[a] = itemObject;
    } else {
        storage.objects[(storage.objects.length) ? storage.length : 0] = itemObject;
    }

    console.log(itemObject);

    sessionStorage.setItem('canvas',JSON.stringify(storage));
};

function setShirtImage(imgurl){

    //setup front side canvas
    canvas = new fabric.Canvas('tcanvas', {
        hoverCursor: 'pointer',
        selection: true,
        selectionBorderColor: 'blue',
        width: newWidth,
        height: newHeight
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

        $("#hoodieFacing").css({'width': newWidth, 'height': newHeight}).attr('src', imgurl);

        $("#shirtDiv").css({'width': newWidth, 'height': newHeight});
        $(".canvas-container").css({'width': newWidth, 'height': newHeight});
        //$(".upper-canvas").css({'width': newWidth, 'height': newHeight});
        //$(".upper-canvas").width(newWidth).height(newHeight);
        $("#hoddieDrawingArea").css({'width': newWidth, 'height': newHeight});
        //$("#tcanvas").css({'width': newWidth, 'height': newHeight});
        //$("#tcanvas").width(newWidth).height(newHeight);

        canvas.setHeight(newHeight);
        canvas.setWidth(newWidth);

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

                canvas.clipPath = g;

                canvas.add(g);

                $("#upper-canvas").width(newWidth).height(newHeight);

            }

            if(sessionStorage.getItem('canvas')){
                let cv = JSON.parse(sessionStorage.getItem('canvas'));

                /*
                fabric.util.enlivenObjects(cv, function(objects) {
                    var origRenderOnAddremove = canvas.renderOnAddRemove;
                    canvas.renderOnAddRemove = false;

                    objects.forEach(function(o){ canvas.add(o); });

                    canvas.renderOnAddRemove = origRenderOnAddremove;
                    canvas.renderAll();
                });

                 */


                canvas.loadFromJSON(cv, canvas.renderAll.bind(canvas), function(o, object) {
                    fabric.log(o,object);});

                console.log(JSON.parse(sessionStorage.getItem('canvas')));
            }

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

    /**
     * START PAGE FUNCTIONS
     */
        //var imageWidth = $width }};
        //var imageHeight =  $height }};


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
    });

    $(".design-images").on('click', function(){
        console.log($(this).attr('src'));
    });

    $(document).on("click", ".remove-art", function(){
        let id = $(this).parent().parent().attr('id');
        removeListItem(id);
        removeSessionItem(id);
        removeItemByName(id);
    });

    /**
     * END PAGE FUNCTIONS
     */

    $("#hoodieFacing").on('change',setTemplate());

    canvas.on({
        'object:moving': function (e) {
            e.target.opacity = 0.5;
            canvas.clipPath.opacity = 0.5;
        },
        'object:modified': function (e) {
            e.target.opacity = 1;
            canvas.clipPath.opacity = 0.05;
            sessionInfo(e.target);
        },
        'object:selected': onObjectSelected,
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
                    canvas.fire('object:over', {target: target});
                    if (this._hoveredTarget) {
                        canvas.fire('object:out', {target: this._hoveredTarget});
                    }
                    this._hoveredTarget = target;
                }
            } else if (this._hoveredTarget) {
                canvas.fire('object:out', {target: this._hoveredTarget});
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
        var textSample = new fabric.IText(text, {
            left: centerX(),
            top: centerY(),
            originX: 'left',
            originY: 'top',
            angle: 0,
            fill: textString.css('color'),
            fontFamily: textString.css('font-family'),
            underline: (textString.css('text-decoration') === 'underline'),
            hasRotatingPoint: true,
            name: name
        });

        textSample.toObject = (function (toObject) {
            return function() {
                return fabric.util.object.extend(toObject.call(this),{
                        name : name
                    });
            }
        })(textSample.toObject);
        textSample.fontStyle = textString.css('font-style');
        textSample.fontWeight = (textString.css('font-weight') > 400) ? 'bold' : '';

        createListItem(name, 'Text');

        canvas.add(textSample);
        canvas.item(canvas.item.length - 1).hasRotatingPoint = true;
        $("#texteditor").css('display', 'block');
        $("#imageeditor").css('display', 'block');
    };

    $("#text-string").on('keyup',function () {
        var activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'i-text') {
            activeObject.setText(this.value);
            canvas.renderAll();
        }
    });

    $(".design-images").click(function (e) {
        var el = e.target;
        var opacity = (function (min, max) {
            return Math.random() * (max - min) + min;
        })(0.5, 1);

        let name = randomString();

        fabric.Image.fromURL(el.src, function (image) {
            image.set({
                left: (newWidth / 3),
                top: (newHeight / 3),
                angle: 0,
                padding: 10,
                cornersize: 10,
                hasRotatingPoint: true,
                crossOrigin: "Anonymous",
                name: name
            });

            image.toObject = (function (toObject) {
                return function() {
                    return fabric.util.object.extend(toObject.call(this),{
                        name : name
                    });
                }
            })(image.toObject);

            createListItem(name, 'Image');

            image.scaleToWidth(newWidth);
            //image.scale(getRandomNum(0.1, 0.25)).setCoords();
            canvas.add(image);
        });

        // HIDE DESIGN
       //$("#designModal")

    });
    document.getElementById('bring-to-front').onclick = function () {
        var activeObject = canvas.getActiveObject(),
            activeGroup = canvas.getActiveGroup();
        if (activeObject) {
            activeObject.bringToFront();
        } else if (activeGroup) {
            var objectsInGroup = activeGroup.getObjects();
            canvas.discardActiveGroup();
            objectsInGroup.forEach(function (object) {
                object.bringToFront();
            });
        }
    };
    document.getElementById('send-to-back').onclick = function () {
        var activeObject = canvas.getActiveObject(),
            activeGroup = canvas.getActiveGroup();
        if (activeObject) {
            activeObject.sendToBack();
        } else if (activeGroup) {
            var objectsInGroup = activeGroup.getObjects();
            canvas.discardActiveGroup();
            objectsInGroup.forEach(function (object) {
                object.sendToBack();
            });
        }
    };

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
});//doc ready

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
    if (selectedObject && selectedObject.isType('i-text')) {

        let textString = $("#text-string");
        textString.val(selectedObject.getText());

        setBold(selectedObject.fontWeight);
        setItalic(selectedObject.fontStyle);
        setUnderline(selectedObject.underline);
        setFont(selectedObject.fontFamily);
        setColor(selectedObject.fill, true);

        //display text editor
        $("#show-text-editor").click();

    } else if (selectedObject && selectedObject.type === 'image') {
        //display image editor
        $("#texteditor").css('display', 'none');
        $("#imageeditor").css('display', 'block');
    }
}

function onSelectedCleared(e) {
    $("#texteditor").css('display', 'none');
    $("#text-string").val("").removeAttr('style');
    $("#imageeditor").css('display', 'none');
}

/**
 * START TEXT FUNCTIONALITY
 */
function setBold(style = false){
    let activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text' && !style) {
        activeObject.fontWeight = (activeObject.fontWeight === 'bold' ? '' : 'bold');
        canvas.renderAll();
    }

    let fw = parseInt($("#text-string").css('font-weight'));
    $("#text-string").css('font-weight',((style) ? style : (fw > 400) ? "" : "bold"));

}

function setItalic(style = false) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text' && !style) {
        activeObject.fontStyle = (activeObject.fontStyle === 'italic' ? '' : 'italic');
        canvas.renderAll();
    }

    let textString = $("#text-string");
    textString.css('font-style', ((style) ? style : (textString.css('font-style') === 'normal') ? 'italic' : 'normal'));
}

function setFont(font, style = false) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        activeObject.fontFamily = font;
        canvas.renderAll();
    }
    let textString = $("#text-string");
    textString.css('font-family', font);
}

function setUnderline(style = null){
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text' && style === null) {
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
    if (activeObject && activeObject.type === 'i-text' && !style) {
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

function createListItem(id, type){
    // CREATE LIST ITEM
    $("#objectHolder").append('<li class="list-group-item" id="'+id+'">' +
        type + ' <span style="float:right; text-space: 5px;">' +
        '<span type="button" class="fa fa-arrow-up"></span> ' +
        '<span type="button" class="fa fa-arrow-down"></span> ' +
        '<span type="button" class="fa fa-trash-alt remove-art"></span>' +
        '</span>' +
        '</li>');
}

function removeListItem(id){
    $("#"+id).remove();
}

function removeSessionItem(id){
    let storage = (sessionStorage.getItem('canvas')) ? JSON.parse(sessionStorage.getItem('canvas')) : {};

    // Check for name
    for(var a in storage){
        if(a.name && a.name === id){
            delete storage[a];
        }
    }
    sessionStorage.setItem('canvas',JSON.stringify(storage));
}

function removeItemByName(name){
    let objs = canvas.getObjects();
    for(var i in objs){
        if(objs[i]['name'] === name){
            canvas.remove(objs[i]);
        }
    }
}
