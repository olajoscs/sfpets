import Axios from "axios";

/**
 * Abstract parent class for handling localstorage pet actions
 */
class PetRepository {

    constructor() {
        if (new.target === PetRepository) {
            throw new TypeError("Cannot construct Abstract instances directly");
        }
    }

    /**
     * Set status of a pet
     * @param characterId
     * @param petId
     * @param status
     */
    setPetStatus(characterId, petId, status) {
        Axios.post(`/pet/mark/${this.action}`, {
            characterId, petId, status
        });
    }
}

export default PetRepository;
