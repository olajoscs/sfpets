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
            <tr v-for="pet in petList">
                <pet :name="pet.name"
                     :description="pet.description"
                     :id="pet.id"></pet>
            </tr>
        </tbody>
    </table>
</template>

<script>
    import Axios from 'axios';
    import Pet from './pet';

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
                    this.petList = response.data;
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
