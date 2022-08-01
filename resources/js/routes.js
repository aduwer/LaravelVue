import VueRouter from "vue-router";
import ContactList from "../js/components/ContactList";
import Home from "../js/components/Home";
import AddContact from "../js/components/AddContact";
import EditContact from "../js/components/EditContact";
import Services from "../js/components/Services";
import Login from "../js/components/Login";
import Register from "../js/components/Register";
import Dashboard from "../js/components/Dashboard";
import Draw from "../js/components/Draw";
import Coffe from "../js/components/Coffe";
import CodeReview from "../js/components/CodeReview";
import Increase from "../js/components/Increase";
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
        name: "profil",
        path: appRoutes.profil,
        component: Dashboard,
    },
    {
        name: "draw",
        path: appRoutes.draw,
        component: Draw,
    },
    {
        name: "coffe",
        path: appRoutes.coffe,
        component: Coffe,
    },
    {
        name: "CodeReview",
        path: appRoutes.codereview,
        component: CodeReview,
    },
    {
        name: "increase",
        path: appRoutes.increase,
        component: Increase,
    },
];

const router = new VueRouter({
    mode: "history",
    routes,
});

export default router;
