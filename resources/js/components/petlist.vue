<template>
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
            <pet v-for="pet in petList"
                 v-bind:key="pet.id"
                 v-bind="pet"></pet>
        </tbody>
    </table>
</template>

<script>
    import Axios from 'axios';
    import Pet from './pet';
    import OwnedPetRepository from '../services/OwnedPetRepository';
    import AvailablePetRepository from '../services/AvailablePetRepository';

    export default {
        name: "PetList",

        data: () => {
            return {
                petList: [],
            }
        },

        components: {
            Pet
        },

        created() {
            Axios.get('/pet-list')
                .then((response) => {
                    const petList = response.data;
                    const ownedPets = OwnedPetRepository.getAll();
                    const availablePets = AvailablePetRepository.getAll();

                    this.petList = petList.map((pet) => {
                        pet.isOwned = ownedPets.indexOf(pet.id) !== -1;
                        pet.isAvailable = availablePets.indexOf(pet.id) !== -1;

                        return pet;
                    })
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
