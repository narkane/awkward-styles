var stage;
var trData = [];
var currentActiveObj;

// https://konvajs.org/docs/data_and_serialization/Best_Practices.html

var ArtItemType = {
  IMAGE: 1,
  TEXT: 2,
  SVG: 3,
};

class ArtItem {
  loadText(stage,src){
    var layer1 = new Konva.Layer();
    var tr1 = getTr(layer1);
    var text1 = new Konva.Text({
      x: 50,
      y: 70,
      fontSize: 18, 
      text: src,
      fill: '#ffffff',
      draggable: true,
    });
    currentActiveObj = text1;
    text1.on('mousedown', function() {
      layer1.moveToTop();
      deselectAll();
      currentActiveObj = text1;
      var tr1 = getTr(layer1);
      layer1.add(tr1);
      trData.push(tr1);
      tr1.attachTo(text1);
    });
    text1.on('mouseenter', function () {
      stage.container().style.cursor = 'move';
    });
    text1.on('mouseleave', function () {
      stage.container().style.cursor = 'default';
    });

    layer1.add(tr1);
    trData.push(tr1);
    layer1.add(text1);
    tr1.attachTo(text1);
    stage.add(layer1);
  }

  loadImage(stage,src){
    var layer = new Konva.Layer();
    var tr = getTr(layer);
    var imageObj = new Image();
    imageObj.onload = function () {
        var yoda = new Konva.Image({
          x: 50,
          y: 50,
          image: imageObj,
          width: 150, 
          height: 150,
          draggable: true,
        });
        // add the shape to the layer
        currentActiveObj = imageObj;
        yoda.on('mousedown', function() {
          layer.moveToTop();
          deselectAll();
          currentActiveObj = imageObj;
          var tr = getTr(layer);
          layer.add(tr);
          trData.push(tr);
          tr.attachTo(yoda);
        });

        yoda.on('mouseenter', function () {
          stage.container().style.cursor = 'move';
        });
        yoda.on('mouseleave', function () {
          stage.container().style.cursor = 'default';
        });

        layer.add(tr);
        trData.push(tr);
        layer.add(yoda);
        tr.attachTo(yoda);
        stage.add(layer);
      };
      imageObj.src = src;
  }

  constructor(stage, type, src) {
    switch(type){
      case ArtItemType.IMAGE:
        this.loadImage(stage,src);
      break;
      case ArtItemType.TEXT:
        this.loadText(stage,src);
      break;
    }
  }
}


function getTr(layer) {
  var tr = new Konva.Transformer({rotateAnchorOffset:20,anchorSize: 5, });
  var delImage = new Image();
  //delImage.src = '../mockupgen_assets/img/delete.png';
  delImage.src = '';
  delImage.width = 16;
  delImage.height = 16;
  delImage.onload = function(){
  var deleteButton = new Konva.Image({
    x: -8,
    y: -8,
    image:delImage,
  });
  tr.add(deleteButton);
  deleteButton.on('mouseenter', function () {
    stage.container().style.cursor = 'pointer';
  });
  deleteButton.on('mouseleave', function () {
    stage.container().style.cursor = 'default';
  });

  deleteButton.on('click', () => {
    layer.destroyChildren();
    layer.draw();
    })
  }
  return tr;
}    
function deselectAll(){
  var i;
    for (i = 0; i < trData.length; i++) { 
      trData[i].destroy();
      stage.draw();
    }   
}
function myFunction(src, type,id) {
    //$('.modal').modal('hide');
    //if(stage == undefined)
      stage = new Konva.Stage({
        container: 'container'+id
      });
    var width = window.innerWidth;
    var height = window.innerHeight;
    deselectAll();
    var canvas_parrent = document.getElementById("canvas_parrent"+id);    
    stage.width(canvas_parrent.clientWidth);
    stage.height(canvas_parrent.clientHeight);
    let artItem = new ArtItem(stage,type,src);
    

    stage.on('click', function(e) {
      // e.target is a clicked Konva.Shape or current stage if you clicked on empty space
      deselectAll();
    });
  }

function setColor(color){
  if(currentActiveObj instanceof Konva.Text){
    currentActiveObj.fill(color);
    stage.draw();
}

}


function setShirtImage(path,id){
var stage1 = new Konva.Stage({
container: 'container_shirt'+id
});
var canvas_parrent = document.getElementById("container_shirt"+id); 
stage1.width(canvas_parrent.clientWidth);
stage1.height(canvas_parrent.clientHeight);

var layer1 = new Konva.Layer();
stage1.add(layer1);
Konva.Image.fromURL(path, function(firstImage){

firstImage.position({
x: 0,
y: 0
});
firstImage.setAttrs({
name: 'background',
width: canvas_parrent.clientWidth,
height: canvas_parrent.clientHeight,
draggable: false,
});
layer1.add(firstImage);
layer1.draw();
}); 
}


//  function showImagetoMainScreen(id){
//                          deselectAll();
//                         html2canvas(document.getElementById("print_canvas"+id)).then(function(canvas) {
                                         
//                                           $('#style_'+id).attr('src',canvas.toDataURL());
//                                           $("#myModal"+id+" .close").click();

//                         });
//  }

/*document.getElementById("save").onclick = function(this){
      deselectAll();

      html2canvas(document.getElementById("print_canvas")).then(canvas => {
        document.getElementById("style_"+this.id).appendChild(canvas)
    });
};*/

