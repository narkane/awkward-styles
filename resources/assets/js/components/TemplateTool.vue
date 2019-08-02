<template>
  <div>
    <v-form ref="form" class="data">
      <v-container fluid id="cont">
        <TemplateRow
          ref="trow1"
          :getTemplate="getTemplateAxios"
          :setRatSize="setRatSize"
          :dataChange="dataChange"
          :rt="getTempNewSize"
        ></TemplateRow>
        <v-layout row id="selection">
          <h4>Template: {{librarySelect}}</h4>
          <v-btn fab @click="addRow" color="white">
            <v-icon>+</v-icon>
          </v-btn>
          <v-btn fab id="minus" @click="()=>{
            removeTemplate();}" color="white">
            <v-icon>_</v-icon>
          </v-btn>
          <button id="button1" type="button" @click="selectRadio(1)">Select 1</button>
        </v-layout>
      </v-container>
      <button id="save" type="button" @click="saveTemplate">
        Save
        <hr id="hr" />
        Pid: {{prodID}}
        <hr id="hr" />
        Size: {{size}}
      </button>
    </v-form>
    <v-btn fab @click="getTempNewSize" color="white">
      <v-icon>NEW</v-icon>
    </v-btn>
    <hr />
    Shapes length(+1): {{shapes.length}}
    <hr />
    Geo length(+1): {{geo.length}}
  </div>
</template>

<script>
import * as PIXI from "pixi.js";
import axios from "axios";
import TemplateRow from "./TemplateRow.vue";
import blob from "../assets/3drawarea.png";
import "vuetify/dist/vuetify.css";

export default {
  name: "TemplateTool",
  components: {
    TemplateRow
  },
  data() {
    return {
      type: "WebGL",
      app: new PIXI.Application({
        width: 400,
        height: 400,
        //backgroundColor: 0x1099bb,
        transparent: 1
      }),
      // drawArea: new PIXI.Rectangle(0, 0, 200, 300),
      shapes: [],
      sprites: [],
      libraryCurrent: 0,
      librarySelect: 0,
      graphics: new PIXI.Graphics(),
      geo: [],
      ratio: 0,
      size: "XS"
    };
  },
  methods: {
    returnShape: function() {
      print(this.$refs.trow1.template.geo.shape);
    },
    init: function() {
      var that = this;

      if (!PIXI.utils.isWebGLSupported()) {
        that.type = "canvas";
      }

      // this.$refs.trow1.template = {
      //   // productId: 0,
      //   geo: {},
      //   ratio: 0
      // };

      document.body.appendChild(this.app.view);
      document.body.lastElementChild.setAttribute("id", "drawingboard");

      // this.app.stage.interactive = true;
      // this.app.stage.buttonMode = true;

      this.createSprite(blob);
      this.sprites[0].x = 0;
      this.sprites[0].y = 0;
      this.sprites.zOrder = 100;
      this.sprites[0].width = this.app.screen.width;
      this.sprites[0].height = this.app.screen.height;
      this.sprites[0].interactive = true;
      this.sprites[0].buttonMode = true;
      // this.sprites[0].transparent = 1;
      this.sprites[0].alpha = 0;
      this.sprites[0]
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

      // this.libraryCurrent = 1;
      console.log(that.libraryCurrent);
      try {
        this.createShape(this.libraryCurrent);
      } catch (e) {
        console.log("NO GEO!!!! BREAKY: " + e);
      }

      that.app.ticker.add(function(delta) {
        // that.doAll(i => {
        //   that.shapes[i].y *= Math.sin(delta);
        // });
        // that.sprites[that.librarySelect].rotation += 0.1 * delta;
      });
      function onDragStart(event) {
        if (that.libraryCurrent == 1) {
          that.addRow();
        }
        that.$refs.trow1.template.geo = that.shapes[that.librarySelect];
        that.geo[that.librarySelect].clear();
        // store a reference to the data
        // the reason for this is because of multitouch
        // we want to track the movement of this particular touch
        this.data = event.data;

        // that.alpha = 0.5;
        that.geo[that.librarySelect].alpha = 0.5;
        var newPosition = this.data.getLocalPosition(this.parent);
        that.shapes[that.librarySelect].x = Math.round(newPosition.x);
        that.shapes[that.librarySelect].y = Math.round(newPosition.y);
        that.shapes[that.librarySelect].width = 0;
        that.shapes[that.librarySelect].height = 0;

        this.dragging = true;
      }
      function onDragEnd() {
        // that.alpha = 1;

        this.dragging = false;

        // set the interaction data to null
        this.data = null;

        that.geo[that.librarySelect].alpha = 1;
      }
      function onDragMove() {
        if (this.dragging) {
          that.geo[that.librarySelect].clear();

          var newPosition = this.data.getLocalPosition(this.parent);

          var offX =
            Math.round(newPosition.x) - that.shapes[that.librarySelect].x;
          var offY =
            Math.round(newPosition.y) - that.shapes[that.librarySelect].y;

          if (that.shapes[that.librarySelect].shape == 1) {
            let avg = (offX + offY) / 2;
            that.shapes[that.librarySelect].width = avg;
            that.shapes[that.librarySelect].height = avg;
          } else {
            that.shapes[that.librarySelect].width = offX;
            that.shapes[that.librarySelect].height = offY;
          }

          // that.$refs.trow1.setW(that.shapes[that.librarySelect].width);
          // that.$refs.trow1.setH(that.shapes[that.librarySelect].height);
          // draw a rectangle
          that.dataDraw(that.librarySelect);

          that.app.stage.addChild(that.geo[that.librarySelect]);
        }
      }
    },
    dataChange: function(data) {
      console.log("DATA CHAAAAAANGEEEEE!!!~");
      this.geo[this.librarySelect].clear();

      this.shapes[this.librarySelect].x = parseFloat(data.x);
      this.shapes[this.librarySelect].y = parseFloat(data.y);
      this.shapes[this.librarySelect].width = parseFloat(data.width);
      this.shapes[this.librarySelect].height = parseFloat(data.height);
      this.shapes[this.librarySelect].shape = parseInt(data.shape);

      this.dataDraw(this.librarySelect);
    },
    doAll: function(cbFunc) {
      for (let i = 1; i < this.shapes.length; i++) {
        cbFunc(i);
      }
      this.libraryCurrent = this.shapes.length;
      this.select(this.libraryCurrent - 1);
    },
    dataDraw: function(i) {
      // this.geo[i] = new PIXI.Graphics();

      // this.geo[i].lineStyle(2, 0xffffff);
      // this.geo[i].beginFill(0x44aaff, 0.25);
      // this.geo[i].transparent = 1;
      // this.geo[i].alpha = 0.1;
      // this.geo[i].clear();

      // console.log(this.shapes);
      switch (this.shapes[i].shape) {
        case 1:
          //Set width and height to actual width and height
          let w = this.shapes[i].width / 2;
          let h = this.shapes[i].height / 2;
          //Set radius from w and h
          let radius =
            Math.sqrt(Math.pow(w, 2) + Math.pow(h, 2)) / Math.sqrt(2);
          //Set x and y to left and top
          let x = this.shapes[i].x + radius;
          let y = this.shapes[i].y + radius;

          this.geo[i].drawCircle(x, y, radius);
          break;
        // case 3:
        // this.geo[i].draw;
        // break;
        case 4:
          this.shapes[i].shape = 4;
          this.geo[i].drawRect(
            this.shapes[i].x,
            this.shapes[i].y,
            this.shapes[i].width,
            this.shapes[i].height
          );
          break;
        default:
          this.shapes[i].shape = 4;
          this.geo[i].drawRect(
            this.shapes[i].x,
            this.shapes[i].y,
            this.shapes[i].width,
            this.shapes[i].height
          );
          break;
      }
      this.app.stage.addChild(this.geo[i]);

      this.libraryCurrent = this.shapes.length;
    },
    setRatSize: function(rat, sz) {
      this.ratio = rat;
      this.size = sz;
    },
    createSprite: function(art) {
      console.log("loading into this.sprites[" + this.libraryCurrent + "]");

      this.sprites[this.libraryCurrent] = PIXI.Sprite.from(art);

      this.sprites[this.libraryCurrent].width = 0;
      this.sprites[this.libraryCurrent].transparent = 1;
      this.sprites[this.libraryCurrent].alpha = 0;

      this.sprites[this.libraryCurrent].on("touchstart", () => {
        this.select(this.libraryCurrent);
      });

      this.app.stage.addChild(this.sprites[this.libraryCurrent]);

      this.librarySelect = this.libraryCurrent;
      this.libraryCurrent++;
    },
    createShape: function(i) {
      console.log("loading into this.shapes[" + i + "]");
      this.shapes[i] = new PIXI.Rectangle();
      this.shapes[i].width = 0;

      this.createGeo(i);

      this.libraryCurrent = this.shapes.length;
      console.log("CHECKING LIBRARY CURRENT(next): " + this.libraryCurrent);
      this.select(i);
    },
    createGeo: function(i) {
      this.geo[i] = new PIXI.Graphics();
      this.geo[i].lineStyle(2, 0xffffff);
      this.geo[i].beginFill(0x44aaff, 0.25);
      // console.log("GEOS: ");
      // console.log(this.geo);

      this.dataDraw(i);
    },
    addRow: function() {
      this.libraryCurrent = this.shapes.length;
      var newSel = this.createRadioElement(this.libraryCurrent);
      newSel.onclick = event => {
        this.selectRadio(event.target.value);
      };
      var sel = document.getElementById("selection");
      // sel.appendChild(document.createElement("br"));
      sel.appendChild(newSel);

      this.createShape(this.libraryCurrent);
      this.$refs.trow1.template = {
        geo: this.shapes[this.libraryCurrent - 1],
        ratio: this.ratio,
        size: this.size
      };
    },
    addMultiRow: function() {
      for (let i = 1; i < this.shapes.length - 1; i++) {
        this.libraryCurrent = i + 1;
        var newSel = this.createRadioElement(this.libraryCurrent);
        newSel.onclick = event => {
          this.selectRadio(event.target.value);
        };
        var sel = document.getElementById("selection");
        sel.appendChild(document.createElement("br"));
        sel.appendChild(newSel);
      }
      this.$refs.trow1.template = {
        geo: this.shapes[this.shapes.length - 1],
        ratio: this.ratio,
        size: this.size
      };
      this.doAll(this.createGeo);
      // this.doAll(this.dataDraw);
      this.select(this.shapes.length - 1);
    },
    createRadioElement: function(name) {
      var radioHtml =
        "<button id='button" +
        name +
        "' type='button' value='" +
        name +
        "'>Select " +
        name +
        "</button>";

      var radioFragment = document.createElement("div");
      radioFragment.innerHTML = radioHtml;

      return radioFragment.firstChild;
    },
    selectRadio: function(current) {
      this.select(current);
      this.$refs.trow1.template = {
        geo: this.shapes[current],
        ratio: this.ratio,
        size: this.size
      };
    },
    select: function(i) {
      this.librarySelect = i;
      if (this.$refs.trow1) {
        this.$refs.trow1.template.geo = this.shapes[i];
      }
    },
    getTempNewSize: function() {
      this.libraryCurrent = this.shapes.length;
      for (let i = this.libraryCurrent - 1; i > 0; i--) {
        console.log(i);
        this.removeTemplate();
        console.log(i + " was removed successfully!");
      }
      this.$refs.trow1.template.geo = { shape: 4 };
    },
    removeTemplate: function() {
      console.log("REMOVING: " + this.libraryCurrent - 1);
      if (this.libraryCurrent != 1) {
        this.geo[this.libraryCurrent - 1].clear();
        this.shapes.pop();
        this.geo.pop();
        document.getElementById("button" + (this.libraryCurrent - 1)).remove();
        // document.getElementById("selection").getElementsByTagName("br");
        this.libraryCurrent = this.shapes.length;
        this.librarySelect = this.libraryCurrent - 1;
      }
    },
    saveTemplate: function() {
      if (this.ratio && this.shapes[1]) {
        var templateObj = {
          templates: this.shapes,
          dpi: this.ratio,
          pid: this.prodID,
          size: this.size
        };
        console.log(JSON.stringify(templateObj));
        this.saveTemplateAxios(templateObj);
      } else {
        alert(
          "Please setup at least one Template: " +
            JSON.stringify(this.shapes[1]) +
            ",\n and set ratio: " +
            this.ratio +
            ", to a nonzero value.\n See console if more info needed."
        );
        console.log(JSON.stringify(templateObj));
      }
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
    getTemplateAxios: function() {
      var that = this;
      // alert("pulling from database HEER" + this.prodID);

      axios
        .get("/api/template/" + this.prodID + "/" + this.size)
        .then(function(response) {
          // console.log("DATA vvv");
          // response.data.values.unshift(null);
          console.log(response.data.values);
          console.log("DATA ^^^");
          console.log("clearing all current local temps (if any)");
          that.doAll(that.removeTemplate());
          that.addRow();
          if (response.data.values) {
            that.shapes = Array.from(response.data.values); //response.data.values.unshift(null);
            that.ratio = response.data.dpi;
            console.log("RECEIVED SHAPES FROM DB:");
            console.log(that.shapes);
            that.addMultiRow();
          } else {
            console.log(
              "NO TEMPLATES ARRAY FROM SERVER FOR: " +
                that.prodID +
                " - " +
                that.size
            );
            console.log(
              "starting with default data, save new template data for: " +
                that.prodID +
                " - " +
                that.size
            );
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  props: {
    prodID: String
  },
  created() {
    this.getTemplateAxios();
    this.init();
  }
};
</script>

<style>
.data {
  margin-top: 18px;
  margin-left: 550px;
}
#drawingboard {
  position: absolute;
  margin-top: 3px;
  left: 138px;
  border: 1px yellow outset;
}
button {
  width: 80px;
  background-color: lightgray;
  border: 2px outset darkgray;
  border-radius: 10px !important;
  padding: 2px 4px;
  filter: drop-shadow(1px 1px 3px #333333);
}
#hr {
  margin: 5px;
}
#save {
  position: relative;
  top: -200px;
  left: 50px;
}
#minus {
  padding-bottom: 20px;
}
</style>