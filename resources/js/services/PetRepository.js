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
     * Add the pet to the owned list
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
