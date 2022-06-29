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
                                                    ref="loginForm"
                                                    v-model="valid"
                                                    lazy-validation
                                                >
                                                    <v-row>
                                                        <v-col cols="12">
                                                            <v-text-field
                                                                v-model="email"
                                                                :rules="
                                                                    loginEmailRules
                                                                "
                                                                id="email"
                                                                label="E-mail"
                                                                required
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-col cols="12">
                                                            <v-text-field
                                                                v-model="
                                                                    password
                                                                "
                                                                :rules="[
                                                                    rules.required,
                                                                    rules.min,
                                                                ]"
                                                                id="password"
                                                                type="password"
                                                                name="input-10-1"
                                                                label="Hasło"
                                                                hint="At least 8 characters"
                                                                counter
                                                            ></v-text-field>
                                                        </v-col>
                                                        <v-col
                                                            class="d-flex"
                                                            cols="12"
                                                            sm="6"
                                                            xsm="12"
                                                        >
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
                                                            >
                                                                Zaloguj się
                                                            </v-btn>
                                                        </v-col>
                                                        <v-col cols="12">
                                                            <v-subheader
                                                                >Nie masz konta?
                                                                <v-btn
                                                                    :to="
                                                                        appRoutes.register
                                                                    "
                                                                    class="registerbutton"
                                                                    x-small
                                                                    color="success"
                                                                    dark
                                                                >
                                                                    Zarejestruj
                                                                    się
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
        tabs: [{ name: "Zaloguj się", icon: "person_outline" }],
        valid: true,
        appRoutes,
        image: backgroundimage,
        email: "",
        password: "",
        loginEmailRules: [
            (v) => !!v || "Required",
            (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
        ],
        rules: {
            required: (value) => !!value || "Required.",
            min: (v) => (v && v.length >= 8) || "Min 8 characters",
        },
    }),

    methods: {
        validate() {
            if (this.$refs.loginForm.validate()) {
                let formData = new FormData();
                formData.append("email", this.email);
                formData.append("password", this.password);
                console.log(this.email);
                console.log(this.password);
                let url = this.url + "/api/login";
                const self = this;
                console.log(url);
                this.axios.post(url, formData).then((response) => {
                    console.log("WSZEDLEM W PIERWSZY AXIOS");
                    console.log(response);
                    sleep(100000);
                    self.axios
                        .post(url, formData)
                        .then((response) => {
                            console.log("Wchodzi w then");
                            if (response.status) {
                                self.$router.go("/dashboard");
                            } else {
                                self.error = response.data.message;
                            }
                        })
                        .catch((error) => {
                            console.log("Wchodzi w catch");
                            self.errors.push(error.response.data.error);
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

        beforeRouteEnter(to, from, next) {
            if (window.Laravel.isLoggedIn) {
                return next("dashboard");
            }
            next();
        },
    },
};
</script>

<style lang="scss" scoped>
.elevation-12 {
    margin-top: -150px;
}

.v-subheader {
    padding: 0px;
    .registerbutton {
        padding: 5px;
        margin-left: 10px;
    }
}
</style>
