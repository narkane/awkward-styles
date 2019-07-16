<template>
  <div id="data">
    <v-form ref="form">
      <v-container fluid>
        <v-layout row>
          <v-flex xs3>
            <input type="file" id="files" name="files[]" multiple />
          </v-flex>
          <v-flex xs5 />
        </v-layout>
        <v-layout row>
          <v-flex xs1>
            <select v-model="size" @change="getTemplateAxios" style="border:2px inset darkgrey">
              <option value="XS">XS</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="2XL">2XL</option>
              <option value="3XL">3XL</option>
              <option value="4XL">4XL</option>
            </select>
          </v-flex>
          <v-flex xs7>
            <input type="checkbox" name="mode" v-model="mode" />
            <label for="mode">: Template Mode</label>
          </v-flex>
        </v-layout>
        <v-layout row>
          <v-flex xs1>
            <v-text-field v-model="Xart" label="X: Art" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="Yart" label="Y: Art" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="testSprite.width" label="Width" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="testSprite.height" label="Height" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="ratio" label="ratio" :disabled="!mode" />
          </v-flex>
        </v-layout>
        <v-layout row>
          <v-flex xs1>
            <v-text-field v-model="testSprite.x / ratio" label="X inches" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="testSprite.y / ratio" label="Y inches" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesWart" label="width in." disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesHart" label="height in." disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="artOriginalAspect" label="aspect" disabled></v-text-field>
          </v-flex>
        </v-layout>
        <v-layout row>
          <v-flex xs1>
            <v-text-field v-model="drawArea.x" label="X" @change="changeDraw" :disabled="!mode"></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="drawArea.y" label="Y" @change="changeDraw" :disabled="!mode"></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field
              v-model="drawArea.width"
              label="width"
              @change="changeDraw"
              :disabled="!mode"
            ></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field
              v-model="drawArea.height"
              label="height"
              @change="changeDraw"
              :disabled="!mode"
            ></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="ratio" label="ratio" :disabled="!mode" />
          </v-flex>
        </v-layout>
        <v-layout row>
          <v-flex xs1>
            <v-text-field v-model="drawArea.x / ratio" label="X inches" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="drawArea.x / ratio" label="Y inches" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesWtemp" label="width in." :disabled="!mode"></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesHtemp" label="height in." :disabled="!mode"></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
        </v-layout>
        <v-layout>
          <v-flex>
            <carousel id="care">
              <output id="list"></output>
            </carousel>
          </v-flex>
          <!-- <div class="container">
              <div class="carousel">
                <output id="list"></output>
              </div>
            </div>
            <div class="next">Next</div>
          <div class="prev">Prev</div>-->
        </v-layout>
      </v-container>
      <v-btn color="green" @click="savePrint">Save</v-btn>
      <v-btn color="orange" :hidden="!mode" @click="saveTemplate">Template</v-btn>
      <v-btn color="red">Cancel</v-btn>
    </v-form>
  </div>
</template>

<script>
import * as PIXI from "pixi.js";
import blob from "../assets/blob.png";
import axios from "axios";
import "vuetify/dist/vuetify.css";
import UploadButton from "vuetify-upload-button";
import { Carousel, Slide } from "vue-carousel";

export default {
  name: "HelloWorld",
  components: {
    "upload-btn": UploadButton,
    carousel: Carousel,
    slide: Slide
  },
  data() {
    return {
      type: "WebGL",
      app: new PIXI.Application({
        width: 600,
        height: 800,
        backgroundColor: 0x1099bb,
        transparent: 1
      }),
      mode: false,
      size: "XS",
      libraryNum: 0,
      libraryCurrent: 0,
      currdeg: 0,
      // testTex: PIXI.utils.TextureCache["../assets/blob.png"],
      ratio: 32,
      testSprite: PIXI.Sprite.from(blob),
      artOriginalAspect: "pending",
      drawArea: new PIXI.Rectangle(0, 0, 200, 300)
    };
  },
  props: {
    prodID: String
  },
  methods: {
    init: function() {
      var that = this;

      if (!PIXI.utils.isWebGLSupported()) {
        that.type = "canvas";
      }
      //initial changing of drawing area (renderer.view) to rect deminsions
      that.app.renderer.view.style.left = that.drawArea.x + "px";
      that.app.renderer.view.style.top = that.drawArea.y + "px";
      that.app.renderer.resize(that.drawArea.width, that.drawArea.height);

      document.body.appendChild(that.app.view);

      // setup sprites
      // that.artOriginalAspect = that.testSprite.width / that.testSprite.height;
      // alert(that.artOriginalAspect);
      that.testSprite.anchor.set(0.5);
      that.testSprite.x = that.app.screen.width / 2;
      that.testSprite.y = that.app.screen.height / 2;
      // that.testSprite.position.set(
      //   that.app.screen.width / 2,
      //   that.app.screen.height / 2
      // );
      that.testSprite.interactive = true;
      that.testSprite.buttonMode = true;

      that.testSprite
        .on("mousedown", onDragStart)
        .on("touchstart", onDragStart)
        // events for drag end
        .on("mouseup", onDragEnd)
        .on("mouseupoutside", onDragEnd)
        .on("touchend", onDragEnd)
        .on("touchendoutside", onDragEnd)
        // events for drag move
        .on("mousemove", onDragMove)
        .on("touchmove", onDragMove);

      // that.testSprite.scale.y *= 1.25;

      // that.app.stage.addChild(that.drawArea);
      that.app.stage.addChild(that.testSprite);

      that.app.ticker.add(function(delta) {
        // that.testSprite.rotation += 0.1 * delta;
      });

      function onDragStart(event) {
        // store a reference to the data
        // the reason for this is because of multitouch
        // we want to track the movement of this particular touch
        this.data = event.data;
        this.alpha = 0.5;
        this.dragging = true;
      }

      function onDragEnd() {
        this.alpha = 1;

        this.dragging = false;

        // set the interaction data to null
        this.data = null;
      }

      function onDragMove() {
        if (this.dragging) {
          var newPosition = this.data.getLocalPosition(this.parent);
          this.x = newPosition.x;
          this.y = newPosition.y;
        }
      }
    },
    handleFileSelect: function(evt) {
      var that = this;
      var files = evt.target.files; // FileList object
      that.libraryNum += files.length;

      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; (f = files[i]); i++) {
        // Only process image files.
        if (!f.type.match("image.*")) {
          continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var span = document.createElement("slide");
            // span.className = "item";
            span.id = that.libraryCurrent;
            // span.style = that.styleCarousel(that.libraryCurrent);
            span.innerHTML = [
              '<img class="thumb" src="',
              e.target.result,
              '" />',
              escape(theFile.name)
            ].join("");
            document.getElementById("list").insertBefore(span, null);
            document
              .getElementById("list")
              .insertBefore(document.createElement("hr"), null);
            that.libraryCurrent++;
          };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
      // for (var i = 0; i < that.libraryNum; i++) {
      //   var span = document.getElementById(i);
      //   span.style = that.styleCarousel(i);
      // }
    },
    getTemplateAxios: function() {
      var that = this;

      axios
        .get("/api/template/" + this.prodID + "/" + this.size)
        .then(function(response) {
          console.log(response);
          if (response.data.pid === 0) {
            that.mode = true;
          } else {
            that.mode = false;
          }
          that.drawArea.x = response.data.x;
          that.drawArea.y = response.data.y;
          that.drawArea.width = response.data.width;
          that.drawArea.height = response.data.height;
          that.ratio = response.data.dpi;
          that.changeDraw();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    saveTemplateAxios: function(template) {
      axios
        .post("/api/template", template)
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    changeDraw: function() {
      // console.log("CHANGE!");
      this.app.renderer.clear();
      // that.app.renderer.screen
      // this.drawArea.width = value;
      this.app.renderer.view.style.left = this.drawArea.x + "px";
      this.app.renderer.view.style.top = this.drawArea.y + "px";
      this.app.renderer.resize(this.drawArea.width, this.drawArea.height);
    },
    saveTemplate: function() {
      var templateObj = {
        x: this.drawArea.x,
        y: this.drawArea.y,
        width: this.drawArea.width,
        height: this.drawArea.height,
        dpi: this.ratio,
        pid: this.prodID,
        size: this.size
      };
      this.saveTemplateAxios(templateObj);
      // alert(JSON.stringify(templateObj));
    },
    savePrint: function() {
      let that = this;

      //capture entire printable area
      var graphics = new PIXI.Graphics();

      // graphics.beginFill(0xffff00);

      // set the line style to have a width of 5 and set the color to red
      graphics.lineStyle(0, 0xff0000);

      // draw a rectangle
      graphics.drawRect(0, 0, this.app.screen.width, this.app.screen.height);

      this.app.stage.addChild(graphics);

      this.app.renderer.extract.canvas(this.app.stage).toBlob(function(b) {
        var a = document.createElement("a");
        document.body.append(a);
        a.download = "print-file-prod" + that.prodID + ".png";
        a.href = URL.createObjectURL(b);
        a.click();
        a.remove();
      }, "image/png");

      var printObj = {
        //get %of offset with repect to (top,left)
        x: (this.testSprite.x + testSprite.width / 2) / this.drawArea.width,
        y: (this.testSprite.y + testSprite.height / 2) / this.drawArea.height,
        width: this.testSprite.width,
        height: this.testSprite.height,
        dpi: this.ratio,
        pid: this.prodID,
        size: this.size
      };

      alert(printObj);
    },
    styleCarousel: function(itemNum) {
      console.log("itemnum / total = " + itemNum + " / " + this.libraryNum);
      return (
        "transform: rotateY(" +
        itemNum * (360 / this.libraryNum) +
        "deg) translateZ(100px);"
      );
    },
    rotate: function(e) {
      var carousel = $(".carousel");

      if (e.data.d == "n") {
        this.currdeg = this.currdeg - 360 / this.libraryNum;
      }
      if (e.data.d == "p") {
        this.currdeg = this.currdeg + 360 / this.libraryNum;
      }
      carousel.css({
        "-webkit-transform": "rotateY(" + this.currdeg + "deg)",
        "-moz-transform": "rotateY(" + this.currdeg + "deg)",
        "-o-transform": "rotateY(" + this.currdeg + "deg)",
        transform: "rotateY(" + this.currdeg + "deg)"
      });
    }
  },
  created() {
    //set to "template mode" if no template
    this.getTemplateAxios();
    this.init();
  },
  mounted() {
    var that = this;

    document
      .getElementById("list")
      .insertBefore(document.createElement("hr"), null);
    document
      .getElementById("files")
      .addEventListener("change", this.handleFileSelect, false);

    $(".next").on("click", { d: "n" }, that.rotate);
    $(".prev").on("click", { d: "p" }, that.rotate);
  },
  computed: {
    Xart: {
      get() {
        return this.testSprite.x - this.testSprite.width / 2;
      },
      set(value) {
        this.testSprite.x = value + this.testSprite.width / 2;
      }
    },
    Yart: {
      get() {
        return this.testSprite.y - this.testSprite.height / 2;
      },
      set(value) {
        this.testSprite.y = value + this.testSprite.height / 2;
      }
    },
    inchesWtemp: {
      get() {
        return this.drawArea.width / this.ratio;
      },
      set(value) {
        this.ratio = this.drawArea.width / value;
        // this.drawArea.width = value * this.ratio;
      }
    },
    inchesHtemp: {
      get() {
        return this.drawArea.height / this.ratio;
      },
      set(value) {
        this.ratio = this.drawArea.height / value;
        // this.drawArea.height = value * this.ratio;
      }
    },
    inchesWart: {
      get() {
        return this.testSprite.width / this.ratio;
      },
      set(value) {
        // this.ratio = this.testSprite.width / value;
        this.testSprite.width = value * this.ratio;
      }
    },
    inchesHart: {
      get() {
        return this.testSprite.height / this.ratio;
      },
      set(value) {
        // this.ratio = this.testSprite.height / value;
        this.testSprite.height = value * this.ratio;
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
#data {
  float: right;
  width: 800px;
  height: 200px;
}
canvas {
  border: 2px dashed lightblue;
  background-color: rgba(0, 0, 255, 0.1);
  position: relative;
  top: 0px;
  margin: 2px 138px;
  /* z-index: -10; */
}
input {
  text-align: center;
  color: black;
}
#upload {
  border: 1px solid black;
  filter: drop-shadow(2px 1px 2px #222244);
  width: 100%;
  background: orange;
}
.thumb {
  text-align: left;
  height: 25px;
  width: 25px;
  border: 1px solid #000;
  margin: 0 5px;
}

.carousel .container {
  margin: 0 auto;
  width: 250px;
  height: 200px;
  position: relative;
  perspective: 1000px;
}

.carousel {
  height: 100%;
  width: 100%;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;
}

.item {
  display: block;
  position: absolute;
  background: #000;
  /* width: 50px; */
  /* height: 50px; */
  padding: 2px;
  /* line-height: 200px;
  font-size: 5em; */
  text-align: center;
  color: #fff;
  opacity: 0.95;
  border-radius: 10px;
}

.next,
.prev {
  color: #444;
  position: absolute;
  top: 100px;
  padding: 1em 2em;
  cursor: pointer;
  background: #ccc;
  border-radius: 5px;
  border-top: 1px solid #fff;
  box-shadow: 0 5px 0 #999;
  transition: box-shadow 0.1s, top 0.1s;
}
.next:hover,
.prev:hover {
  color: #000;
}
.next:active,
.prev:active {
  top: 104px;
  box-shadow: 0 1px 0 #999;
}
.next {
  right: 5em;
}
.prev {
  left: 5em;
}

#care {
  border: 1px solid black;
  border-radius: 10px;
  overflow: hidden;
}
#list {
  /* display: flex; */
  /* flex-wrap: nowrap; */
  word-wrap: none;
  overflow: hidden;
  /* flex-wrap: nowrap; */
  /* justify-content: flex-start; */
  text-align: left;
}
</style>