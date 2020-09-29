import PetRepository from './PetRepository';

/**
 * Handles the data layer of the discovered pets
 */
class DiscoveredPetRepository extends PetRepository {
    constructor() {
        super();
        this.action = 'discovered';
    }
}

export default new DiscoveredPetRepository();
