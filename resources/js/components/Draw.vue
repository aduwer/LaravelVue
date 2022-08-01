<template>
    <v-main>
        <div class="wrapper">
            <div
                class="section page-header header-filter"
                name="parallax"
                :style="{ backgroundImage: 'url(' + image + ')' }"
            ></div>
            <div class="section text-center">
                <div class="container">
                    <h2 class="text-center">
                        Wybierz pracownika Studio Software
                    </h2>
                    <div class="team">
                        <div class="md-layout">
                            <div
                                class="md-layout-item md-medium-size-33 md-small-size-100"
                                v-for="possible in possibilities"
                                :key="possible.icon"
                            >
                                <div class="team-player">
                                    <md-card class="md-card-plain">
                                        <div
                                            class="md-layout-item md-size-50 mx-auto"
                                        >
                                            <router-link :to="possible.route">
                                                <img
                                                    :src="possible.icon"
                                                    alt="Thumbnail Image"
                                                    class="img-raised rounded-circle img-fluid"
                                            /></router-link>
                                        </div>
                                        <h4 class="card-title">
                                            {{ possible.title }}
                                            <br />
                                            <small
                                                class="card-description text-muted"
                                                >{{ possible.subtitle }}</small
                                            >
                                        </h4>

                                        <md-card-content>
                                            <p class="card-description">
                                                {{ possible.text }}
                                            </p>
                                        </md-card-content>
                                    </md-card>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </v-main>
</template>

<script>
import backgroundimage from "../../assets/images/bg12.jpg";
import coffe from "../../assets/images/kawa.jpg";
import cr from "../../assets/images/cr.png";
import increase from "../../assets/images/podwyzka.jpg";
import appRoutes from "../../consts/appRoutes";
export default {
    data() {
        return {
            appRoutes,
            image: backgroundimage,
            possibilities: [
                {
                    title: "Kawka",
                    subtitle: "z ekspresu :)",
                    text: "Kawki by się człowiek napił, ale wstać się nie chce? Losuj, ktoś może pofatyguje się za Ciebie.",
                    icon: coffe,
                    route: appRoutes.coffe,
                },
                {
                    title: "Code Review",
                    subtitle: "bo nie ma komu",
                    text: "Projektów wiele, kodu jeszcze więcej, ale chętnych do sprawdzania mało. Nie ma wyjścia, szukamy.",
                    icon: cr,
                    route: appRoutes.codereview,
                },
                {
                    title: "Podwyżka",
                    subtitle: "na stałe!",
                    text: "Inflacja 14%, żyć co raz ciężej, raty urosły, jedzenie drożeje, spróbuj, może Ci się powiedzie.",
                    icon: increase,
                    route: appRoutes.increase,
                },
            ],
        };
    },

    methods: {},
};
</script>

<style lang="scss" scoped>
body,
h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4 {
    font-family: "Signika", sans-serif !important;
}

span {
    color: rgb(29, 25, 223);
}

.section {
    padding: 0px;
}
.v-application .rounded-circle {
    border-radius: 20% !important;
}
</style>
