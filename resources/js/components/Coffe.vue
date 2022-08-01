<template>
    <v-main>
        <v-row text-center>
            <v-col xs="12" sm="12" md="4" lg="4">
                <v-card class="image">
                    <v-img :src="coffe"></v-img>
                </v-card>
            </v-col>

            <v-col xs="12" sm="12" md="8" lg="8">
                <v-card class="pay-raise">
                    <h1 class="title text-center">
                        Wylosuj pracownika Studio Software, który zrobi Ci kawkę
                    </h1>
                    <h4 class="description text-center description-style">
                        Wyniki badań naukowych jednoznacznie wskazują, że picie
                        kawy niesie za sobą wiele korzyści zdrowotnych. Jesteś w
                        biurze i napiłbyś się kawki? Wylosuj pracownika, który
                        wstanie i będzie musiał Ci ją zrobić. Lecz najpierw
                        dodaj osoby, które pracują dzisiaj w biurze.
                    </h4>
                </v-card>

                <v-row align="center">
                    <v-form ref="addUserInCompany" lazy-validation>
                        <v-container class="userform">
                            <v-row>
                                <v-col cols="12" md="6">
                                    <v-text-field
                                        id="name"
                                        v-model="name"
                                        :rules="[rules.required]"
                                        maxlength="20"
                                        label="Imię"
                                    ></v-text-field>
                                </v-col>

                                <v-col cols="12" md="6">
                                    <v-text-field
                                        id="surname"
                                        v-model="surname"
                                        :rules="[rules.required]"
                                        label="Nazwisko"
                                        maxlength="20"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                    <div class="md-layout">
                        <div class="md-layout-item mx-auto text-center">
                            <v-btn class="success" @click="createUser"
                                >Dodaj osobę do losowania</v-btn
                            >
                        </div>
                    </div>
                </v-row>
            </v-col>
        </v-row>

        <v-row>
            <v-col xs="12" sm="12" md="4" lg="4">
                <v-card>
                    <div class="md-layout">
                        <div class="md-layout-item mx-auto text-center">
                            <v-sheet color="white" elevation="10"
                                ><h3 class="text-center">Osoby w biurze</h3>
                                <h4
                                    class="description"
                                    v-for="user in users"
                                    :key="user.id"
                                >
                                    {{ user.name }} {{ user.surname }}
                                    <br /></h4
                            ></v-sheet>
                            <v-btn
                                class="primary buttons"
                                @click="deleteAllUsers"
                                >Wyczyść</v-btn
                            >
                        </div>
                    </div>
                </v-card>
            </v-col>

            <v-col class="typecapacity" xs="12" sm="12" md="8" lg="8">
                <v-form ref="theWinner" lazy-validation>
                    <h4
                        class="description text-center description-type-capacity"
                    >
                        Wybierz rodzaj kawy
                    </h4>
                    <v-container fluid>
                        <v-row align="center">
                            <v-col class="d-flex">
                                <v-select
                                    xs="12"
                                    sm="12"
                                    :items="types"
                                    v-model="selectedType"
                                    id="type"
                                    label="Rodzaj"
                                    :rules="[rules.required]"
                                ></v-select>
                            </v-col>
                        </v-row>
                    </v-container>

                    <h4
                        class="description text-center description-type-capacity"
                    >
                        Wybierz pojemność
                    </h4>
                    <v-container fluid>
                        <v-row align="center">
                            <v-col class="d-flex">
                                <v-select
                                    xs="12"
                                    sm="12"
                                    :items="capacity"
                                    v-model="selectedCapacity"
                                    id="capacity"
                                    label="Pojemność"
                                    :rules="[rules.required]"
                                ></v-select>
                            </v-col>
                        </v-row>
                    </v-container>
                    <div class="md-layout">
                        <div class="md-layout-item mx-auto text-center">
                            <v-btn class="success draw" @click="loadDataWinner"
                                >Losowanie</v-btn
                            >
                        </div>
                    </div>
                </v-form>
            </v-col>
        </v-row>

        <div class="section text-center">
            <div class="container">
                <h2 class="text-center">
                    <v-icon>star</v-icon>PO KAWĘ IDZIE<v-icon>star</v-icon>
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
import coffe from "../../assets/images/kawa.jpg";

export default {
    data() {
        return {
            appRoutes,
            coffe,
            users: [],
            person: [],
            types: [
                "Caffé latte",
                "Cappuccino",
                "Flat white",
                "Latte macchiato",
                "Espresso",
                "Americano",
                "Double espresso",
            ],
            capacity: ["100 ml", "150 ml", "200 ml", "250 ml"],
            rules: {
                required: (value) => !!value || "Required",
            },
            name: "",
            surname: "",
            selectedType: "",
            selectedCapacity: "",
        };
    },

    methods: {
        createUser() {
            if (this.$refs.addUserInCompany.validate()) {
                let formData = new FormData();
                formData.append("name", this.name);
                formData.append("surname", this.surname);
                this.axios.get("/sanctum/csrf-cookie").then((response) => {
                    this.axios
                        .post("api/coffe", formData)
                        .then((response) => {
                            if (response.status) {
                                this.$refs.addUserInCompany.reset();
                                this.loadDataAllUsers();
                                this.$utils.showSuccess(
                                    "Dodano użytkownika do losowania",
                                    response.message
                                );
                            } else {
                                this.$utils.showError(
                                    "Error",
                                    response.message
                                );
                            }
                        })
                        .catch((error) => {
                            this.errors.push(error.response.data.error);
                        });
                });
            }
        },
        // reset() {
        //     this.$refs.form.reset();
        // },
        // resetValidation() {
        //     this.$refs.form.resetValidation();
        // },

        loadDataAllUsers() {
            this.axios.get("api/getUsersWhoWorkFromOffice").then((response) => {
                this.users = response.data;
            });
        },
        loadDataWinner() {
            if (this.$refs.theWinner.validate()) {
                let formData = new FormData();
                formData.append("type", this.selectedType);
                formData.append("capacity", this.selectedCapacity);
                this.axios.get("/sanctum/csrf-cookie").then((response) => {
                    this.axios
                        .post("api/getPersonWhoWorkFromOffice", formData)
                        .then((response) => {
                            this.person = response.data;
                        })
                        .catch((error) => {
                            this.errors.push(error.response.data.error);
                        });
                });
            }
        },
        deleteAllUsers() {
            this.axios
                .delete("api/deleteUsersWhoWorkFromOffice")
                .then((response) => {
                    if (response.status) {
                        console.log(response.status);
                        console.log(response.message);
                        this.loadDataAllUsers();
                        this.$utils.showSuccess(
                            "Lista osób będących w biurze wyczyszczona",
                            response.message
                        );
                    } else {
                        this.$utils.showError("Error", response.message);
                    }
                });
        },
    },
    created() {
        this.loadDataAllUsers();
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
    margin-top: 30px;
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

@media screen and (min-width: 960px) {
    .typecapacity {
        margin-top: 50px;
    }

    .d-flex {
        padding-top: 0px;
        padding-bottom: 0px;
    }

    .container--fluid {
        padding-bottom: 0px;
    }

    .description-type-capacity {
        margin-bottom: 0px;
    }
}

@media screen and (min-width: 356px) and (max-width: 523px) {
    .buttons {
        margin-top: 10px;
    }

    h3 {
        font-size: 18px;
    }

    .winner {
        height: 120px !important;
    }

    .image {
        padding-right: 15px;
    }

    .pay-raise {
        margin-top: 0px;
    }
}

@media screen and (min-width: 960px) and (max-width: 1540px) {
    .title {
        font-size: 20px !important;
        margin: 0px !important;
    }

    .description-style {
        font-size: 13px;
    }

    .userform {
        padding-top: 0px;
        padding-bottom: 0px;
    }

    .pay-raise {
        margin-top: 15px !important;
    }
}

.draw {
    margin-top: 10px;
}
</style>
