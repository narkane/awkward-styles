<template>
  <div id="app">
    <!-- USE FOLLOWING TWO LINES TO PASS IN PRODUCT IMG AND ID FOR CREATING TEMPLATE -->
    <!-- <img src="./assets/t-shirts-1.jpg" id="shirt" /> -->
    <HelloWorld :prodID="prodid" />
  </div>
</template>

<script>
import HelloWorld from "./components/HelloWorld.vue";

export default {
  name: "app",
  components: {
    HelloWorld
  },
  props: { prodid: String }
};
</script>

<style>
#app {
  width: 100vw;
  position: absolute;
  top: 0px;
  float: right;
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
