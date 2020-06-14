<template>
    <div v-if="this.loading">
        <loading></loading>
    </div>
    <div v-else>
        <pet-list :title="'Availablep pets'"
                  :pets="availablePets"
                  @markAsOwned="markAsOwned"
                  @markAsAvailable="markAsAvailable"></pet-list>

        <pet-list :title="'Not availablep pets'"
                  :pets="notAvailablePets"
                  @markAsOwned="markAsOwned"
                  @markAsAvailable="markAsAvailable"></pet-list>

        <pet-list :title="'Owned pets'"
                  :pets="ownedPets"
                  @markAsOwned="markAsOwned"
                  @markAsAvailable="markAsAvailable"></pet-list>
    </div>
</template>

<script>
    import Loading from './Loading';
    import Axios from 'axios';
    import OwnedPetRepository from '../services/OwnedPetRepository';
    import AvailablePetRepository from '../services/AvailablePetRepository';
    import PetList from './PetList';

    export default {
        name: "PetListList",

        data: () => {
            return {
                petList: [],
                loading: false,
            }
        },

        components: {
            PetList,
            Loading
        },

        computed: {
            availablePets() {
                return this.petList.filter((pet) => pet.isAvailable && !pet.isOwned);
            },

            ownedPets() {
                return this.petList.filter((pet) => pet.isAvailable && pet.isOwned);
            },

            notAvailablePets() {
                return this.petList.filter((pet) => !pet.isAvailable);
            },
        },

        methods: {
            getPet(petId) {
                return this.petList.filter((pet) => pet.id === petId).pop();
            },

            markAsOwned(petId, isOwned) {
                this.getPet(petId).isOwned = isOwned;
                OwnedPetRepository.setPetStatus(petId, isOwned);
            },

            markAsAvailable(petId, isAvailable) {
                this.getPet(petId).isAvailable = isAvailable;
                AvailablePetRepository.setPetStatus(petId, isAvailable);
            },
        },

        created() {
            this.loading = true;
            Axios.get('/pet-list')
                .then((response) => {
                    const petList = response.data;
                    const ownedPets = OwnedPetRepository.getAll();
                    const availablePets = AvailablePetRepository.getAll();

                    this.petList = petList.map((pet) => {
                        pet.isOwned = ownedPets.indexOf(pet.id) !== -1;
                        pet.isAvailable = availablePets.indexOf(pet.id) !== -1;

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
