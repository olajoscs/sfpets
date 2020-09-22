import Cookies from '../../../node_modules/js-cookie/src/js.cookie';

class CharacterRepository {
    constructor() {
        this.COOKIE_NAME = 'current-character';
    }

    /**
     * Mark the character as currejnt character
     * @param characterId int
     */
    setCurrentCharacter(characterId) {
        Cookies.set(this.COOKIE_NAME, characterId);
    }

    /**
     * Return the currently selected character ID
     * @returns int
     */
    getCurrentCharacter() {
        return Cookies.get(this.COOKIE_NAME);
    }
}

export default new CharacterRepository();