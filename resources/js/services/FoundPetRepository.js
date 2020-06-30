import PetRepository from './PetRepository';

/**
 * Handles the data layer of the found pets
 */
class FoundPetRepository extends PetRepository {
    constructor() {
        super();
        this.key = 'foundPets';
    }
}

export default new FoundPetRepository();
