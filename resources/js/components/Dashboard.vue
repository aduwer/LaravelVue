<template>
    <v-main>
        <div class="alert alert-success">
            <div class="container">
                <button
                    type="button"
                    aria-hidden="true"
                    class="close"
                    @click="(event) => removeNotify(event, 'alert-success')"
                >
                    <md-icon>clear</md-icon>
                </button>
                <div class="alert-icon">
                    <md-icon>check</md-icon>
                </div>

                <b>
                    PROFIL UŻYTKOWNIKA <span> {{ fullNameDatabase }} </span>
                </b>
            </div>
        </div>

        <div class="wrapper">
            <v-container id="user-profile" fluid tag="section">
                <v-row justify="center">
                    <v-col cols="12" md="4">
                        <v-card-text class="text-center">
                            <img
                                class="logo"
                                href="https://localhost.pl"
                                :src="logo"
                            />
                            <h6 class="display-1 mb-1 grey--text">
                                {{ positionDatabase }}
                            </h6>
                            <h4
                                class="display-2 font-weight-light mb-3 black--text"
                            >
                                {{ fullNameDatabase }}
                            </h4>
                        </v-card-text>
                    </v-col>
                    <v-col cols="12" md="8">
                        <v-form ref="updateUser" lazy-validation>
                            <v-container class="py-0">
                                <v-row>
                                    <v-col cols="12" md="6">
                                        <v-text-field
                                            label="Imię"
                                            id="name"
                                            v-model="name"
                                            class="purple-input"
                                            :placeholder="nameDatabase"
                                            :rules="[rules.required]"
                                        />
                                    </v-col>

                                    <v-col cols="12" md="6">
                                        <v-text-field
                                            label="Nazwisko"
                                            id="surname"
                                            v-model="surname"
                                            class="purple-input"
                                            :placeholder="surnameDatabase"
                                            :rules="[rules.required]"
                                        />
                                    </v-col>

                                    <v-col cols="12" md="6">
                                        <v-text-field
                                            label="Email"
                                            id="email"
                                            v-model="email"
                                            class="purple-input"
                                            :placeholder="emailAdressDatabase"
                                            :rules="[rules.required]"
                                        />
                                    </v-col>

                                    <v-col cols="12" md="6">
                                        <v-select
                                            :items="positions"
                                            id="position"
                                            v-model="position"
                                            label="Stanowisko"
                                            :rules="[rules.required]"
                                        ></v-select>
                                    </v-col>

                                    <v-col cols="12" md="4">
                                        <v-text-field
                                            label="Adres"
                                            id="address"
                                            v-model="address"
                                            class="purple-input"
                                            :placeholder="addressDatabase"
                                            :rules="[rules.required]"
                                        />
                                    </v-col>

                                    <v-col cols="12" md="4">
                                        <v-text-field
                                            label="Miasto"
                                            id="city"
                                            v-model="city"
                                            class="purple-input"
                                            :placeholder="cityDatabase"
                                            :rules="[rules.required]"
                                        />
                                    </v-col>

                                    <v-col cols="12" md="4">
                                        <v-text-field
                                            class="purple-input"
                                            label="Kod pocztowy"
                                            id="ZIPcode"
                                            v-model="ZIPcode"
                                            type="number"
                                            :placeholder="ZIPcodeDatabase"
                                            :rules="[rules.required]"
                                        />
                                    </v-col>

                                    <v-col cols="12" class="text-right">
                                        <v-btn
                                            color="success"
                                            class="mr-0"
                                            @click="updateUser"
                                        >
                                            AKTUALIZUJ
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-form>
                    </v-col>
                </v-row>
            </v-container>
        </div>
    </v-main>
</template>

<script>
import logo from "../../assets/images/znakfirmowy.png";
export default {
    data() {
        return {
            positions: [
                "Backend Developer",
                "Frontend Developer",
                "Fullstack Developer",
                "Project Manager",
                "Tester oprogramowania",
                "Pracownik biurowy",
            ],
            name: "",
            surname: "",
            email: "",
            position: "",
            address: "",
            city: "",
            ZIPcode: "",
            rules: {
                required: (value) => !!value || "Required",
            },
            logo: logo,
        };
    },
    methods: {
        removeNotify(e, notifyClass) {
            var target = e.target;
            while (target.className.indexOf(notifyClass) === -1) {
                target = target.parentNode;
            }
            return target.parentNode.removeChild(target);
        },

        updateUser() {
            if (this.$refs.updateUser.validate()) {
                let formData = new FormData();
                formData.append("name", this.name);
                formData.append("surname", this.surname);
                formData.append("email", this.email);
                formData.append("position", this.position);
                formData.append("address", this.address);
                formData.append("city", this.city);
                formData.append("ZIPcode", this.ZIPcode);
                this.axios
                    .post("api/updateUser", formData)
                    .then((response) => {
                        if (response.status) {
                            this.$refs.updateUser.reset();
                            this.$utils.showSuccess(
                                "Zaktualizowano pomyślnie",
                                response.message
                            );
                        } else {
                            this.$utils.showError(
                                "Aktualizacja nie powiodła się",
                                response.message
                            );
                        }
                    })
                    .catch((error) => {
                        this.errors.push(error.response.data.error);
                    });
            }
        },
    },
    mounted() {
        console.log(window.LaravelUser.user.name);
    },

    computed: {
        fullNameDatabase() {
            return (
                window.LaravelUser.user.name +
                " " +
                window.LaravelUser.user.surname
            );
        },

        nameDatabase() {
            return window.LaravelUser.user.name;
        },

        surnameDatabase() {
            return window.LaravelUser.user.surname;
        },

        emailAdressDatabase() {
            return window.LaravelUser.user.email;
        },

        positionDatabase() {
            return window.LaravelUser.user.position;
        },

        addressDatabase() {
            return window.LaravelUser.user.address;
        },

        cityDatabase() {
            return window.LaravelUser.user.city;
        },

        ZIPcodeDatabase() {
            return window.LaravelUser.user.ZIPcode;
        },
    },
};
</script>
>

<style lang="scss" scoped>
.wrapper {
    margin-top: 50px;

    .logo {
        height: 100px !important;
    }
}
</style>
