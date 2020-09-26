import Cookies from '../../../node_modules/js-cookie/src/js.cookie';

class CurrentCharacterRepository {
    constructor() {
        this.COOKIE_NAME = 'current-character';
    }

    /**
     * Mark the character as currejnt character
     * @param characterId int
     */
    setCurrentCharacterId(characterId) {
        Cookies.set(this.COOKIE_NAME, characterId);
    }

    /**
     * Return the currently selected character ID
     * @returns int
     */
    getCurrentCharacterId() {
        return parseInt(Cookies.get(this.COOKIE_NAME));
    }
}

export default new CurrentCharacterRepository();