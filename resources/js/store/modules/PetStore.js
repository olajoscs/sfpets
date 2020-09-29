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
    async fetchPets({commit}, {currentCharacterId}) {
        const response = await Axios.get('/pets?characterId=' + currentCharacterId);

        commit('setPets', response.data);
        commit('reOrder');
    },

    async setDiscovered({commit}, {characterId, petId, isDiscovered}) {
        commit('setDiscovered', {characterId, petId, isDiscovered});
        commit('reOrder');
    },

    async setFound({commit}, {characterId, petId, isFound}) {
        commit('setFound', {characterId, petId, isFound});
        commit('reOrder');
    },
};


const mutations = {
    setPets: (state, pets) => {
        state.pets = pets;
    },

    setDiscovered: (state, {characterId, petId, isDiscovered}) => {
        DiscoveredPetRepository.setPetStatus(characterId, petId, isDiscovered);
        getPet(state, petId).isDiscovered = isDiscovered;
    },

    setFound: (state, {characterId, petId, isFound}) => {
        FoundPetRepository.setPetStatus(characterId, petId, isFound);
        getPet(state, petId).isFound = isFound;
    },

    reOrder: (state) => {
        state.pets.sort((a, b) => {
            if (a.categoryId !== b.categoryId) {
                return Math.sign(a.categoryId - b.categoryId);
            }

            return Math.sign(a.rank - b.rank);
        });
    }
};


export default {
    state: petState,
    getters,
    actions,
    mutations
};
