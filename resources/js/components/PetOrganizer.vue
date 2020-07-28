<template>
    <div v-if="this.loading">
        <loading></loading>
    </div>
    <div v-else>
        <pet-list-group
            :title="'All pets'"
            :pets="this.allPets"
            :type="'all'"></pet-list-group>
        <hr>
        <pet-list-group
            v-show="this.discoveredPets.length > 0"
            :title="'Discovered pets'"
            :pets="this.discoveredPets"
            :type="'discovered'"></pet-list-group>

        <pet-list-group
            v-show="this.foundPets.length > 0"
            :title="'Found pets'"
            :pets="this.foundPets"
            :type="'found'"></pet-list-group>
    </div>
</template>

<script>
    import Loading from './Loading';
    import { mapGetters, mapActions } from "vuex";
    import PetListGroup from './PetListGroup';

    export default {
        name: "PetOrganizer",

        data: () => {
            return {
                pets: [],
                loading: false,
            }
        },

        components: {
            PetListGroup,
            Loading
        },

        computed: {
            ...mapGetters(['allPets', 'discoveredPets', 'foundPets']),
        },

        methods: {
            ...mapActions(['fetchPets'])
        },

        created() {
            this.loading = true;
            (async () => {
                await this.fetchPets();
                this.loading = false;
            })();
        }
    }
</script>

<style scoped>
    hr {
        border-top: 1px solid #ddd;
        margin: 1.5em 0;
        display: block;
    }
</style>
