import VueMaterial from "vue-material";
import "vue-material/dist/vue-material.min.css";
import "../sass/material-kit.scss";
import "../sass/demo.css";
// import globalDirectives from "./globalDirectives";
// import globalMixins from "./globalMixins";
// import globalComponents from "./globalComponents";
// import VueLazyload from "vue-lazyload";
// import VueCarousel from "vue-clarousel";

export default {
    install(Vue) {
        Vue.use(VueMaterial);
        // Vue.use(globalDirectives);
        // Vue.use(globalMixins);
        // Vue.use(globalComponents);
        // Vue.use(VueCarousel);
        // Vue.use(VueLazyload, {
        //     observer: true,
        //     // optional
        //     observerOptions: {
        //         rootMargin: "0px",
        //         threshold: 0.1,
        //     },
        // });
    },
};
