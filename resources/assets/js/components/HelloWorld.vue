<template>
  <div id="data">
    <v-form ref="form">
      <v-container fluid>
        <v-layout row>
          <v-flex xs1>
            <v-text-field v-model="testSprite.x" label="X" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="testSprite.y" label="Y" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="testSprite.width" label="width" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="testSprite.height" label="height" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="ratio" label="ratio" required />
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
            <v-text-field v-model="inchesWart" label="width in."></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesHart" label="height in."></v-text-field>
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
            <v-text-field v-model="drawArea.x" label="X" @change="changeDraw" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="drawArea.y" label="Y" @change="changeDraw" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="drawArea.width" label="width" @change="changeDraw" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="drawArea.height" label="height" @change="changeDraw" required></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="ratio" label="ratio" required />
          </v-flex>
        </v-layout>
        <v-layout row>
          <v-flex xs1>
            <v-text-field v-model="inchesXtemp" label="X inches" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesYtemp" label="Y inches" disabled></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesWtemp" label="width in."></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field v-model="inchesHtemp" label="height in."></v-text-field>
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
          <v-flex xs1>
            <v-text-field disabled />
          </v-flex>
        </v-layout>
      </v-container>
      <v-btn color="green" @click="savePrint">Save</v-btn>
      <v-btn color="orange" @click="saveTemplate">Template</v-btn>
      <v-btn color="red">Cancel</v-btn>
    </v-form>
  </div>
</template>

<script>
import * as PIXI from "pixi.js";
import blob from "../assets/blob.png";

export default {
  name: "HelloWorld",
  data() {
    return {
      type: "WebGL",
      app: new PIXI.Application({
        width: 600,
        height: 800,
        backgroundColor: 0x1099bb,
        transparent: 1
      }),
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
    changeDraw: function() {
      console.log("CHANGE!");
      this.app.renderer.clear();
      // that.app.renderer.screen
      // this.drawArea.width = value;
      this.app.renderer.view.style.left = this.drawArea.x + "px";
      this.app.renderer.view.style.top = this.drawArea.y + "px";
      this.app.renderer.resize(this.drawArea.width, this.drawArea.height);
    },
    saveTemplate: function() {
      var templateObj = {
        productID: this.prodID,
        x: this.drawArea.x,
        y: this.drawArea.y,
        w: this.drawArea.width,
        h: this.drawArea.height
      };
      alert(JSON.stringify(templateObj));
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
    }
  },
  created() {
    this.init();
  },
  computed: {
    inchesXtemp: {
      get() {
        return this.drawArea.x / this.ratio;
      },
      set(value) {
        this.drawArea.x = value * this.ratio;
      }
    },
    inchesYtemp: {
      get() {
        return this.drawArea.y / this.ratio;
      },
      set(value) {
        this.drawArea.y = value * this.ratio;
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
  z-index: -10;
}
input {
  text-align: center;
}
</style>
