import PetOrganizer from "./components/PetOrganizer";
import CharacterList from "./components/CharacterList";
import VueRouter from "vue-router";

export default new VueRouter({
    routes: [
        {path: '/', component: PetOrganizer},
        {path: '/characters', component: CharacterList},
    ]
});

