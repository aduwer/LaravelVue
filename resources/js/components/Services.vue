<template>
    <v-main>
        <div class="wrapper">
            <div class="main main-raised">
                <v-img
                    :src="backgroundStudioSoftware"
                    class="img-responsive"
                ></v-img>

                <div class="section">
                    <div class="container">
                        <div
                            class="md-layout-item md-size-66 md-xsmall-size-100 mx-auto text-center"
                        >
                            <h2 class="text-center title-service">
                                Stworzymy
                                <span> dedykowane oprogramowanie </span>
                                na miarę Twoich potrzeb
                            </h2>

                            <h5 class="description">
                                Od ponad 6 lat współpracujemy z firmami i
                                startupami z Polski i zagranicy, budując
                                wysokiej jakości produkty IT. Naszym celem jest
                                dostarczanie usług zgodnie z celami biznesowymi
                                naszych klientów. Tworzymy rozwiązania dla
                                klientów z różnych branż, takich jak
                                przykładowo: edukacja, opieka zdrowotna,
                                transport, Fintech itp.
                            </h5>

                            <div>
                                <v-switch
                                    v-model="reverse"
                                    label="Zamień"
                                ></v-switch>
                                <v-timeline
                                    :reverse="reverse"
                                    :dense="$vuetify.breakpoint.smAndDown"
                                >
                                    <v-timeline-item
                                        v-for="service in services"
                                        :key="service.title"
                                    >
                                        <span slot="opposite">{{
                                            service.title
                                        }}</span>
                                        <v-card class="elevation-2">
                                            <v-card-title class="text-h5">
                                                {{ service.title }}
                                            </v-card-title>
                                            <v-card-text>
                                                {{ service.description }}
                                            </v-card-text>
                                        </v-card>
                                    </v-timeline-item>
                                </v-timeline>
                            </div>

                            <h2 class="text-center title-service">
                                Zespół
                                <span> Studio Software </span>
                                tworzą wyjątkowi ludzie
                            </h2>

                            <v-carousel hide-delimiters class="carousel">
                                <v-carousel-item
                                    v-for="(item, i) in items"
                                    :key="i"
                                    :src="item.src"
                                ></v-carousel-item>
                            </v-carousel>
                        </div>
                    </div>
                </div>

                <div
                    class="section section-success"
                    :style="{
                        backgroundImage:
                            'url(' + backgroundStudioSoftware3 + ')',
                    }"
                >
                    <div class="container container-product">
                        <div class="md-layout">
                            <div
                                class="md-layout-item md-size-66 md-xsmall-size-100 mx-auto text-center"
                            >
                                <h3 class="description">
                                    Wybierz dedykowane warsztaty produktowe
                                </h3>

                                <md-button
                                    href="https://studiosoftware.pl/kontakt/"
                                    class="md-danger md-lg buttonsection"
                                    target="_blank"
                                >
                                    Skontaktuj się z nami</md-button
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="container">
                        <div
                            class="md-layout-item md-size-66 md-xsmall-size-100 mx-auto text-center"
                        >
                            <v-container class="short-description">
                                <v-row>
                                    <v-col md="12">
                                        <v-row no-gutters>
                                            <v-col md="6"
                                                ><v-img
                                                    :src="
                                                        backgroundStudioSoftware2
                                                    "
                                                    class="img-responsive"
                                                ></v-img
                                            ></v-col>
                                            <v-col md="6"
                                                ><h3
                                                    class="text-center title-service"
                                                >
                                                    Wartości, które kształtują
                                                    naszą kulturę
                                                </h3>

                                                <h5 class="description">
                                                    Nieustannie dbany zarówno o
                                                    relacje z naszymi
                                                    partnerami, jak i
                                                    pracownikami - budujemy
                                                    wspólną przestrzeń, gdzie
                                                    każdy może się rozwijać,
                                                    wykazywać inicjatywę oraz
                                                    dzielić się swoimi
                                                    pomysłami. Inwestujemy w
                                                    nasz zespół i dbamy o dobrą
                                                    atmosferę, dzięki czemu z
                                                    przyjemnością możemy tworzyć
                                                    dedykowane rozwiązania dla
                                                    naszych klientów oraz
                                                    pomagać im osiągać sukcesy.
                                                </h5></v-col
                                            >
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </div>
                    </div>
                </div>

                <v-footer dark padless>
                    <v-card class="flex footer" tile>
                        <v-card-title>
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
import backgroundss from "../../assets/images/jpg1.jpg";
import backgroundss2 from "../../assets/images/icon/11.png";
import backgroundss3 from "../../assets/images/backgroundStudioSoftware.png";
import team1 from "../../assets/images/teamStudioSoftware/01.jpg";
import team2 from "../../assets/images/teamStudioSoftware/02.jpg";
import team3 from "../../assets/images/teamStudioSoftware/03.jpg";
import team4 from "../../assets/images/teamStudioSoftware/04.jpg";
import team5 from "../../assets/images/teamStudioSoftware/05.jpg";
import team6 from "../../assets/images/teamStudioSoftware/06.jpg";
import team7 from "../../assets/images/teamStudioSoftware/07.jpg";
import team8 from "../../assets/images/teamStudioSoftware/08.jpg";
import team9 from "../../assets/images/teamStudioSoftware/09.jpg";
import team10 from "../../assets/images/teamStudioSoftware/10.jpg";
import team11 from "../../assets/images/teamStudioSoftware/11.jpg";
import { mdiInstagram } from "@mdi/js";
import { mdiLinkedin } from "@mdi/js";
import { mdiFacebook } from "@mdi/js";
import { mdiTwitter } from "@mdi/js";

export default {
    bodyClass: "services-page",
    data() {
        return {
            backgroundStudioSoftware: backgroundss,
            backgroundStudioSoftware2: backgroundss2,
            backgroundStudioSoftware3: backgroundss3,
            reverse: true,
            icon: mdiFacebook,
            icon1: mdiLinkedin,
            icon2: mdiInstagram,
            icon3: mdiTwitter,
            services: [
                {
                    title: "Tworzenie aplikacji webowych",
                    description:
                        "Jesteśmy software housem, który tworzy rozwiązania IT szyte na miarę klienta. Wybierz oprogramowanie webowe z wykorzystaniem sprawdzonych technologii takich jak JavaScript, czy PHP i znanych frameworków: Symfony, Laravel, React, Vue.js, czy Node.js.",
                },
                {
                    title: "Tworzenie oprogramowania",
                    description:
                        "Pomagamy startupom i firmom w tworzeniu dedykowanych rozwiązań. Transformacja cyfrowa, integracje systemowe, internet rzeczy to jedne z naszych kluczowych usług. Dbamy o to, aby stale dostarczać naszym klientom nowoczesne i kompleksowe rozwiązania.",
                },
                {
                    title: "DevOps&Cloud",
                    description:
                        "Oferujemy usługi z zakresu zarządzania rozwiązaniami chmurowymi, migracji do chmury, budowania systemów IT opartych na AWS, a także wdrażania procesów CI/CD w celu zapewnienia maksymalnego bezpieczeństwa. Zajmujemy się także pełnym wsparciem i monitoringiem aplikacji.",
                },
                {
                    title: "Budowa MVP",
                    description:
                        "Nasze usługi obejmują walidację pomysłu, prototypowanie oraz budowanie funkcjonalnego MVP. W zakres naszej pracy wchodzi także pełna analiza i niezbędne prace programistyczne. Możemy wdrożyć MVP w zaledwie 4-6 tygodni.",
                },
                {
                    title: "Design i warsztaty Event Storming",
                    description:
                        "Odpowiednio zaprojektowane aplikacje, które są przyjazne dla użytkownika pozwolą Ci się wyróżnić na tle konkurencji. Podnieś atrakcyjność swojego produktu dzięki naszym usługom – dostarczymy Ci unikalny projekt stworzony z zasadami UX/UI.",
                },
                {
                    title: "Outsourcing IT, zespoły Agile",
                    description:
                        "Skorzystaj z naszego szerokiego doświadczenia w outsourcingu IT i dostępu do nowoczesnych rozwiązań. Na każdym etapie współpracy stawiamy na efektywność, transparencję i wzajemne zaufanie. Zrealizujemy projekt, który będzie w pełni odpowiadał Twoim potrzebom biznesowym.",
                },
            ],
            items: [
                {
                    src: team1,
                },
                {
                    src: team2,
                },
                {
                    src: team3,
                },
                {
                    src: team4,
                },
                {
                    src: team5,
                },
                {
                    src: team6,
                },
                {
                    src: team7,
                },
                {
                    src: team8,
                },
                {
                    src: team9,
                },
                {
                    src: team10,
                },
                {
                    src: team11,
                },
            ],
        };
    },
};
</script>

<style lang="scss" scoped>
span {
    color: #0130a6;
}

.md-layout-item {
    max-width: 100%;
}

.section {
    padding: 30px;
}

.v-timeline-item__opposite {
    span {
        font-size: 18px !important;
    }
}

@media screen and (max-width: 450px) {
    .v-card__title {
        font-size: 13px !important;
    }

    .v-card__text {
        font-size: 10px !important;
    }

    .title-service {
        font-size: 17px !important;
        padding-top: 20px;
    }

    .description {
        font-size: 13px;
    }
}

.v-timeline-item__divider {
    margin-left: 20px !important;
}

.short-description {
    margin-top: 70px;
    margin-bottom: 50px;

    @media screen and (min-width: 960px) {
        .description {
            padding-left: 60px;
        }
        .title-service {
            padding-top: 10px;
            padding-left: 60px;
        }
    }
}

.container-product {
    margin-top: -30px;
    .description {
        color: white;
    }
}

.footer {
    background-color: #0130a6;
}
</style>
