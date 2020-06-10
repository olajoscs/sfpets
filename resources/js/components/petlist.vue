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
