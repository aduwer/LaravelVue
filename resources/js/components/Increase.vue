<template>
    <v-main>
        <v-row text-center>
            <v-col xs="12" sm="12" md="4" lg="4">
                <v-card>
                    <v-img :src="increase"></v-img>
                </v-card>
            </v-col>

            <v-col xs="12" sm="12" md="8" lg="8">
                <v-card class="pay-raise">
                    <h1 class="title text-center">
                        Wylosuj pracownika Studio Software, który dostanie
                        podwyżkę
                    </h1>
                    <h5 class="description text-center description-style">
                        Jak wynika z badań trendów, jednym z głównych powodów
                        zmiany miejsca zatrudnienia jest chęć uzyskania
                        większego wynagrodzenia. Wykwalifikowani specjaliści
                        chcą skorzystać ze sprzyjającej im sytuacji na rynku
                        pracy i zarabiać więcej. Jednak dla niektórych zmiana
                        pracy wydaje się być łatwiejsza niż otrzymanie podwyżki
                        w obecnym miejscu zatrudnienia. Warunki przyznawania
                        podwyżek są zależne od zasad obowiązujących w danej
                        firmie. Nie istnieją zatem uniwersalne wskazówki
                        dotyczące tego, kiedy i w jakich okolicznościach warto
                        poprosić o podwyżkę, aby mieć jak największe szanse na
                        jej przyznanie. Wychodzimy więc na przeciw i sami
                        wylosujemy osobę, która taką podwyżkę otrzyma.
                    </h5>
                    <div class="md-layout">
                        <div class="md-layout-item mx-auto text-center">
                            <v-btn class="success" @click.prevent="loadData()"
                                >Losowanie</v-btn
                            >
                        </div>
                    </div>
                </v-card>
            </v-col>
        </v-row>

        <div class="section text-center">
            <div class="container">
                <h2 class="text-center">
                    <v-icon>star</v-icon>ZWYCIĘZCA<v-icon>star</v-icon>
                </h2>
                <div class="md-layout">
                    <div class="md-layout-item mx-auto text-center">
                        <v-sheet
                            class="winner"
                            color="white"
                            elevation="10"
                            height="60"
                            ><h1 class="description text-center">
                                {{ person.name }}
                                {{ person.surname }}
                            </h1></v-sheet
                        >
                    </div>
                </div>
            </div>
        </div>
    </v-main>
</template>

<script>
import increase from "../../assets/images/increase.png";
import appRoutes from "../../consts/appRoutes";
export default {
    data() {
        return {
            appRoutes,
            increase,
            person: [],
        };
    },

    methods: {
        loadData() {
            this.axios.get("api/getPerson").then((response) => {
                this.person = response.data;
                console.log(this.person);
            });
        },
    },
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

.v-card {
    margin-top: 40px;
    margin-left: 20px;
    margin-right: 10px;
}

.pay-raise {
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
    margin-right: 10px;
}
.v-sheet.v-card:not(.v-sheet--outlined) {
    box-shadow: none;
}

.success {
    padding: 8px 30px !important;
}

.v-icon {
    vertical-align: baseline !important;
    margin-left: 10px;
    margin-right: 10px;
}

@media screen and (max-width: 450px) {
    .winner {
        height: 120px !important;
        margin-left: 20px;
    }

    .pay-raise {
        margin-top: 0px;
    }
}

@media screen and (min-width: 960px) and (max-width: 1540px) {
    .title {
        font-size: 17px !important;
        margin: 10px;
    }

    .description-style {
        font-size: 12px;
    }

    .userform {
        padding-top: 0px;
        padding-bottom: 0px;
    }

    .pay-raise {
        margin-top: 15px !important;
    }
}
</style>
