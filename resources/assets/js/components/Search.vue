<template>
  <div class="container">
    <link
      type="text/css"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,300"
    >

    <!-- <form action="search" method="post" enctype="multipart/form-data" class="dropdown-menu dropdown-menu-right p-4" style="width: 400px;" aria-labelledby="userdropdown"> -->
      <div class="input-group">
        <input type="text" class="form-control input-bg" id="search-suggestions" placeholder="Bag, women, mens..." aria-label="Search" aria-describedby="button-addon2" v-model="category">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2" @click="search">Search</button>
        </div>
      </div>
    <!-- </form> -->
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => {
    return{
      category: "",
      productArr: []
    }
  },
  methods: {
    search(){
      console.log(this.category);
      axios.get('/search/'+this.category);//.then((resp)=>{console.log(resp.data)});
    },
    print(){
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