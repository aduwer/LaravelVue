<template>
    <v-app class="app" id="app">
        <Navbar />
        <router-view />
    </v-app>
</template>

<script>
import Navbar from "./components/Navbar";
export default {
    name: "app",
    components: {
        Navbar,
    },
};
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Signika:wght@300&display=swap");
// * {
//     padding: 0;
//     margin: 0;
//     box-sizing: border-box;
//     font-family: "Raleway", sans-serif;
// font-weight: 400;
// }

// .app {
//     min-height: 100vh;
//     position: relative;
//     background-color: #f1f1f1;
// }

// .container {
//     padding: 0 20px;
//     max-width: 1140px;
//     margin: 0 auto;
// }
</style>
