<template>
    <v-main>
        <v-row text-center>
            <v-col xs="12" sm="12" md="4" lg="4">
                <v-card>
                    <v-img
                        src="https://tsh.io/wp-content/uploads/2020/09/code-review-best-practices.jpg"
                    ></v-img>
                </v-card>
            </v-col>

            <v-col xs="12" sm="12" md="8" lg="8">
                <v-card class="pay-raise">
                    <h1 class="title text-center">
                        Wylosuj pracownika Studio Software, który zrobi Code
                        Review
                    </h1>
                    <h4 class="description text-center">
                        Pracując jako programista, można spotkać się z praktyką
                        znaną jako code review, czasem również określaną jako
                        inspekcja, przegląd kodu. Polega ona na tym, że kod,
                        który napiszemy, zanim trafi do głównego brancha, jest
                        przeglądany przez drugiego dewelopera zwanego w tym
                        procesie reviewerem.
                    </h4>
                    <v-form ref="theWinner" lazy-validation>
                        <v-select
                            :items="types"
                            id="type"
                            v-model="selectedType"
                            label="Wybierz programistę jakiego potrzebujesz"
                            :rules="[rules.required]"
                        ></v-select>
                        <div class="md-layout">
                            <div class="md-layout-item mx-auto text-center">
                                <v-btn
                                    class="md-success"
                                    @click="loadDataWinner"
                                    >Losowanie</v-btn
                                >
                            </div>
                        </div>
                    </v-form>
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
import appRoutes from "../../consts/appRoutes";
export default {
    data() {
        return {
            appRoutes,
            types: ["Backend Developer", "Frontend Developer"],
            person: {},
            rules: {
                required: (value) => !!value || "Required",
            },
            selectedType: "",
        };
    },

    methods: {
        loadDataWinner() {
            if (this.$refs.theWinner.validate()) {
                let formData = new FormData();
                formData.append("type", this.selectedType);
                this.axios.get("/sanctum/csrf-cookie").then((response) => {
                    this.axios
                        .post("api/getOneUserFromTableToCodeReview", formData)
                        .then((response) => {
                            this.person = response.data;
                        })
                        .catch((error) => {
                            this.errors.push(error.response.data.error);
                        });
                });
            }
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

.md-button {
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
}
</style>
