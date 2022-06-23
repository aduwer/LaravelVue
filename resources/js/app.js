import Vue from "vue";
import VueAxios from "vue-axios";
import axios from "axios";
Vue.use(VueAxios, axios);
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import MaterialKit from "../plugins/material-kit";

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(MaterialKit);

import VueRouter from "vue-router";
Vue.use(VueRouter);

import App from "./App.vue";
import "vuetify/dist/vuetify.min.css";

import utils from "./helpers/utilities";
Vue.prototype.$utils = utils;

import router from "./routes.js";
import vuetify from "../plugins/vuetify";

// SWEET ALERT
import VueSweetalert2 from "vue-sweetalert2";
window.Swal = require("sweetalert2");
Vue.use(VueSweetalert2);

const app = new Vue({
    el: "#app",
    vuetify,
    router,
    render: (h) => h(App),
}).$mount("#app");
