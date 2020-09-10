import PetOrganizer from "./components/PetOrganizer";
import Users from "./components/Users";
import VueRouter from "vue-router";

export default new VueRouter({
    routes: [
        {path: '/', component: PetOrganizer},
        {path: '/users', component: Users},
    ]
});

