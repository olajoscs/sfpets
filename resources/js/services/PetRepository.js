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
     * @param petId
     * @param status
     */
    setPetStatus(petId, status) {
        if (status) {
            this.addPet(petId);
        } else {
            this.removePet(petId);
        }
    }

    /**
     * Add the pet to the found list
     * @param petId
     */
    addPet(petId) {
        const pets = this.getAll();

        if (pets.indexOf(petId) === -1) {
            pets.push(petId);
        }

        this.store(pets);
    }

    /**
     * Return all the found pets
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
     * Remowed the pet from the found list
     * @param petId
     */
    removePet(petId) {
        const pets = this.getAll();
        const index = pets.indexOf(petId);

        if (index !== -1) {
            pets.splice(index, 1);
        }

        this.store(pets);
    }
}

export default PetRepository;
