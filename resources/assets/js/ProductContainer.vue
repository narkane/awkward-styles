<template>
  <div id="ProductContainer">
    <!-- USE FOLLOWING TWO LINES TO PASS IN PRODUCT IMG AND ID FOR CREATING TEMPLATE -->
    <!-- <img src="./assets/t-shirts-1.jpg" id="shirt" /> -->
    <!-- <HelloWorld :prodID="prodid" /> -->
    <!-- <TemplateTool :prodID="prodid" /> -->
    <Product />
  </div>
</template>

<script>
// import HelloWorld from "./components/HelloWorld.vue";
import Product from "./components/Product.vue";

export default {
  name: "ProductContainer",
  components: {
    Product
  },
  props: {}
};
</script>

<style scoped>
</style>
