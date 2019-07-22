<template></template>

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
      overlay: null
    };
  },
  methods: {
    initTHREE: function() {
      this.camera = new THREE.PerspectiveCamera(
        70,
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
      this.overlay.material.opacity = 0.25;
      this.overlay.position.x -= 15;

      this.mesh.position.z -= 100;

      this.scene.add(this.mesh);
      this.scene.add(this.overlay);
      this.renderer.setPixelRatio(window.devicePixelRatio);
      this.renderer.setSize(this.width, this.height);
      document.body.appendChild(this.renderer.domElement);
      //
      window.addEventListener("resize", this.onWindowResize, false);
    },
    onWindowResize: function() {
      // this.camera.aspect = window.innerWidth / window.innerHeight;
      this.camera.updateProjectionMatrix();
      // this.renderer.setSize(window.innerWidth, window.innerHeight);
    },
    animate: function() {
      requestAnimationFrame(this.animate);
      // this.mesh.rotation.x += 0.005;

      // console.log(this.rotation);

      this.overlay.rotation.y = (-this.template.rotation * 3.14) / 180;
      this.overlay.position.set(this.template.x, -this.template.y, 0);
      this.overlay.scale.x = this.template.width / 100;
      this.overlay.scale.y = this.template.height / 100;
      this.renderer.render(this.scene, this.camera);
    }
  },
  mounted() {
    this.initTHREE();
    this.animate();
  },
  props: {
    template: Object
  }
};
</script>

<style></style>