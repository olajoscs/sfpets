<template>
    <div v-if="this.loading">
        <loading></loading>
    </div>
    <div v-else>
        <pet-list :title="'Discovered pets'"
                  :pets="discoveredPets"
                  @markAsFound="markAsFound"
                  @markAsDiscovered="markAsDiscovered"></pet-list>

        <pet-list :title="'Not discovered pets'"
                  :pets="notDiscoveredPets"
                  @markAsFound="markAsFound"
                  @markAsDiscovered="markAsDiscovered"></pet-list>

        <pet-list :title="'Found pets'"
                  :pets="foundPets"
                  @markAsFound="markAsFound"
                  @markAsDiscovered="markAsDiscovered"></pet-list>
    </div>
</template>

<script>
    import Loading from './Loading';
    import Axios from 'axios';
    import FoundPetRepository from '../services/FoundPetRepository';
    import DiscoveredPetRepository from '../services/DiscoveredPetRepository';
    import PetList from './PetList';

    export default {
        name: "PetOrganizer",

        data: () => {
            return {
                pets: [],
                loading: false,
            }
        },

        components: {
            PetList,
            Loading
        },

        computed: {
            discoveredPets() {
                return this.pets.filter((pet) => pet.isDiscovered && !pet.isFound);
            },

            foundPets() {
                return this.pets.filter((pet) => pet.isDiscovered && pet.isFound);
            },

            notDiscoveredPets() {
                return this.pets.filter((pet) => !pet.isDiscovered);
            },
        },

        methods: {
            getPet(petId) {
                return this.pets.filter((pet) => pet.id === petId).pop();
            },

            markAsFound(petId, isFound) {
                this.getPet(petId).isFound = isFound;
                FoundPetRepository.setPetStatus(petId, isFound);
            },

            markAsDiscovered(petId, isDiscovered) {
                this.getPet(petId).isDiscovered = isDiscovered;
                DiscoveredPetRepository.setPetStatus(petId, isDiscovered);
            },
        },

        created() {
            this.loading = true;
            Axios.get('/pet-list')
                .then((response) => {
                    const pets = response.data;
                    const foundPets = FoundPetRepository.getAll();
                    const discoveredPets = DiscoveredPetRepository.getAll();

                    this.pets = pets.map((pet) => {
                        pet.isFound = foundPets.indexOf(pet.id) !== -1;
                        pet.isDiscovered = discoveredPets.indexOf(pet.id) !== -1;

                        return pet;
                    });

                    this.loading = false;
                })
                .catch((err) => {
                    console.log('sikertelen');
                    console.error(err);
                });
        }
    };
</script>

<style scoped>

</style>
