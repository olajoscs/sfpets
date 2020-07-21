import Axios from 'axios';
import DiscoveredPetRepository from '../../services/DiscoveredPetRepository';
import FoundPetRepository from '../../services/FoundPetRepository';

function getPet(state, petId) {
    return state.pets.find(pet => pet.id === petId);
}

const petState = {
    pets: []
};


const getters = {
    allPets: state => state.pets,
    discoveredPets: state => state.pets.filter(pet => pet.isDiscovered && !pet.isFound && pet.available),
    foundPets: state => state.pets.filter(pet => pet.isFound),
    getPet: state => petId => getPet(state, petId),
};


const actions = {
    async fetchPets({commit}) {
        const response = await Axios.get('/pet-list');

        commit('setPets', response.data);
        commit('reOrder');
    },

    async setDiscovered({commit}, {petId, isDiscovered}) {
        commit('setDiscovered', {petId, isDiscovered});
        commit('reOrder');
    },

    async setFound({commit}, {petId, isFound}) {
        commit('setFound', {petId, isFound});
        commit('reOrder');
    },
};


const mutations = {
    setPets: (state, pets) => {
        const discoveredPets = DiscoveredPetRepository.getAll();
        const foundPets = FoundPetRepository.getAll();

        state.pets = pets.map((pet) => {
            pet.isDiscovered = discoveredPets.indexOf(pet.id) !== -1;
            pet.isFound = foundPets.indexOf(pet.id) !== -1;

            return pet;
        });
    },

    setDiscovered: (state, {petId, isDiscovered}) => {
        DiscoveredPetRepository.setPetStatus(petId, isDiscovered);
        getPet(state, petId).isDiscovered = isDiscovered;
    },

    setFound: (state, {petId, isFound}) => {
        FoundPetRepository.setPetStatus(petId, isFound);
        getPet(state, petId).isFound = isFound;
    },

    reOrder: (state) => {
        state.pets.sort((a, b) => {
            if (a.isDiscovered !== b.isDiscovered) {
                return Math.sign(a.isDiscovered - b.isDiscovered);
            }

            return Math.sign(a.id - b.id);
        });
    }
};


export default {
    state: petState,
    getters,
    actions,
    mutations
};
