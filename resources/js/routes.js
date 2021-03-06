import VueRouter from "vue-router";
import ContactList from "../js/components/ContactList";
import Home from "../js/components/Home";
import AddContact from "../js/components/AddContact";
import EditContact from "../js/components/EditContact";
import Services from "../js/components/Services";
import Login from "../js/components/Login";
import Register from "../js/components/Register";
import Dashboard from "../js/components/Dashboard";
import appRoutes from "../consts/appRoutes";

const routes = [
    {
        name: "Example",
        path: appRoutes.home,
        component: Home,
    },
    {
        name: "contacts",
        path: appRoutes.contacts,
        component: ContactList,
    },
    {
        name: "addcontacts",
        path: appRoutes.addContacts,
        component: AddContact,
    },
    {
        name: "services",
        path: appRoutes.services,
        component: Services,
    },
    {
        name: "getcontact",
        path: appRoutes.editContact,
        component: EditContact,
    },
    {
        name: "login",
        path: appRoutes.logIn,
        component: Login,
    },
    {
        name: "register",
        path: appRoutes.register,
        component: Register,
    },
    {
        name: "dashboard",
        path: appRoutes.dashboard,
        component: Dashboard,
    },
];

const router = new VueRouter({
    mode: "history",
    routes,
});

export default router;
