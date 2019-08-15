<template>
  <div id="data"></div>
</template>

<script>
import * as PIXI from "pixi.js";
import blob from "../assets/blob.png";
import axios from "axios";
import "vuetify/dist/vuetify.css";

export default {
  name: "Product",
  components: {},
  data() {
    return {
      app: new PIXI.Application({ backgroundColor: 0x1099bb }),
      bunny: PIXI.Sprite.from(blob),
      sprites: [],
      libraryCurrent: 0,
      librarySelect: 0
    };
  },
  props: {},
  methods: {
    init: function() {
      document.body.appendChild(this.app.view);

      // create a new Sprite from an image path
      // const bunny = PIXI.Sprite.from("examples/assets/bunny.png");

      // center the sprite's anchor point

      // // move the sprite to the center of the screen

      // this.app.stage.addChild(this.bunny);
      this.createSprite(blob);

      // Listen for animate update
      this.app.ticker.add(delta => {
        // just for fun, let's rotate mr rabbit a little
        // delta is 1 if running at 100% performance
        // creates frame-independent transformation
        this.sprites[0].rotation += 0.1 * delta;
      });
    },
    createSprite: function(art) {
      console.log("loading into this.sprites[" + this.libraryCurrent + "]");

      this.sprites[this.libraryCurrent] = PIXI.Sprite.from(art);

      // this.sprites[this.libraryCurrent].width = 0;
      // this.sprites[this.libraryCurrent].transparent = 1;
      // this.sprites[this.libraryCurrent].alpha = 0;
      this.sprites[this.libraryCurrent].anchor.set(0.5);
      this.sprites[this.libraryCurrent].x = this.app.screen.width / 2;
      this.sprites[this.libraryCurrent].y = this.app.screen.height / 2;

      this.sprites[this.libraryCurrent].on("touchstart", () => {
        this.select(this.libraryCurrent);
      });

      this.app.stage.addChild(this.sprites[this.libraryCurrent]);

      this.librarySelect = this.libraryCurrent;
      this.libraryCurrent++;
    }
  },
  created() {
    this.init();
  },
  mounted() {},
  computed: {}
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
</style>