<template>
    <tr>
        <td>{{ id }}</td>
        <td>{{ name }}</td>
        <td>{{ description }}</td>
        <td>
            <button v-if="isOwnedInternal" @click="markAsNotOwned">Mégsincs meg</button>
            <button v-else @click="markAsOwned">Megvan</button>
        </td>
        <td>
            <button v-if="isAvailableInternal" @click="markAsNotAvailable">Mégse elérhető</button>
            <button v-else @click="markAsAvailable">Már elérhető</button>
        </td>
    </tr>
</template>

<script>
    import OwnedPetRepository from '../services/OwnedPetRepository';
    import AvailablePetRepository from '../services/AvailablePetRepository';

    export default {
        name: "Pet",

        props: [
            'id',
            'name',
            'description',
            'isAvailable',
            'isOwned'
        ],

        data: function () {
            return {
                isAvailableInternal: this.isAvailable,
                isOwnedInternal: this.isOwned
            };
        },

        methods: {
            markAsOwned: function() {
                this.isOwnedInternal = !this.isOwnedInternal; // TODO: Is this needed?
                OwnedPetRepository.addPet(this.id); // TODO: Here or in the list component
                this.$emit('markAsOwned', this.id);
            },

            markAsNotOwned: function() {
                this.isOwnedInternal = !this.isOwnedInternal; // TODO: Is this needed?
                OwnedPetRepository.removePet(this.id); // TODO: Here or in the list component
                this.$emit('markAsNotOwned', this.id);
            },

            markAsAvailable: function() {
                this.isAvailableInternal = !this.isAvailableInternal; // TODO: Is this needed?
                AvailablePetRepository.addPet(this.id); // TODO: Here or in the list component
                this.$emit('markAsAvailable', this.id);
            },

            markAsNotAvailable: function() {
                this.isAvailableInternal = !this.isAvailableInternal; // TODO: Is this needed?
                AvailablePetRepository.removePet(this.id); // TODO: Here or in the list component
                this.$emit('markAsNotAvailable', this.id);
            }
        }
    };
</script>

<style scoped>

</style>
