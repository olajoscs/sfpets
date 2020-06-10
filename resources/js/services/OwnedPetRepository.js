/**
 * Handles the data layer of owned pets
 */
class OwnedPetRepository {
    constructor() {
        this.key = 'ownedPets';
    }

    /**
     * Add the pet to the owned list
     * @param petId
     */
    addOwned(petId) {
        const ownedPets = this.getAll();

        if (ownedPets.indexOf(petId) === -1) {
            ownedPets.push(petId);
        }

        this.store(ownedPets);
    }

    /**
     * Return all the owned pets
     * @returns Array
     */
    getAll() {
        return JSON.parse(localStorage.getItem(this.key)) || [];
    }

    /**
     * Store the elements
     * @param elements
     */
    store(elements) {
        localStorage.setItem(this.key, JSON.stringify(elements.sort()));
    }

    /**
     * Remowed the pet from the owned list
     * @param petId
     */
    removeOwned(petId) {
        const ownedPets = this.getAll();
        const index = ownedPets.indexOf(petId);

        if (index !== -1) {
            ownedPets.splice(index, 1);
        }

        this.store(ownedPets);
    }
}

export default new OwnedPetRepository();
