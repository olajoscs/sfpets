<template>
    <div>
        <h2>{{ title }}</h2>
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
                <pet v-for="pet in pets"
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
            markAsOwned: function(petId, isOwned) {
                this.$emit('markAsOwned', petId, isOwned);
            },

            markAsAvailable: function(petId, isAvailable) {
                this.$emit('markAsAvailable', petId, isAvailable);
            },
        }
    };
</script>

<style scoped>

</style>
