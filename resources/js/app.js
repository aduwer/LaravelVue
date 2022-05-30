require("./bootstrap");

import Vue from "vue";

import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";
Vue.use(VueAxios, axios);

import App from "./App.vue";
import ContactList from "../js/components/ContactList";
import Home from "../js/components/Home";
import AddContact from "../js/components/AddContact";
import EditContact from "../js/components/EditContact";

import VueSweetalert2 from "vue-sweetalert2";
window.Swal = require("sweetalert2");
Vue.use(VueSweetalert2);

import utils from "./helpers/utilities";
Vue.prototype.$utils = utils;

const routes = [
    {
        name: "Example",
        path: "/",
        component: Home,
    },
    {
        name: "contacts",
        path: "/contacts",
        component: ContactList,
    },
    {
        name: "addcontacts",
        path: "/addcontacts",
        component: AddContact,
    },
    {
        name: "getcontact",
        path: "/getcontact/edit/:id?",
        component: EditContact,
    },
];

const router = new VueRouter({ mode: "history", routes: routes });
new Vue(Vue.util.extend({ router }, App)).$mount("#app");
