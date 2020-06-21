<template>
    <div>
        <h2>{{ title }}</h2>
        <div v-if="pets.length === 0">
            No pets to see here
        </div>
        <table v-else>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <pet v-for="pet in pets"
                     v-bind:key="pet.id"
                     v-bind="pet"
                     @markAsFound="markAsFound"
                     @markAsDiscovered="markAsDiscovered"
                ></pet>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Pet from './Pet';

    export default {
        name: "PetList",

        props: [
            'title',
            'pets'
        ],

        components: {
            Pet
        },

        methods: {
            markAsFound: function(petId, isFound) {
                this.$emit('markAsFound', petId, isFound);
            },

            markAsDiscovered: function(petId, isDiscovered) {
                this.$emit('markAsDiscovered', petId, isDiscovered);
            },
        }
    };
</script>

<style scoped>

</style>
