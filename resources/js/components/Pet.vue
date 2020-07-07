<template>
    <tr>
        <td>{{ pet.id }}</td>
        <td>{{ pet.name }}</td>
        <td>{{ pet.location }}</td>
        <td>{{ pet.description }}</td>
        <td>
            <button v-if="pet.isFound" @click="markAsFound(false)">Mégsincs meg</button>
            <button v-else-if="pet.isDiscovered" @click="markAsFound(true)">Megvan</button>
        </td>
        <td>
            <button v-if="pet.isDiscovered" @click="markAsDiscovered(false)">Mégse elérhető</button>
            <button v-else @click="markAsDiscovered(true)">Már elérhető</button>
        </td>
    </tr>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import FoundPetRepository from '../services/FoundPetRepository';
    import DiscoveredPetRepository from '../services/DiscoveredPetRepository';

    export default {
        name: "Pet",

        props: [
            'id',
        ],

        data: function () {
            return {};
        },

        computed: {
            ...mapGetters(['getPet']),
            // TODO: Does this matter, or is getPet invoked every time when pet?
            pet() {
                return this.getPet(this.id);
            }
        },

        methods: {
            ...mapActions(['setFound', 'setDiscovered']),

            // FIXME: Vuex mutation instead of direct state update
            markAsFound: function(isFound) {
                this.pet.isFound = isFound;
                FoundPetRepository.setPetStatus(this.pet.id, isFound);
                this.setFound(this.pet.id);
            },

            markAsDiscovered: function(isDiscovered) {
                this.pet.isDiscovered = isDiscovered;
                DiscoveredPetRepository.setPetStatus(this.pet.id, isDiscovered);
                this.setDiscovered(this.pet.id);
            },
        }
    };
</script>

<style scoped>

</style>
