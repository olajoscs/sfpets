import PetRepository from './PetRepository';

/**
 * Handles the data layer of owned pets
 */
class OwnedPetRepository extends PetRepository {
    constructor() {
        super();
        this.key = 'ownedPets';
    }
}

export default new OwnedPetRepository();
