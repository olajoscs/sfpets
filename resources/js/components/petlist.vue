<template>
    <div v-if="this.loading">
        <loading></loading>
    </div>
    <div v-else>
        Available and not owned
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <pet v-for="pet in availablePets"
                     v-bind:key="pet.id"
                     v-bind="pet"
                     @markAsOwned="markAsOwned"
                     @markAsAvailable="markAsAvailable"
                ></pet>
            </tbody>
        </table>

        Not available
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <pet v-for="pet in notAvailablePets"
                 v-bind:key="pet.id"
                 v-bind="pet"
                 @markAsOwned="markAsOwned"
                 @markAsAvailable="markAsAvailable"
            ></pet>
            </tbody>
        </table>

        Owned
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <pet v-for="pet in ownedPets"
                     v-bind:key="pet.id"
                     v-bind="pet"
                     @markAsOwned="markAsOwned"
                     @markAsAvailable="markAsAvailable"
                ></pet>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Loading from './loading';
    import Axios from 'axios';
    import Pet from './pet';
    import OwnedPetRepository from '../services/OwnedPetRepository';
    import AvailablePetRepository from '../services/AvailablePetRepository';

    export default {
        name: "PetList",

        data: () => {
            return {
                petList: [],
                loading: false,
            }
        },

        components: {
            Pet,
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
