<template>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>

        <tr v-for="pet in petList">
            <td>{{ pet.name }}</td>
            <td>{{ pet.description }}</td>
        </tr>
    </table>
</template>

<script>
    import Axios from 'axios';

    export default {
        name: "PetList",

        data: () => {
            return {
                petList: []
            }
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
