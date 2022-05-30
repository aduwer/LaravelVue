<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-secondary mt-5">
            Contact List
        </h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody v-for="contact in contacts" :key="contact.id">
                <tr>
                    <td scope="row">{{ contact.id }}</td>
                    <td scope="row">{{ contact.name }}</td>
                    <td scope="row">{{ contact.email }}</td>
                    <td scope="row">{{ contact.designation }}</td>
                    <td scope="row">{{ contact.contact_no }}</td>
                    <td scope="row">{{ contact.designation }}</td>

                    <td>
                        <button
                            class="btn btn-danger btn-sm"
                            @click.prevent="deleteContact(contact.id)"
                        >
                            Delete
                        </button>
                        <router-link
                            :to="{
                                name: 'getcontact',
                                params: {
                                    id: contact.id,
                                    name: contact.name,
                                    email: contact.email,
                                    designation: contact.designation,
                                    number: contact.contact_no,
                                },
                            }"
                            class="btn btn-primary btn-sm"
                        >
                            Edit
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Contact",
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            let url = this.url + "/api/getContacts";
            this.axios.get(url).then((response) => {
                this.contacts = response.data;
                console.log(this.contacts);
            });
        },

        deleteContact(id) {
            let url = this.url + `/api/deleteContact/${id}`;
            this.axios.delete(url).then((response) => {
                if (response.status) {
                    console.log(response.status);
                    console.log(response.message);
                    this.loadData();
                    this.$utils.showSuccess("Success", response.message);
                } else {
                    this.$utils.showError("Error", response.message);
                }
            });
        },
    },
    mounted() {
        console.log("Contact List Component Mounted");
    },
    data() {
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            contacts: [],
        };
    },
};
</script>

<style></style>
