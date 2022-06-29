<template>
    <v-main>
        <div class="wrapper">
            <v-app>
                <v-container
                    :style="{ backgroundImage: 'url(' + image + ')' }"
                    fluid
                    fill-height
                >
                    <v-layout align-center justify-center>
                        <v-flex xs12 sm8 md4>
                            <v-card class="elevation-12">
                                <v-tabs
                                    v-model="tab"
                                    show-arrows
                                    background-color="#0130a6"
                                    icons-and-text
                                    dark
                                    grow
                                >
                                    <v-tabs-slider
                                        color="purple darken-4"
                                    ></v-tabs-slider>
                                    <v-tab v-for="i in tabs" :key="i.name">
                                        <v-icon>{{ i.icon }}</v-icon>
                                        <div class="caption py-1">
                                            {{ i.name }}
                                        </div>
                                    </v-tab>
                                    <v-tab-item>
                                        <v-card class="px-4">
                                            <v-card-text>
                                                <v-form
                                                    ref="registerForm"
                                                    v-model="valid"
                                                    lazy-validation
                                                >
                                                    <v-row>
                                                        <v-col
                                                            cols="12"
                                                            sm="6"
                                                            md="6"
                                                        >
                                                            <v-text-field
                                                                v-model="name"
                                                                id="name"
                                                                :rules="[
                                                                    rules.required,
                                                                ]"
                                                                label="Imię"
                                                                maxlength="20"
                                                                required
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-col
                                                            cols="12"
                                                            sm="6"
                                                            md="6"
                                                        >
                                                            <v-text-field
                                                                v-model="
                                                                    surname
                                                                "
                                                                id="surname"
                                                                :rules="[
                                                                    rules.required,
                                                                ]"
                                                                label="Nazwisko"
                                                                maxlength="20"
                                                                required
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-col cols="12">
                                                            <v-text-field
                                                                v-model="email"
                                                                id="email"
                                                                :rules="
                                                                    emailRules
                                                                "
                                                                label="E-mail"
                                                                required
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-col cols="12">
                                                            <v-text-field
                                                                v-model="
                                                                    password
                                                                "
                                                                id="password"
                                                                :rules="[
                                                                    rules.required,
                                                                    rules.min,
                                                                ]"
                                                                type="password"
                                                                name="input-10-1"
                                                                label="Hasło"
                                                                hint="At least 8 characters"
                                                                counter
                                                                @click:append="
                                                                    show1 =
                                                                        !show1
                                                                "
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-col cols="12">
                                                            <v-text-field
                                                                block
                                                                v-model="verify"
                                                                :rules="[
                                                                    rules.required,
                                                                    passwordMatch,
                                                                ]"
                                                                id="verify"
                                                                type="password"
                                                                name="input-10-1"
                                                                label="Powtórz hasło"
                                                                counter
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-spacer></v-spacer>
                                                        <v-col
                                                            class="d-flex"
                                                            cols="12"
                                                            sm="3"
                                                            xsm="12"
                                                            align-end
                                                        >
                                                            <v-btn
                                                                x-large
                                                                block
                                                                :disabled="
                                                                    !valid
                                                                "
                                                                color="success"
                                                                @click="
                                                                    validate
                                                                "
                                                                >Zarejestruj</v-btn
                                                            >
                                                        </v-col>
                                                        <v-col cols="12">
                                                            <v-subheader
                                                                >Posiadasz już
                                                                konto?
                                                                <v-btn
                                                                    :to="
                                                                        appRoutes.logIn
                                                                    "
                                                                    class="registerbutton"
                                                                    x-small
                                                                    color="success"
                                                                    dark
                                                                >
                                                                    Zaloguj się
                                                                </v-btn>
                                                            </v-subheader>
                                                        </v-col>
                                                    </v-row>
                                                </v-form>
                                            </v-card-text>
                                        </v-card>
                                    </v-tab-item>
                                </v-tabs>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-app>
        </div>
    </v-main>
</template>

<script>
import backgroundimage from "../../assets/images/login.jpg";
import appRoutes from "../../consts/appRoutes";
export default {
    data: () => ({
        url: document.head.querySelector('meta[name="url"]').content,
        tab: 0,
        tabs: [{ name: "Zarejestruj się", icon: "person_outline" }],
        valid: true,
        appRoutes,
        image: backgroundimage,
        name: "",
        surname: "",
        email: "",
        password: "",
        verify: "",

        loginEmailRules: [
            (v) => !!v || "Required",
            (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
        ],
        emailRules: [
            (v) => !!v || "Required",
            (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
        ],

        show1: false,
        rules: {
            required: (value) => !!value || "Required.",
            min: (v) => (v && v.length >= 8) || "Min 8 characters",
        },
    }),

    computed: {
        passwordMatch() {
            return () => this.password === this.verify || "Password must match";
        },
    },

    methods: {
        validate() {
            if (this.$refs.registerForm.validate()) {
                let formData = new FormData();
                formData.append("name", this.name);
                formData.append("surname", this.surname);
                formData.append("email", this.email);
                formData.append("password", this.password);
                let url = this.url + "/api/register";
                this.axios.get("/sanctum/csrf-cookie").then((response) => {
                    this.axios
                        .post(url, formData)
                        .then((response) => {
                            if (response.status) {
                                document.getElementById("name").value = "";
                                document.getElementById("surname").value = "";
                                document.getElementById("email").value = "";
                                document.getElementById("password").value = "";
                                document.getElementById("verify").value = "";
                                this.$utils.showSuccess(
                                    "Rejestracja przebiegła pomyślnie",
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
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
    },
};
</script>

<style lang="scss" scoped>
.elevation-12 {
    margin-top: -130px;
}
.v-subheader {
    padding: 0px;
    .registerbutton {
        padding: 5px;
        margin-left: 10px;
    }
}
</style>
