<template>
    <div>
        <div class="container">
            <h2 class="text-center p-2 text-white bg-secondary mt-5">
                Edit Contact
            </h2>
            <div class="card-body">
                <div class="col-md-6 offset-md-3">
                    <form
                        id="validateForm"
                        @submit.prevent="updateContact"
                        enctype="multipart/form-data"
                        novalidate
                    >
                        <div class="alert alert-danger" v-if="errors.length">
                            <ul class="mb-0">
                                <li
                                    v-for="(error, index) in errors"
                                    :key="index"
                                >
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Name </label>
                            <input
                                type="text"
                                id="name"
                                v-model="name"
                                class="form-control"
                                placeholder="Enter Name"
                            />
                        </div>

                        <div class="form-group">
                            <label for="email">Email </label>
                            <input
                                type="email"
                                id="email"
                                v-model="email"
                                class="form-control"
                                placeholder="Enter email"
                            />
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input
                                type="text"
                                id="designation"
                                v-model="designation"
                                class="form-control"
                                placeholder="Enter Designation"
                            />
                        </div>

                        <div class="form-group">
                            <label>Contact number </label>
                            <input
                                type="number"
                                id="contact_no"
                                v-model="contact_no"
                                class="form-control"
                                placeholder="Enter Contact number"
                            />
                        </div>

                        <div class="form-group">
                            <label>Biography </label>
                            <textarea
                                v-model="bio"
                                id="bio"
                                cols="20"
                                rows="5"
                                class="form-control"
                            >
                            </textarea>
                        </div>

                        <div class="custom-file">
                            <input
                                type="file"
                                name="image"
                                class="custom-file-input"
                                id="validatedCustomFile"
                                v-on:change="onImageChange"
                            />
                            <label
                                class="custom-file-label"
                                for="validatedCustomFile"
                            >
                                Choose file
                            </label>
                        </div>

                        <button class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            // url: document.head.querySelector('meta[name="url"]').content,
            contacts: {},
            name: "",
            email: "",
            bio: "",
            designation: "",
            contact_no: "",
            image: "",
            errors: [],
        };
    },
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            let url = this.url + `/api/contactDetail/${this.$route.params.id}`;
            this.axios.get(url).then((response) => {
                this.contact = response.data;
                console.log(this.contact);
                document.getElementById("name").value = `${this.contact.name}`;
                document.getElementById(
                    "email"
                ).value = `${this.contact.email}`;
                document.getElementById(
                    "designation"
                ).value = `${this.contact.designation}`;
                document.getElementById("bio").value = `${this.contact.bio}`;
                document.getElementById(
                    "contact_no"
                ).value = `${this.contact.contact_no}`;
            });
        },
        updateContact() {
            this.errors = [];
            if (!this.name) {
                this.errors.push("Name is required");
            }
            if (!this.email) {
                this.errors.push("Email is required");
            }
            if (!this.designation) {
                this.errors.push("Designation is required");
            }
            if (!this.contact_no) {
                this.errors.push("Contact number is required");
            }

            if (!this.errors.length) {
                let formData = new FormData();
                formData.append("name", this.name);
                formData.append("email", this.email);
                formData.append("image", this.image);
                formData.append("designation", this.designation);
                formData.append("bio", this.bio);
                formData.append("contact_no", this.contact_no);
                let url =
                    this.url + `/api/updateContact/${this.$route.params.id}`;
                this.axios
                    .post(url, formData)
                    .then((response) => {
                        if (response.status) {
                            this.$utils.showSuccess(
                                "Success",
                                response.message
                            );
                            this.$router.push({
                                name: "/",
                            });
                        } else {
                            this.$utils.showError("Error", response.message);
                        }
                    })
                    .catch((error) => {
                        this.errors.push(error.response.data.error);
                    });
            }
        },
        onImageChange(e) {
            this.image = e.target.files[0];
        },
    },
    mounted() {
        console.log("Edit Contact component mounted.");
    },
};
</script>

<style></style>
