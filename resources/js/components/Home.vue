<template>
    <v-main>
        <div class="wrapper">
            <div
                class="section page-header header-filter"
                name="parallax"
                :style="{ backgroundImage: 'url(' + image + ')' }"
            >
                <div class="container">
                    <div class="md-layout">
                        <div
                            class="md-layout-item md-size-50 md-small-size-70 md-xsmall-size-100"
                        >
                            <div class="title">
                                <h1 bold>Software House</h1>
                            </div>
                            <h3>
                                Z nami stworzysz
                                <span color="blue" bold>
                                    nowoczesne oprogramowanie.
                                </span>
                                Pozwól swojej firmie rosnąć!
                            </h3>
                            <br />
                            <md-button
                                href="https://www.studiosoftware.pl"
                                class="md-danger md-lg"
                                target="_blank"
                            >
                                Odwiedź nas</md-button
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="main main-raised">
                <div class="section section-first">
                    <div class="container">
                        <!-- <div class="md-layout"> -->
                        <div
                            class="md-layout-item md-layout-item-section md-size-66 md-xsmall-size-100 mx-auto text-center"
                        >
                            <h2 class="text-center">
                                Masz pomysł na software? Zrealizuj go z nami!
                            </h2>
                            <h5 class="description">
                                Innowacyjny software house zajmujący się
                                tworzeniem dedykowanego oprogramowania dla firm
                                i startupów z różnych branż. Nasz zespół składa
                                się z doświadczonych programistów i managerów,
                                którzy kompleksowo zajmują się procesem
                                tworzenia rozwiązań IT. Nasze usługi
                                programistyczne obejmują zarówno budowanie
                                aplikacji, design, jak i rozwój produktu wraz z
                                opieką powdrożeniową. Mieliśmy okazję
                                współpracować ze znanymi markami zarówno w
                                Polsce jak i zagranicą, takimi jak m.in:
                                Jutrzenka, Eurotax, Jakikredyt, czy Vorwerk.
                                Jeśli szukasz firmy IT, która będzie otwarta na
                                Twoje potrzeby i zrealizuje projekt zgodnie z
                                Twoimi celami, skontaktuj się z nami.
                            </h5>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>

                <v-img :src="backgroundStudioSoftware2"></v-img>

                <div class="section text-center">
                    <div class="container">
                        <h2 class="text-center">Poznaj naszych właścicieli</h2>
                        <div class="team">
                            <div class="md-layout">
                                <div
                                    class="md-layout-item md-medium-size-33 md-small-size-100"
                                >
                                    <div class="team-player">
                                        <md-card class="md-card-plain">
                                            <div
                                                class="md-layout-item md-size-50 mx-auto"
                                            >
                                                <img
                                                    :src="teamjpg1"
                                                    alt="Thumbnail Image"
                                                    class="img-raised rounded-circle img-fluid"
                                                />
                                            </div>
                                            <h4 class="card-title">
                                                Adam Mateja
                                                <br />
                                                <small
                                                    class="card-description text-muted"
                                                    >CEO, Co-Founder</small
                                                >
                                            </h4>

                                            <md-card-content>
                                                <p class="card-description">
                                                    Cześć, jestem
                                                    współzałożycielem Studio
                                                    Software. Z przyjemnością
                                                    podzielę się z Tobą swoim
                                                    wieloletnim doświadczeniem w
                                                    budowaniu produktów IT i
                                                    doradzę zarówno na poziomie
                                                    biznesowym, jak i
                                                    technologicznym.
                                                </p>
                                            </md-card-content>

                                            <md-card-actions
                                                class="text-center"
                                            >
                                                <md-button
                                                    href="javascript:void(0)"
                                                    class="md-just-icon md-simple"
                                                >
                                                    <i
                                                        class="fab fa-twitter"
                                                    ></i>
                                                </md-button>
                                                <md-button
                                                    href="javascript:void(0)"
                                                    class="md-just-icon md-simple"
                                                >
                                                    <i
                                                        class="fab fa-instagram"
                                                    ></i>
                                                </md-button>
                                                <md-button
                                                    href="javascript:void(0)"
                                                    class="md-just-icon md-simple"
                                                >
                                                    <i
                                                        class="fab fa-facebook-square"
                                                    ></i>
                                                </md-button>
                                            </md-card-actions>
                                        </md-card>
                                    </div>
                                </div>

                                <div
                                    class="md-layout-item md-medium-size-33 md-small-size-100"
                                >
                                    <div class="team-player">
                                        <md-card class="md-card-plain">
                                            <div
                                                class="md-layout-item md-size-50 mx-auto"
                                            >
                                                <img
                                                    :src="teamjpg2"
                                                    alt="Thumbnail Image"
                                                    class="img-raised rounded-circle img-fluid"
                                                />
                                            </div>
                                            <h4 class="card-title">
                                                Karol Chołody
                                                <br />
                                                <small
                                                    class="card-description text-muted"
                                                    >CTO, Co-founder
                                                </small>
                                            </h4>

                                            <md-card-content>
                                                <p class="card-description">
                                                    Cześć, jestem
                                                    współzałożycielem Studio
                                                    Software. Z przyjemnością
                                                    podzielę się z Tobą swoim
                                                    wieloletnim doświadczeniem w
                                                    budowaniu produktów IT i
                                                    doradzę zarówno na poziomie
                                                    biznesowym, jak i
                                                    technologicznym.
                                                </p>
                                            </md-card-content>

                                            <md-card-actions
                                                class="text-center"
                                            >
                                                <md-button
                                                    href="javascript:void(0)"
                                                    class="md-just-icon md-simple"
                                                >
                                                    <i
                                                        class="fab fa-twitter"
                                                    ></i>
                                                </md-button>
                                                <md-button
                                                    href="javascript:void(0)"
                                                    class="md-just-icon md-simple"
                                                >
                                                    <i
                                                        class="fab fa-instagram"
                                                    ></i>
                                                </md-button>
                                                <md-button
                                                    href="javascript:void(0)"
                                                    class="md-just-icon md-simple"
                                                >
                                                    <i
                                                        class="fab fa-facebook-square"
                                                    ></i>
                                                </md-button>
                                            </md-card-actions>
                                        </md-card>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="section section-success"
                    :style="{
                        backgroundImage:
                            'url(' + backgroundStudioSoftware + ')',
                    }"
                >
                    <div class="container container-success">
                        <div class="md-layout">
                            <div
                                class="md-layout-item md-size-66 md-xsmall-size-100 mx-auto text-center"
                            >
                                <h2 class="text-center text-center-success">
                                    Wspólnie pracujemy na Twój sukces
                                </h2>
                                <h5 class="description">
                                    Skontaktuj się z nami i stwórzmy wspólnie
                                    niezwykły projekt!
                                </h5>

                                <md-button
                                    href="https://www.studiosoftware.pl"
                                    class="md-danger md-lg buttonsection"
                                    target="_blank"
                                >
                                    Odwiedź nas</md-button
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <v-footer dark padless>
                    <v-card class="flex footer" tile>
                        <v-card-title>
                            <!-- <strong class="subheading"
                                >Dołącz do naszych sieci
                                społecznościowych</strong
                            > -->

                            <h5>Nasze social media - dołącz do nas</h5>

                            <v-spacer></v-spacer>

                            <v-btn
                                class="mx-4"
                                dark
                                icon
                                href="https://www.facebook.com/studiosoftwarepl"
                            >
                                <v-icon size="24px">
                                    {{ icon }}
                                </v-icon>
                            </v-btn>
                            <v-btn
                                class="mx-4"
                                dark
                                icon
                                href="https://www.linkedin.com/company/studio-software/mycompany/"
                            >
                                <v-icon size="24px">
                                    {{ icon1 }}
                                </v-icon>
                            </v-btn>
                            <v-btn
                                class="mx-4"
                                dark
                                icon
                                href="https://www.instagram.com/studiosoftware/"
                            >
                                <v-icon size="24px">
                                    {{ icon2 }}
                                </v-icon>
                            </v-btn>
                        </v-card-title>

                        <v-card-text class="py-2 white--text text-center">
                            <strong>Studio Software</strong>
                            {{ new Date().getFullYear() }}
                        </v-card-text>
                    </v-card>
                </v-footer>
            </div>
        </div>
    </v-main>
</template>

<script>
import backgroundimage from "../../assets/images/bg11.png";
import teamJpg1 from "../../assets/images/Adam.png";
import teamJpg2 from "../../assets/images/Karol.png";
import backgroundss1 from "../../assets/images/jpgtlo.png";
import backgroundss2 from "../../assets/images/baner.jpg";
import { mdiInstagram } from "@mdi/js";
import { mdiLinkedin } from "@mdi/js";
import { mdiFacebook } from "@mdi/js";
import { mdiTwitter } from "@mdi/js";
export default {
    bodyClass: "landing-page",
    data() {
        return {
            name: null,
            email: null,
            message: null,
            image: backgroundimage,
            teamjpg1: teamJpg1,
            teamjpg2: teamJpg2,
            backgroundStudioSoftware: backgroundss1,
            backgroundStudioSoftware2: backgroundss2,
            icon: mdiFacebook,
            icon1: mdiLinkedin,
            icon2: mdiInstagram,
            icon3: mdiTwitter,
        };
    },
};
</script>

<style lang="scss" scoped>
.md-card-actions.text-center {
    display: flex;
    justify-content: center !important;
}
.contact-form {
    margin-top: 30px;
}

.md-has-textarea + .md-layout {
    margin-top: 15px;
}
span {
    color: red;
}

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

.section {
    padding-top: 0px;
    padding-bottom: 10px;

    .buttonsection {
        margin-top: 50px;
    }

    .md-layout-item {
        margin-top: 20px;
    }

    .md-card {
        margin: 0px;
    }
}

.section-contacts {
    margin-top: -80px;
}

.section-first {
    margin-bottom: 30px;
}

.section-success {
    height: 450px;
    padding-bottom: 0px;
    margin-bottom: 0px;
}
.text-center-success {
    font-weight: bold;
    margin-top: 70px;
}

.md-layout-item-section {
    max-width: 100%;
}

.footer {
    background-color: #0130a6;
}
</style>
