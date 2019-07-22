<template></template>

<script>
import * as THREE from "three";
import drawarea3d from "../assets/3drawarea.gif";

export default {
  name: "threedee",
  data() {
    return {
      width: 300,
      height: 400,
      camera: new THREE.PerspectiveCamera(70, 3 / 4, 1, 1000),
      scene: new THREE.Scene(),
      renderer: new THREE.WebGLRenderer({ antialias: true, alpha: true }),
      mesh: null
    };
  },
  methods: {
    initTHREE: function() {
      // this.camera = new THREE.PerspectiveCamera(70, 3 / 5, 1, 1000);
      this.camera.position.z = 400;
      // var textu = new THREE.
      var texture = new THREE.TextureLoader().load(drawarea3d);
      var geometry = new THREE.PlaneBufferGeometry(200, 200, 1, 1);
      var material = new THREE.MeshBasicMaterial({ map: texture });
      this.mesh = new THREE.Mesh(geometry, material);
      this.scene.add(this.mesh);
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

      this.mesh.rotation.y = this.rotation;
      this.renderer.render(this.scene, this.camera);
    }
  },
  mounted() {
    this.initTHREE();
    this.animate();
  },
  props: {
    rotation: String
  }
};
</script>

<style></style>