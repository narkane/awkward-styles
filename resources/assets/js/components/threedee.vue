<template>
  <div>
    <v-layout row>
      <v-flex xs7>
        <input type="checkbox" name="mode" v-model="templateOn" />
        <label for="mode">Template: {{templateOn}}</label>
      </v-flex>
    </v-layout>
    {{art.x * template.width}}
    <br />
    {{art.y * template.width}}
  </div>
</template>

<script>
  import * as THREE from "three";
  import drawarea3d from "../assets/3drawarea.png";
  // import productimg from ;

  export default {
    name: "threedee",
    data() {
      return {
        width: 300,
        height: 380,
        camera: null,
        scene: new THREE.Scene(),
        renderer: new THREE.WebGLRenderer({ antialias: true, alpha: true }),
        mesh: null,
        overlay: null,
        artlay: null,
        templateOn: true
      };
    },
    methods: {
      initTHREE: function() {
        this.camera = new THREE.PerspectiveCamera(
                45,
                this.width / this.height,
                1,
                1000
        );
        this.camera.position.z = 400;

        var productImg = document.getElementById("productImage");
        var texture = new THREE.TextureLoader().load(productImg.src);
        var material = new THREE.MeshBasicMaterial({ map: texture });

        var overTex = new THREE.TextureLoader().load(drawarea3d);
        var overMat = new THREE.MeshBasicMaterial({ map: overTex });

        var geometry = new THREE.PlaneBufferGeometry(
                productImg.width,
                productImg.height,
                1,
                1
        );
        this.mesh = new THREE.Mesh(geometry, material);

        var overGeo = new THREE.PlaneBufferGeometry(100, 100, 1, 1);
        this.overlay = new THREE.Mesh(overGeo, overMat);
        this.overlay.material.transparent = true;
        this.overlay.material.opacity = 0.15;
        this.overlay.position.x -= 15;

        this.mesh.position.z -= 100;

        this.scene.add(this.mesh);
        this.scene.add(this.overlay);
        this.renderer.setPixelRatio(window.devicePixelRatio);
        this.renderer.setSize(this.width, this.height);
        document.body.appendChild(this.renderer.domElement);
        //
        window.addEventListener("resize", this.onWindowResize, false);
        // document
        //   .getElementById("frontview")
        //   .addEventListener("change", this.loadArt, false);
      },
      onWindowResize: function() {
        // this.camera.aspect = window.innerWidth / window.innerHeight;
        this.camera.updateProjectionMatrix();
        // this.renderer.setSize(window.innerWidth, window.innerHeight);
      },
      loadArt: function() {
        console.log("bark!!!~");
        if (this.art.artSrcArr) {
          console.log(this.art.artSrcArr);
          // var productImg = document.getElementById("productImage");
          var artTex = new THREE.TextureLoader().load(this.art.artSrcArr);
          var artMat = new THREE.MeshBasicMaterial({ map: artTex });
          // var geometry = new THREE.PlaneBufferGeometry(100, 100, 1, 1);
          var artGeo = new THREE.PlaneBufferGeometry(100, 100, 1, 1);
          this.artlay = new THREE.Mesh(artGeo, artMat);
          this.artlay.material.transparent = true;
          // this.artlay.material.opacity = 0.25;
          // this.artlay.position.x -= 15;
          // this.artlay.position.z += 1;
          // this.scene.add(this.artlay);
          this.overlay.add(this.artlay);
        }
      },
      animate: function() {
        requestAnimationFrame(this.animate);

        // this.overlay.rotation.y = 0;
        this.overlay.position.set(this.template.x, -this.template.y, 0);
        // this.overlay.translateX(this.template.x);
        // this.overlay.translateY(-this.template.y);
        this.overlay.rotation.y = (-this.template.rotation * 3.14) / 180;
        this.overlay.scale.x = this.template.width / 100;
        this.overlay.scale.y = this.template.height / 100;

        if (this.artlay) {
          // this.artlay.rotation.y = (-this.template.rotation * 3.14) / 180;
          // this.artlay.translateX = this.art.x;
          // this.artlay.translateY = -this.art.y;
          this.artlay.position.set(this.art.x * 100, -this.art.y * 100, 1);
          this.artlay.scale.x = this.art.width / 100; // * this.template.height) / this.template.width;
          this.artlay.scale.y =
                  ((this.art.height / 100) * this.template.width) /
                  this.template.height;
        }
        if (this.templateOn) {
          this.overlay.material.opacity = 0.1;
        } else {
          this.overlay.material.opacity = 0.0;
        }

        this.renderer.render(this.scene, this.camera);
      }
    },
    mounted() {
      this.initTHREE();
      this.animate();
    },
    props: {
      template: Object,
      art: Object
    }
  };
</script>

<style></style>