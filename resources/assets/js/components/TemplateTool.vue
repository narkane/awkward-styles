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
          <v-btn
            fab
            id="minus"
            @click="()=>{
            geo[shapes.length - 1].clear();
            removeTemplate();
            librarySelect = shapes.length-1}"
            color="white"
          >
            <v-icon>_</v-icon>
          </v-btn>
          <button type="button" @click="selectRadio(1)">Select 1</button>
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
        backgroundColor: 0x1099bb,
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

      // this.createSprite(blob);
      // this.sprites[1].width = 0;
      // this.sprties[1].transparent;
      // this.sprites[1].alpha = 0.1;
      try {
        that.createGeo(that.$refs.trow1.getShape());
      } catch (e) {
        that.createGeo(4);
      }

      that.app.ticker.add(function(delta) {
        // that.sprites[that.librarySelect].rotation += 0.1 * delta;
      });
      function onDragStart(event) {
        that.$refs.trow1.template.geo = that.shapes[that.librarySelect];
        that.geo[that.librarySelect].clear();
        // store a reference to the data
        // the reason for this is because of multitouch
        // we want to track the movement of this particular touch
        this.data = event.data;

        // that.alpha = 0.5;
        var newPosition = this.data.getLocalPosition(this.parent);
        that.shapes[that.librarySelect].x = Math.round(newPosition.x);
        that.shapes[that.librarySelect].y = Math.round(newPosition.y);
        that.shapes[that.librarySelect].width = 0;
        that.shapes[that.librarySelect].height = 0;
        // that.$refs.trow1.setX(newPosition.x);
        // that.$refs.trow1.setY(newPosition.y);
        this.dragging = true;
      }
      function onDragEnd() {
        // that.alpha = 1;

        this.dragging = false;

        // set the interaction data to null
        this.data = null;

        // that.geo[that.librarySelect].alpha = 0.1;
      }
      function onDragMove() {
        if (this.dragging) {
          that.geo[that.librarySelect].clear();

          var newPosition = this.data.getLocalPosition(this.parent);

          that.shapes[that.librarySelect].width =
            Math.round(newPosition.x) - that.shapes[that.librarySelect].x;
          that.shapes[that.librarySelect].height =
            Math.round(newPosition.y) - that.shapes[that.librarySelect].y;
          // that.$refs.trow1.setW(that.shapes[that.librarySelect].width);
          // that.$refs.trow1.setH(that.shapes[that.librarySelect].height);
          // draw a rectangle
          if (that.$refs.trow1.template.geo.shape == 4) {
            that.geo[that.librarySelect].drawRect(
              that.shapes[that.librarySelect].x,
              that.shapes[that.librarySelect].y,
              that.shapes[that.librarySelect].width,
              that.shapes[that.librarySelect].height
            );
          } else {
            // that.shapes[that.librarySelect].width = Math.sqrt(
            // Math.pow(newPosition.x - that.shapes[that.librarySelect].x, 2) +
            //   Math.pow(newPosition.y - that.shapes[that.librarySelect].y, 2)
            // );
            // that.$refs.trow1.setW(that.shapes[that.librarySelect].width);
            // that.$refs.trow1.setH(10);
            // draw a rectangle
            // alert(that.shapes[that.librarySelect]);
            that.geo[that.librarySelect].drawCircle(
              that.shapes[that.librarySelect].x,
              that.shapes[that.librarySelect].y,
              Math.sqrt(
                Math.pow(that.shapes[that.librarySelect].width, 2) +
                  Math.pow(that.shapes[that.librarySelect].height, 2)
              ) / Math.sqrt(2)
            );
          }
          that.geo[that.librarySelect].alpha = 0.1;

          // set the line style to have a width of 5 and set the color to red

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

      if (data.shape == 4) {
        this.geo[this.librarySelect].drawRect(
          this.shapes[this.librarySelect].x,
          this.shapes[this.librarySelect].y,
          this.shapes[this.librarySelect].width,
          this.shapes[this.librarySelect].height
        );
      } else {
        this.geo[this.librarySelect].drawCircle(
          this.shapes[this.librarySelect].x,
          this.shapes[this.librarySelect].y,
          Math.sqrt(
            Math.pow(this.shapes[this.librarySelect].width, 2) +
              Math.pow(this.shapes[this.librarySelect].height, 2)
          ) / Math.sqrt(2)
        );
      }
      this.app.stage.addChild(this.geo[this.librarySelect]);
    },
    dataDraw: function() {
      for (let i = 1; i < this.shapes.length; i++) {
        this.geo[i] = new PIXI.Graphics();

        this.geo[i].lineStyle(1, 0x0000ff);
        this.geo[i].transparent = 1;
        this.geo[i].alpha = 0.1;
        // this.geo[i].clear();

        if (this.shapes[i].shape == 4) {
          this.geo[i].drawRect(
            this.shapes[i].x,
            this.shapes[i].y,
            this.shapes[i].width,
            this.shapes[i].height
          );
        } else {
          this.geo[i].drawCircle(
            this.shapes[i].x,
            this.shapes[i].y,
            Math.sqrt(
              Math.pow(this.shapes[i].width, 2) +
                Math.pow(this.shapes[i].height, 2)
            ) / Math.sqrt(2)
          );
        }
        this.app.stage.addChild(this.geo[i]);
      }
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
      this.sprites[this.libraryCurrent].alpha = 0.1;

      this.sprites[this.libraryCurrent].on("touchstart", () => {
        this.librarySelect = this.libraryCurrent;
      });

      // this.app.stage.addChild(this.sprites[this.libraryCurrent]);

      // this.sprites[this.libraryCurrent].anchor.set(0.5);
      // this.sprites[this.libraryCurrent].x = this.app.screen.width / 2;
      // this.sprites[this.libraryCurrent].y = this.app.screen.height / 2;
      this.app.stage.addChild(this.sprites[this.libraryCurrent]);

      this.librarySelect = this.libraryCurrent;
      this.libraryCurrent++;
    },
    createGeo: function(shape) {
      console.log("loading into this.shapes[" + this.libraryCurrent + "]");
      this.geo[this.libraryCurrent] = new PIXI.Graphics();

      this.geo[this.libraryCurrent].lineStyle(1, 0x0000ff);
      this.geo[this.libraryCurrent].transparent = 1;
      this.geo[this.libraryCurrent].alpha = 0.1;
      // this.geo[this.libraryCurrent].beginFill(0x22ff88);
      this.shapes[this.libraryCurrent] = new PIXI.Rectangle();
      this.shapes[this.libraryCurrent].width = 0;

      switch (shape) {
        case 1:
          this.shapes[this.libraryCurrent].shape = 1;
          this.geo[this.libraryCurrent].drawCircle(
            this.shapes[this.libraryCurrent].x,
            this.shapes[this.libraryCurrent].y,
            Math.sqrt(
              Math.pow(this.shapes[this.librarySelect].width, 2) +
                Math.pow(this.shapes[this.librarySelect].height, 2)
            ) / Math.sqrt(2)
          );
          break;
        // case 3:
        // this.geo[this.libraryCurrent].draw;
        // break;
        case 4:
          this.shapes[this.libraryCurrent].shape = 4;
          this.geo[this.libraryCurrent].drawRect(
            this.shapes[this.libraryCurrent].x,
            this.shapes[this.libraryCurrent].y,
            this.shapes[this.libraryCurrent].width,
            this.shapes[this.libraryCurrent].height
          );
          break;
        default:
          this.shapes[this.libraryCurrent].shape = 4;
          this.geo[this.libraryCurrent].drawRect(
            this.shapes[this.libraryCurrent].x,
            this.shapes[this.libraryCurrent].y,
            this.shapes[this.libraryCurrent].width,
            this.shapes[this.libraryCurrent].height
          );
          break;
      }

      // this.sprites[this.libraryCurrent] = PIXI.Sprite.from(art);

      this.app.stage.addChild(this.geo[this.libraryCurrent]);
      // this.shapes[this.libraryCurrent].on("touchstart", () => {
      //   this.librarySelect = this.libraryCurrent;
      // });

      // this.app.stage.addChild(this.shapes[this.libraryCurrent]);

      // this.shapes[this.libraryCurrent].anchor.set(0.5);
      // this.shapes[this.libraryCurrent].x = this.app.screen.width / 2;
      // this.shapes[this.libraryCurrent].y = this.app.screen.height / 2;

      this.librarySelect = this.libraryCurrent;
      this.libraryCurrent++;
    },
    addRow: function() {
      // var RowClass = Vue.extend(TemplateRow);
      // var row = new RowClass();
      // row.$mount();
      // this.$refs["row"] = row.$el;

      // row.$el.ref = "trow" + this.libraryCurrent;
      // console.log(row.$el);
      // var rowEl = row.$el;
      // row.$el.setAttribute(":ref", "trow" + this.libraryCurrent);
      // var container = document.getElementById("cont");
      // container.appendChild(row.$el);
      // row.$el.setAttribute("ref", "trow" + this.libraryCurrent);
      // var rowEle = container.lastElementChild;
      // rowEle.setAttribute("ref", "trow" + this.libraryCurrent);
      // container.lastElementChild = rowEle;
      // console.log(row.$el);
      // row.innerHTML = "<TemplateRow ref='trow" + this.libraryCurrent + "' />";

      // alert(this.libraryCurrent);
      // var newSel = this.createRadioElement(this.libraryCurrent);
      var newSel = this.createRadioElement(this.libraryCurrent);
      newSel.onclick = event => {
        this.selectRadio(event.target.value);
      };
      var sel = document.getElementById("selection");
      sel.appendChild(document.createElement("br"));
      sel.appendChild(newSel);

      // let lastSelection = this.librarySelect;

      this.createGeo(this.$refs.trow1.getShape());
      this.$refs.trow1.template = {
        // productId: 0,
        geo: this.shapes[this.libraryCurrent - 1],
        ratio: this.ratio,
        size: this.size
      };
    },
    addMultiRow: function() {
      for (let i = 1; i < this.shapes.length - 1; i++) {
        var newSel = this.createRadioElement(this.libraryCurrent);
        newSel.onclick = event => {
          this.selectRadio(event.target.value);
        };
        var sel = document.getElementById("selection");
        sel.appendChild(document.createElement("br"));
        sel.appendChild(newSel);
      }
      this.$refs.trow1.template = {
        // productId: 0,
        geo: this.shapes[this.shapes.length - 1],
        ratio: this.ratio,
        size: this.size
      };
      this.dataDraw();
      this.librarySelect = this.shapes.length - 1;
    },
    createRadioElement: function(name) {
      var radioHtml =
        "<button type='button' value='" +
        name +
        "'>Select " +
        name +
        "</button>";
      // if (checked) {
      //   radioHtml += ' checked="checked"';
      // }
      // radioHtml += "/>";

      var radioFragment = document.createElement("div");
      radioFragment.innerHTML = radioHtml;

      return radioFragment.firstChild;
    },
    selectRadio: function(current) {
      this.librarySelect = current;
      this.$refs.trow1.template = {
        geo: this.shapes[current],
        ratio: this.ratio,
        size: this.size
      };
    },
    getTempNewSize: function() {
      let dog = this.shapes.length;
      for (let i = 1; i < dog; i++) {
        this.geo[this.shapes.length - 1].clear();
        this.removeTemplate();
      }
      this.librarySelect = 1;
      this.$refs.trow1.template.geo = { shape: 4 };
    },
    removeTemplate: function() {
      this.shapes.pop();
      this.geo.pop();
      document
        .getElementById("selection")
        .removeChild(document.getElementById("selection").lastElementChild);
    },
    saveTemplate: function() {
      // let ts = [];
      // for(let i=1; i<=this.shapes.length; i++)
      // {
      //   console.log("SWOOP! "+i);
      //   ts[i] = this.shapes[i];
      // }
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
          if (response.data.values) {
            that.shapes = Array.from(response.data.values); //response.data.values.unshift(null);
            // that.shapes.unshift(null);
            that.ratio = response.data.dpi;
            console.log(that.shapes);
            console.log(typeof that.shapes);
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