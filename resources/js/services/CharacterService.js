import Axios from "axios";
import CurrentCharacterRepository from "./CurrentCharacterRepository";

class CharacterService {
    /**
     * Submit a new character properties
     * @param characterProperties
     */
    async submit(characterProperties) {
        const result = await this.sendRequest(characterProperties);

        if (result.errors) {
            return {
                status: 'error',
                errors: result.errors
            };
        }

        const character = result.data;

        return {
            status: 'ok',
            character: character
        };
    }

    /**
     * Send the request to create a new character
     * @param characterProperties
     */
    async sendRequest(characterProperties) {
        try {
            return await Axios.post('/character', characterProperties);
        } catch (err) {
            if (err.response.data.errors) {
                return {errors: err.response.data.errors};
            }
        }
    }


    async deleteCharacter(characterId) {
        const response = await Axios.delete(`/character?id=${characterId}`);

        if (characterId === CurrentCharacterRepository.getCurrentCharacterId()) {
            CurrentCharacterRepository.setCurrentCharacterId(null);
        }

        return response;
    }
}

export default new CharacterService();