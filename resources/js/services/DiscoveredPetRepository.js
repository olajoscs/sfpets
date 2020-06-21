import PetRepository from './PetRepository';

class DiscoveredPetRepository extends PetRepository {
    constructor() {
        super();
        this.key = 'discoveredPets';
    }
}

export default new DiscoveredPetRepository();
