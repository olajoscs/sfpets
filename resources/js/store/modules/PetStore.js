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
    },

    async setDiscovered({commit}, {petId, isDiscovered}) {
        commit('setDiscovered', {petId, isDiscovered});
    },

    async setFound({commit}, {petId, isFound}) {
        commit('setFound', {petId, isFound});
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

    setFound: (state, {petId, isFound}) => {
        FoundPetRepository.setPetStatus(petId, isFound);
        getPet(state, petId).isFound = isFound;
    },

    setDiscovered: (state, {petId, isDiscovered}) => {
        DiscoveredPetRepository.setPetStatus(petId, isDiscovered);
        getPet(state, petId).isDiscovered = isDiscovered;
    }
};


export default {
    state: petState,
    getters,
    actions,
    mutations
};
