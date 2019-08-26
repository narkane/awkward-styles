import Vue from 'vue';
import App from './Affiliates.vue';

// Clipboard
import Clipboard from 'vue-clipboard2';

// Bootstrap Vue
import BootstrapVue from 'bootstrap-vue';

// Bootstrap CSS files
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

// Vue Graph
import VueGraph from 'vue-graph';

Vue.config.productionTip = true;

Vue.use(Clipboard);
Vue.use(BootstrapVue);
Vue.use(VueGraph);

export const nv = new Vue();

new Vue({
    render: h => h(App)
}).$mount('#affiliatedb');