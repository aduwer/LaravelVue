<template>
    <v-app class="app" id="app">
        <nav>
            <v-app-bar app>
                <v-app-bar-nav-icon
                    @click="drawer = !drawer"
                    class="grey--text"
                ></v-app-bar-nav-icon>
                <router-link to="/">
                    <v-toolbar-title
                        class="text-uppercase grey--text"
                        href="https://localhost.pl"
                    >
                        <img
                            class="logo"
                            href="https://localhost.pl"
                            :src="logonavbar"
                        />
                    </v-toolbar-title>
                </router-link>
                <v-spacer> </v-spacer>
                <v-btn
                    href="https://vuetifyjs.com/en/"
                    color="red"
                    class="md-danger md-lg d-none d-xl-flex d-lg-flex"
                >
                    <span> Vuetify </span>
                    <v-icon right>exit_to_app</v-icon>
                </v-btn>
            </v-app-bar>

            <v-navigation-drawer app v-model="drawer" v-if="isLoggedIn">
                <v-list-item-content class="header">
                    <v-list-item-title class="text-h6">
                        Wybierz pracownika
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Studio Software
                    </v-list-item-subtitle>
                </v-list-item-content>

                <v-divider></v-divider>

                <v-list dense nav>
                    <v-list-item
                        v-for="item in items_after_login"
                        :key="item.title"
                        :to="item.route"
                        link
                    >
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>{{
                                item.title
                            }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item link @click="logout">
                        <v-list-item-icon>
                            <v-icon>logout</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Wyloguj się</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>

            <v-navigation-drawer app v-model="drawer" v-else>
                <v-list-item-content class="header">
                    <v-list-item-title class="text-h6">
                        Wybierz pracownika
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Studio Software
                    </v-list-item-subtitle>
                </v-list-item-content>

                <v-divider></v-divider>

                <v-list dense nav>
                    <v-list-item
                        v-for="item in items"
                        :key="item.title"
                        :to="item.route"
                        link
                    >
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>{{
                                item.title
                            }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
        </nav>
        <router-view />
    </v-app>
</template>

<script>
import logo from "../assets/images/ss_logo_czarne.png";
import appRoutes from "../consts/appRoutes";
export default {
    name: "app",
    data() {
        return {
            items: [
                {
                    title: "Start",
                    icon: "dashboard",
                    route: appRoutes.home,
                },
                {
                    title: "Usługi",
                    icon: "image",
                    route: appRoutes.services,
                },
                {
                    title: "Zaloguj się",
                    icon: "person_outline",
                    route: appRoutes.logIn,
                },
            ],

            items_after_login: [
                {
                    title: "Dashboard",
                    icon: "dashboard",
                    route: appRoutes.dashboard,
                },
            ],
            right: null,
            logonavbar: logo,
            drawer: false,
            appRoutes,
            isLoggedIn: false,
        };
    },
    created() {
        if (window.LaravelUser.isLoggedin) {
            this.isLoggedIn = true;
        }
    },
    methods: {
        logout(e) {
            e.preventDefault();
            this.axios.get("/sanctum/csrf-cookie").then((respones) => {
                this.axios
                    .post("/api/logout")
                    .then((response) => {
                        if (response.data.success) {
                            window.location.href = "/";
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
        },
    },
};
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Signika:wght@300&display=swap");

.header {
    text-align: center;
}
.v-divider {
    display: none;
}

.v-list-item__content {
    .v-list-item__title {
        font-family: "Signika", sans-serif !important;
        font-weight: bold;
        font-size: 24px;
    }
    .v-list-item__subtitle {
        font-family: "Signika", sans-serif !important;
        font-size: 18px;
    }
}

.logo {
    height: 25px !important;
}

.md-theme-default a:not(.md-button) {
    color: black;
}
</style>
