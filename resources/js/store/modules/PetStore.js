import Axios from 'axios';
import DiscoveredPetRepository from '../../services/DiscoveredPetRepository';
import FoundPetRepository from '../../services/FoundPetRepository';

const state = {
    pets: []
};


const getters = {
    allPets: localState => localState.pets,
    discoveredPets: localState => localState.pets.filter(pet => pet.isDiscovered && !pet.isFound && pet.available),
    foundPets: localState => localState.pets.filter(pet => pet.isFound),
    getPet: localState => petId => localState.pets.find(pet => pet.id === petId),
};


const actions = {
    async fetchPets({commit}) {
        const response = await Axios.get('/pet-list');

        commit('setPets', response.data);
    },

    async setDiscovered({commit}, petId) {
        console.log('setDiscovered');
        console.log({petId});
        console.log(arguments);
    },

    async setFound({commit}, petId) {
        console.log('setFound');
        console.log({petId});
        console.log(arguments);
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
    }
};


export default {
    state,
    getters,
    actions,
    mutations
};
