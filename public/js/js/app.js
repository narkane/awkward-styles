/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Vue from "vue";
import App from "./App.vue";
import Vuetify from "vuetify";

Vue.use(Vuetify);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("product", require("./components/Product.vue"));
Vue.component("comingsoon", require("./components/Comingsoon.vue"));
Vue.component("example", require("./components/Example.vue"));
Vue.component("searchbar", require("./components/Search.vue"));
Vue.component("thetool", require("./App.vue"));

const app = new Vue({
  el: "#app",
  mounted() {
    // console.log("hello world!");
  }
});
