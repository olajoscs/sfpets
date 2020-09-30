import Axios from "axios";
import CurrentCharacterRepository from "../../services/CurrentCharacterRepository";
import CharacterService from "../../services/CharacterService";

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
    getCurrentCharacterId: state => state.currentCharacterId || CurrentCharacterRepository.getCurrentCharacterId(),
    getCurrentCharacter: (state, characterGetters) => getCharacter(state, characterGetters.getCurrentCharacterId) ?? null,
};


const actions = {
    async fetchCharacters({commit}) {
        const response = await Axios.get('/characters');

        commit('setCharacters', response.data);
    },

    async setCurrentCharacterId({commit}, {characterId}) {
        commit('setCurrentCharacterId', {characterId});
    },

    async addCharacter({commit}, {character}) {
        commit('addCharacter', {character});
    },

    async deleteCharacter({commit}, {characterId}) {
        CharacterService.deleteCharacter(characterId);

        commit('deleteCharacter', {characterId});
    },
};


const mutations = {
    setCharacters: (state, characters) => {
        state.characters = characters;
    },

    setCurrentCharacterId: (state, {characterId}) => {
        state.currentCharacterId = characterId;
        CurrentCharacterRepository.setCurrentCharacterId(characterId);
    },

    addCharacter: (state, {character}) => {
        state.characters.push(character);
    },

    deleteCharacter: (state, {characterId}) => {
        state.characters = state.characters.filter(character => {
            return character.id !== characterId;
        });
    },
};


export default {
    state: characterState,
    getters,
    actions,
    mutations
};