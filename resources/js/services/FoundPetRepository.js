import PetRepository from './PetRepository';

/**
 * Handles the data layer of found pets
 */
class FoundPetRepository extends PetRepository {
    constructor() {
        super();
        this.key = 'foundPets';
    }
}

export default new FoundPetRepository();
