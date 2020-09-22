import Axios from "axios";
import CharacterRepository from "../../services/CharacterRepository";

function getCharacter(state, characterId) {
    return state.characters.find(character => character.id === characterId);
}


const characterState = {
    characters: [],
    currentCharacterId: null,
};


const getters = {
    getCharacters: state => state.characters,
    getCharacter: state => characterId => getCharacter(state, characterId),
    getCurrentCharacterId: state => state.currentCharacterId,
};


const actions = {
    async fetchCharacters({commit}) {
        const response = await Axios.get('/characters');

        commit('setCharacters', response.data);
    },

    async setCurrentCharacter({commit}, {characterId}) {
        commit('setCurrentCharacter', {characterId});
    },
};


const mutations = {
    setCharacters: (state, characters) => {
        state.characters = characters;
    },

    setCurrentCharacter: (state, {characterId}) => {
        state.currentCharacterId = characterId;
        CharacterRepository.setCurrentCharacter(characterId);
    }
};


export default {
    state: characterState,
    getters,
    actions,
    mutations
};