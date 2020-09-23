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
    getCurrentCharacterId: state => state.currentCharacterId || CharacterRepository.getCurrentCharacterId(),
};


const actions = {
    async fetchCharacters({commit}) {
        const response = await Axios.get('/characters');

        commit('setCharacters', response.data);
    },

    async setCurrentCharacterId({commit}, {characterId}) {
        commit('setCurrentCharacterId', {characterId});
    },
};


const mutations = {
    setCharacters: (state, characters) => {
        state.characters = characters;
    },

    setCurrentCharacterId: (state, {characterId}) => {
        state.currentCharacterId = characterId;
        CharacterRepository.setCurrentCharacterId(characterId);
    }
};


export default {
    state: characterState,
    getters,
    actions,
    mutations
};