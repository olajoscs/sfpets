import PetOrganizer from "./components/PetOrganizer";
import CharacterList from "./components/Character/CharacterList";
import GenerateToken from "./components/GenerateToken";
import VueRouter from "vue-router";

export default new VueRouter({
    routes: [
        {path: '/', component: PetOrganizer},
        {path: '/characters', component: CharacterList},
        {path: '/generate-token', component: GenerateToken}
    ]
});

