<template>
    <tr>
        <td>{{ this.id }}</td>
        <td>{{ this.name }}</td>
        <td>{{ this.description }}</td>
        <td>
            <button @click="markAsOwned">Megvan</button>
            <button @click="markAsNotOwned">Nincs meg</button>
        </td>
    </tr>
</template>

<script>
    import OwnedPetRepository from '../services/OwnedPetRepository';

    export default {
        name: "Pet",

        props: [
            'id',
            'name',
            'description',
        ],

        data: function () {
            return {}
        },

        methods: {
            markAsOwned: function() {
                OwnedPetRepository.addOwned(this.id);
            },

            markAsNotOwned: function() {
                OwnedPetRepository.removeOwned(this.id);
            }
        }
    };
</script>

<style scoped>

</style>
