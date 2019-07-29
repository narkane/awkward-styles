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
            <v-text-field v-model="Xart" class="inputNumber" type="number" label="X: Art" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="Yart" class="inputNumber" type="number" label="Y: Art" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="Wart" class="inputNumber" type="number" label="Width" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field
              v-model="Hart"
              class="inputNumber"
              type="number"
              label="Height"
              pattern="\d+"
              required
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
            <v-text-field
              v-model="inchesXart"
              class="inputNumber"
              type="number"
              label="X inches"
              disabled
            ></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field
              v-model="inchesYart"
              class="inputNumber"
              type="number"
              label="Y inches"
              disabled
            ></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field
              v-model="inchesWart"
              class="inputNumber"
              type="number"
              label="width in."
              disabled
            ></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field
              v-model="inchesHart"
              class="inputNumber"
              type="number"
              label="height in."
              disabled
            ></v-text-field>
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
        <v-layout row>
          <v-flex xs1>
            <v-text-field v-model="template3d.x" label="3dX" :disabled="!mode"></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="template3d.y" label="3dY" :disabled="!mode"></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="template3d.width" label="3d width" :disabled="!mode"></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="template3d.height" label="3d height" :disabled="!mode"></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field
              v-model="template3d.rotation"
              label="3d rotation"
              @change="changeDraw"
              :disabled="!mode"
            ></v-text-field>
          </v-flex>
        </v-layout>
        <v-layout row>
          <v-flex xs1>
            <v-text-field v-model="art3d.x" label="X 3d" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="art3d.y" label="Y 3d" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="art3d.width" label="width 3d" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="art3d.height" label="height 3d" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field
              v-model="art3d.rotation"
              label="3d rotation"
              @change="changeDraw"
              :disabled="!mode"
            ></v-text-field>
          </v-flex>
        </v-layout>
        <v-layout row>
          <v-flex pa1 shrink id="care">
            Art Library
            <br />
            <!-- <carousel id="care"> -->
            <output id="list"></output>
            <!-- </carousel> -->
          </v-flex>
        </v-layout>
      </v-container>
      Sprites.length:{{sprites.length}}
      <br />
      LibraryNum:{{libraryNum}}
      <br />
      LibrarySelect:{{librarySelect}}
      <br />
      LibraryCurrent:{{libraryCurrent}}
      <br />
      <v-btn color="green" @click="savePrint">Save</v-btn>
      <v-btn color="orange" :hidden="!mode" @click="saveTemplate">Template</v-btn>
      <v-btn color="red">Cancel</v-btn>
    </v-form>
    <threedee :template="template3d" :art="art3d" ref="threed" />
  </div>
</template>

<script>
import * as PIXI from "pixi.js";
import threedee from "./threedee.vue";
import blob from "../assets/blob.png";
import axios from "axios";
import "vuetify/dist/vuetify.css";
import UploadButton from "vuetify-upload-button";
import { Carousel, Slide } from "vue-carousel";

export default {
  name: "HelloWorld",
  components: {
    threedee: threedee,
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
        //backgroundColor: 0x1099bb,
        transparent: 1
      }),
      mode: false,
      size: "XS",
      libraryNum: 0,
      libraryCurrent: 0,
      librarySelect: 0,
      // testTex: PIXI.utils.TextureCache["../assets/blob.png"],
      ratio: 32,
      sprites: [],
      artOriginalAspect: "pending",
      drawArea: new PIXI.Rectangle(0, 0, 200, 300),
      template3d: {
        x: 0,
        y: 0,
        width: 0,
        height: 0,
        rotation: 0
      },
      art3d: {
        artSrcArr: null,
        x: 0,
        y: 0,
        width: 0,
        height: 0
      }
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
      that.app.renderer.view.id = "frontview";
      // that.app.stage.anchor.set(0.5);
      that.app.renderer.view.style.left = that.drawArea.x + "px";
      that.app.renderer.view.style.top = that.drawArea.y + "px";
      that.app.renderer.resize(that.drawArea.width, that.drawArea.height);

      // setup sprites
      // that.createSprite(blob);
      // let pers = document.createElement("div");
      // pers.setAttribute("id", "perspective");
      // document.body.appendChild(pers);
      // pers.appendChild(that.app.view);
      document.body.appendChild(this.app.view);

      that.app.ticker.add(function(delta) {
        // that.sprites[that.librarySelect].rotation += 0.1 * delta;
      });
    },
    createSprite: function(art) {
      console.log("loading into this.sprites[" + this.libraryCurrent + "]");
      var that = this;

      this.sprites[this.libraryCurrent] = PIXI.Sprite.from(art);

      this.app.stage.addChild(this.sprites[this.libraryCurrent]);

      this.sprites[this.libraryCurrent].anchor.set(0.5);
      // this.sprites[this.libraryCurrent].x = this.app.screen.width / 2;
      // this.sprites[this.libraryCurrent].y = this.app.screen.height / 2;
      this.sprites[this.libraryCurrent].interactive = true;
      this.sprites[this.libraryCurrent].buttonMode = true;

      this.sprites[this.libraryCurrent]
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

      this.app.stage.addChild(this.sprites[this.libraryCurrent]);

      this.librarySelect = this.libraryCurrent;
      this.libraryCurrent++;

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
          that.art3d.x = this.x / that.drawArea.width;
          that.art3d.y = this.y / that.drawArea.height;
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
            span.id = that.libraryCurrent;
            span.onclick = () => {
              that.librarySelect = span.id;
            };
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
            that.createSprite(e.target.result);
            that.art3d.artSrcArr = e.target.result;
            that.$refs.threed.loadArt();
          };
        })(f);

        reader.readAsDataURL(f);
      }
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
      this.app.renderer.clear();
      this.app.renderer.view.style.left = this.drawArea.x + "px";
      this.app.renderer.view.style.top = this.drawArea.y + "px";
      this.app.renderer.resize(this.drawArea.width, this.drawArea.height);
      this.app.stage.pivot.x = -this.drawArea.width / 2;
      this.app.stage.pivot.y = -this.drawArea.height / 2;
      // this.template3d.x = this.drawArea.x;
      // this.template3d.y = this.drawArea.y;
      this.template3d.width = this.drawArea.width * (104 / 120);
      this.template3d.height = this.drawArea.height * (232 / 280);
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
    },
    savePrint: function() {
      let that = this;

      var lowX = this.app.stage.width;
      var lowY = this.app.stage.height;
      var totW = 0;
      var totH = 0;
      var allG = new PIXI.Container();

      var xTot = 0;
      var yTot = 0;
      for (var i = 0; i < this.sprites.length; i++) {
        xTot += this.sprites[i].x;
        yTot += this.sprites[i].y;

        allG.addChild(this.sprites[i]);
      }
      allG.x = xTot / this.sprites.length;
      allG.y = yTot / this.sprites.length;

      var printObj = {
        blob: this.app.renderer.extract.canvas(this.app.stage).toDataURL(),
        library_id: 0,
        x: allG.x / this.drawArea.width,
        y: allG.y / this.drawArea.height,
        width: allG.width,
        height: allG.height,
        dpi: this.ratio,
        pid: this.prodID,
        size: this.size
      };
      console.log(
        printObj.x +
          ", " +
          printObj.y +
          ", " +
          printObj.width +
          ", " +
          printObj.height +
          ", " +
          printObj.dpi +
          ", " +
          printObj.pid +
          ", " +
          printObj.size
      );

      this.app.renderer.extract.canvas(this.app.stage).toBlob(function(b) {
        var a = document.createElement("a");
        document.body.append(a);
        a.download = "print-file-prod" + that.prodID + ".png";
        a.href = URL.createObjectURL(b);
        a.click();
        a.remove();
        alert(JSON.stringify(printObj));
      }, "image/png");

      axios
        .post("/api/designs/print/create", printObj)
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
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

    // document.getElementById("perspective").appendChild(that.app.view);
    // that.sprites[]

    document
      .getElementById("list")
      .insertBefore(document.createElement("hr"), null);
    document
      .getElementById("files")
      .addEventListener("change", this.handleFileSelect, false);
  },
  computed: {
    Xart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.sprites[this.librarySelect].x;
        } else {
          return null;
        }
      },
      set(value) {
        this.sprites[this.librarySelect].x = value;
        this.art3d.x = value / this.drawArea.width;
      }
    },
    Yart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.sprites[this.librarySelect].y;
        } else {
          return null;
        }
      },
      set(value) {
        this.sprites[this.librarySelect].y = value;
        this.art3d.y = value / this.drawArea.height;
      }
    },
    Wart: {
      get() {
        if (this.libraryCurrent > 0) {
          console.log("width: " + this.sprites[this.librarySelect].width);
          this.art3d.width =
            this.sprites[this.librarySelect].width * (104 / 120);
          return this.sprites[this.librarySelect].width;
        } else {
          return null;
        }
      },
      set(value) {
        this.sprites[this.librarySelect].width = value;
        this.art3d.width = value;
      }
    },
    Hart: {
      get() {
        if (this.libraryCurrent > 0) {
          console.log("height: " + this.sprites[this.librarySelect].height);
          this.art3d.height =
            this.sprites[this.librarySelect].height * (232 / 280);
          return this.sprites[this.librarySelect].height;
        } else {
          return null;
        }
      },
      set(value) {
        this.sprites[this.librarySelect].height = value;
        this.art3d.height = value;
      }
    },
    inchesXart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.Xart / this.ratio;
        } else {
          return null;
        }
      },
      set(value) {
        // this.ratio = this.sprites[this.librarySelect].width / value;
        this.sprites[this.librarySelect].x = this.Xart(value) * this.ratio;
      }
    },
    inchesYart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.Yart / this.ratio;
        } else {
          return null;
        }
      },
      set(value) {
        // this.ratio = this.sprites[this.librarySelect].width / value;
        this.sprites[this.librarySelect].y = this.Yart(value) * this.ratio;
      }
    },
    inchesWart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.sprites[this.librarySelect].width / this.ratio;
        } else {
          return null;
        }
      },
      set(value) {
        // this.ratio = this.sprites[this.librarySelect].width / value;
        this.sprites[this.librarySelect].width = value * this.ratio;
      }
    },
    inchesHart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.sprites[this.librarySelect].height / this.ratio;
        } else {
          return null;
        }
      },
      set(value) {
        // this.ratio = this.sprites[this.librarySelect].height / value;
        this.sprites[this.librarySelect].height = value * this.ratio;
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
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
body {
  transform: perspective(30px);
  transform-style: preserve-3d;
}
#data {
  float: right;
  width: 800px;
  height: 200px;
}
canvas {
  /* transform: translateZ(10px); */
  border: 2px dashed lightblue;
  /* background-color: rgba(0, 0, 255, 0.1); */
  position: absolute;
  top: 120px;
  left: 380px;
  margin: 2px 138px;
  /* z-index: -10; */
}
#frontview {
  margin: 123px 138px;
  left: 0px;
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

#care {
  border: 2px inset gray;
  background-color: rgba(150, 200, 255, 0.1);
  border-width: 0px 3px 0px 3px;
  border-radius: 10px;
  overflow: hidden;
  padding: 5px;
  min-width: 50px;
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
.inputnumber input[type="number"] {
  -moz-appearance: textfield;
}
.inputNumber input::-webkit-outer-spin-button,
.inputNumber input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
</style>