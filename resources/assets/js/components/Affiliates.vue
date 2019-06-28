<template>
  <div class="container">
    <link
      type="text/css"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,300"
    >
    <img src=""
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => {
    return {
      category: "",
      productArr: []
    };
  },
  methods: {
    search() {
      console.log(this.category);
      axios.get("/search/" + this.category); //.then((resp)=>{console.log(resp.data)});
    },
    print() {
      // console.log(this.search());
    }
  }
};
</script>

<style scoped>
* {
  --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI",
    Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
    "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas,
    "Liberation Mono", "Courier New", monospace;
  /* font-family: sans-serif; */
}
.container {
  padding-top: 100px;
  display: flex;
  justify-content: space-around;
}
</style>