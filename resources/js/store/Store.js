import Vuex from 'vuex';
import Vue from 'vue';
import Pets from './modules/PetStore';
import Characters from './modules/CharacterStore';

Vue.use(Vuex);

export default new Vuex.Store({
    'modules': {
        Pets,
        Characters
    }
});

