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
            <v-text-field v-model="Wart" label="Width" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="Hart" label="Height" required></v-text-field>
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
            <v-text-field v-model="inchesXart" label="X inches" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesYart" label="Y inches" disabled></v-text-field>
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
        <v-layout row fill-height>
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
      librarySelect: 0,
      currdeg: 0,
      // testTex: PIXI.utils.TextureCache["../assets/blob.png"],
      ratio: 32,
      sprites: [],
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
      // that.createSprite(blob);

      that.app.ticker.add(function(delta) {
        // that.sprites[that.librarySelect].rotation += 0.1 * delta;
      });
    },
    createSprite: function(art) {
      // var that = this;
      console.log("loading into this.sprites[" + this.libraryCurrent + "]");
      this.sprites[this.libraryCurrent] = PIXI.Sprite.from(art);
      this.app.stage.addChild(this.sprites[this.libraryCurrent]);

      this.sprites[this.libraryCurrent].anchor.set(0.5);
      this.sprites[this.libraryCurrent].x = this.app.screen.width / 2;
      this.sprites[this.libraryCurrent].y = this.app.screen.height / 2;
      // this.sprites[this.libraryCurrent].position.set(
      //   that.app.screen.width / 2,
      //   that.app.screen.height / 2
      // );
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

      // this.sprites[this.libraryCurrent].scale.y *= 1.25;

      // that.app.stage.addChild(that.drawArea);
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
            that.createSprite(e.target.result);
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
    addLibraryArt: function(art) {
      // axios.post;
    },
    // selectLibraryArt: function(artID) {
    //   this.librarySelect = artID;
    //   alert(artID);
    // },
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
      // var graphics = new PIXI.Graphics();

      // graphics.beginFill(0xffff00);

      // set the line style to have a width of 5 and set the color to red
      // graphics.lineStyle(0, 0xff0000);

      // draw a rectangle
      // graphics.drawRect(0, 0, this.app.screen.width, this.app.screen.height);
      // PIXI.Rectangle.this.app.stage.addChild(graphics);

      var lowX = this.app.stage.width;
      var lowY = this.app.stage.height;
      var totW = 0;
      var totH = 0;
      var allG = new PIXI.Container();

      for (var i = 0; i < this.sprites.length; i++) {
        if (lowX > this.sprites[i].x) {
          lowX = this.sprites[i].x;
        }
        if (lowY > this.sprites[i].y) {
          lowY = this.sprites[i].y;
        }
        // if (this.sprites[i].width > this.drawArea.width) {
        //   this.sprites[i].filterArea(
        //     new PIXI.Rectangle(
        //       0,
        //       0,
        //       this.drawArea.width,
        //       this.sprites[i].height
        //     )
        //   );
        // }
        // if (this.sprites[i].height > this.drawArea.height) {
        //   this.sprites[i].filterArea(
        //     new PIXI.Rectangle(
        //       0,
        //       0,
        //       this.sprites[i].width,
        //       this.drawArea.height
        //     )
        //   );
        // }
        allG.addChild(this.sprites[i]);
        // if (totW < this.sprites[i].width) {
        //   totW = this.sprites[i].width;
        // }
        // if (totH < this.sprites[i].height) {
        //   totH = this.sprites[i].height;
        // }
      }
      // var texture = new PIXI.BaseTexture(allG);
      // var texture2 = new PIXI.Texture(
      //   texture,
      //   new PIXI.Rectangle(0, 0, this.drawArea.width, this.drawArea.height)
      // );
      // var sprite = new PIXI.Sprite(texture2);
      // this.app.stage.addChild(sprite);

      // if (allG.width > this.drawArea.width) {
      //   allG.filterArea(
      //     new PIXI.Rectangle(0, 0, this.drawArea.width, allG.height)
      //   );
      // }
      // if (allG.height > this.drawArea.height) {
      //   allG.filterArea(
      //     new PIXI.Rectangle(0, 0, allG.width, this.drawArea.height)
      //   );
      // }

      // this.libraryNum++;
      // this.sprites[this.sprites.length] = allG;
      // this.librarySelect = this.libraryCurrent;
      // this.libraryCurrent++;
      // this.app.stage.addChild(this.sprites[this.libraryCurrent]);
      // this.createSprite(allG);

      //get %of offset with repect to (center!)
      var printObj = {
        blob: null,
        library_id: 0,
        x: lowX / this.drawArea.width,
        y: lowY / this.drawArea.height,
        width: allG.width,
        height: allG.height,
        dpi: this.ratio,
        pid: this.prodID,
        size: this.size
      };

      // allG.calculateBounds();
      this.app.stage.addChild(allG);

      // render right now
      // this.app.renderer.render(allG);

      // capture immediately
      // var data = this.app.renderer.view.toDataURL("image/png", 1);
      // alert(data);
      // var img = document.createElement("img");
      // img.id = "printfile";
      // document.body.append(img);
      // img.setAttribute("src", data);
      // $("img").attr("src", data);

      this.app.renderer.extract.canvas(this.app.stage).toBlob(function(b) {
        var a = document.createElement("a");
        document.body.append(a);
        a.download = "print-file-prod" + that.prodID + ".png";
        a.href = URL.createObjectURL(b);
        a.click();
        a.remove();
        var reader = new FileReader();
        printObj["blob"] = reader.readAsBinaryString(b);
        alert(JSON.stringify(printObj));
        alert(JSON.stringify(printObj.blob));
        axios
          .post("/api/designs/print/create", printObj)
          .then(function(response) {
            console.log(response);
          })
          .catch(function(error) {
            console.log(error);
          });
      }, "image/png");
    }
  },
  created() {
    // this.sprites[0] = PIXI.Sprite.from(blob);
    //set to "template mode" if no template
    this.getTemplateAxios();
    this.init();
  },
  mounted() {
    var that = this;

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
          console.log("libraryCurrent: " + this.libraryCurrent);
          console.log("librarySelect: " + this.librarySelect);
          return this.sprites[this.librarySelect].x;
        } else {
          console.log(this.libraryCurrent);
          return "N/A";
        }
      },
      set(value) {
        this.sprites[this.librarySelect].x = value;
      }
    },
    Yart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.sprites[this.librarySelect].y;
        } else {
          return "N/A";
        }
      },
      set(value) {
        this.sprites[this.librarySelect].y = value;
      }
    },
    Wart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.sprites[this.librarySelect].width;
        } else {
          return "N/A";
        }
      },
      set(value) {
        this.sprites[this.librarySelect].width = value;
      }
    },
    Hart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.sprites[this.librarySelect].height;
        } else {
          return "N/A";
        }
      },
      set(value) {
        this.sprites[this.librarySelect].height = value;
      }
    },
    inchesXart: {
      get() {
        if (this.libraryCurrent > 0) {
          return this.Xart / this.ratio;
        } else {
          return "N/A";
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
          return "N/A";
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
          return "N/A";
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
          return "N/A";
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
</style>