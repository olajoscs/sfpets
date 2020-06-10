import PetRepository from './PetRepository';

class AvailablePetRepository extends PetRepository {
    constructor() {
        super();
        this.key = 'availablePets';
    }
}

export default new AvailablePetRepository();
