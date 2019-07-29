<template>
  <div>
    <v-form ref="form" class="data">
      <v-container fluid id="cont">
        <TemplateRow ref="trow1"></TemplateRow>
      </v-container>
      <v-btn fab @click="addRow" color="white">
        <v-icon>+</v-icon>
      </v-btn>
    </v-form>
    <div id="selection">
      <h3>Template: {{librarySelect}}</h3>
      <button @click="selectRadio(1)">Select 1</button>
    </div>
  </div>
</template>

<script>
import * as PIXI from "pixi.js";
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
        width: 322,
        height: 385,
        backgroundColor: 0x1099bb,
        transparent: 1
      }),
      drawArea: new PIXI.Rectangle(0, 0, 200, 300),
      shapes: [],
      sprites: [],
      libraryCurrent: 0,
      librarySelect: 0,
      graphics: new PIXI.Graphics(),
      geo: []
    };
  },
  methods: {
    init: function() {
      var that = this;

      if (!PIXI.utils.isWebGLSupported()) {
        that.type = "canvas";
      }

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
        // that.geo[this.librarySelect].clear();
        // store a reference to the data
        // the reason for this is because of multitouch
        // we want to track the movement of this particular touch
        this.data = event.data;

        // that.alpha = 0.5;
        var newPosition = this.data.getLocalPosition(this.parent);
        that.shapes[that.librarySelect].x = newPosition.x;
        that.shapes[that.librarySelect].y = newPosition.y;
        that.shapes[that.librarySelect].width = 0;
        that.shapes[that.librarySelect].height = 0;
        that.$refs.trow1.setX(newPosition.x);
        that.$refs.trow1.setY(newPosition.y);
        this.dragging = true;
      }
      function onDragEnd() {
        // that.alpha = 1;

        this.dragging = false;

        // set the interaction data to null
        this.data = null;
      }
      function onDragMove() {
        if (this.dragging) {
          that.geo[that.librarySelect].clear();

          var newPosition = this.data.getLocalPosition(this.parent);

          that.shapes[that.librarySelect].width =
            newPosition.x - that.shapes[that.librarySelect].x;
          that.shapes[that.librarySelect].height =
            newPosition.y - that.shapes[that.librarySelect].y;
          that.$refs.trow1.setW(that.shapes[that.librarySelect].width);
          that.$refs.trow1.setH(that.shapes[that.librarySelect].height);
          // draw a rectangle
          if (that.$refs.trow1.template.shape == 4) {
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
            that.geo[that.librarySelect].drawCircle(
              that.shapes[that.librarySelect].x,
              that.shapes[that.librarySelect].y,
              Math.sqrt(
                Math.pow(newPosition.x - that.shapes[that.librarySelect].x, 2) +
                  Math.pow(newPosition.y - that.shapes[that.librarySelect].y, 2)
              )
            );
          }
          that.geo[that.librarySelect].alpha = 0.2;

          // set the line style to have a width of 5 and set the color to red

          that.app.stage.addChild(that.geo[that.librarySelect]);
        }
      }
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
      this.geo[this.libraryCurrent].beginFill(0x22ff88);
      this.shapes[this.libraryCurrent] = new PIXI.Rectangle();
      this.shapes[this.libraryCurrent].width = 0;

      switch (shape) {
        case 1:
          this.geo[this.libraryCurrent].drawCircle(
            this.shapes[this.libraryCurrent].x,
            this.shapes[this.libraryCurrent].y,
            Math.sqrt(
              Math.pow(newPosition.x - that.shapes[that.librarySelect].x, 2) +
                Math.pow(newPosition.y - that.shapes[that.librarySelect].y, 2)
            )
          );
          break;
        case 4:
          this.geo[this.libraryCurrent].drawRect(
            this.shapes[this.libraryCurrent].x,
            this.shapes[this.libraryCurrent].y,
            this.shapes[this.libraryCurrent].width,
            this.shapes[this.libraryCurrent].height
          );
          break;
        default:
          this.geo[this.libraryCurrent].drawRect(
            this.shapes[this.libraryCurrent].x,
            this.shapes[this.libraryCurrent].y,
            this.shapes[this.libraryCurrent].width,
            this.shapes[this.libraryCurrent].height
          );
          break;
      }

      // this.sprites[this.libraryCurrent] = PIXI.Sprite.from(art);

      this.shapes[this.libraryCurrent].transparent = 1;
      this.shapes[this.libraryCurrent].alpha = 0.1;

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
      var RowClass = Vue.extend(TemplateRow);
      var row = new RowClass();
      row.$mount();
      this.$refs["row"] = row.$el;
      // row.$el.ref = "trow" + this.libraryCurrent;
      // console.log(row.$el);
      // var rowEl = row.$el;
      // row.$el.setAttribute(":ref", "trow" + this.libraryCurrent);
      var container = document.getElementById("cont");
      container.appendChild(row.$el);
      // row.$el.setAttribute("ref", "trow" + this.libraryCurrent);
      // var rowEle = container.lastElementChild;
      // rowEle.setAttribute("ref", "trow" + this.libraryCurrent);
      // container.lastElementChild = rowEle;
      console.log(row.$el);
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

      this.createGeo(this.$refs.trow1.getShape());
    },
    createRadioElement: function(name) {
      var radioHtml =
        "<button value='" + name + "'>Select " + name + "</button>";
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
    }
  },
  created() {
    this.init();
  }
};
</script>

<style>
.data {
  margin-left: 500px;
}
#drawingboard {
  position: absolute;
  top: 125px;
  left: 138px;
  border: 1px yellow outset;
}
#selection {
  border: 1px solid black;
  width: 140px;
  padding: 10px;
  border-radius: 30%;
  margin-left: 500px;
}
#productImage {
  margin: 122px 0px;
  left: 0px;
}
button {
  width: 80px;
  background-color: lightgray;
  border: 2px outset darkgray;
  border-radius: 20px 20px 20px 20px !important;
  padding: 2px 4px;
}
</style>