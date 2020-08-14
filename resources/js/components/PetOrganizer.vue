<template>
    <div v-if="this.loading">
        <loading></loading>
    </div>
    <div v-else>
        <pet-firsts></pet-firsts>
        <pet-list-group
            v-show="this.discoveredPets.length > 0"
            :title="$t('text.pet_list_discovered_title')"
            :pets="this.discoveredPets"
            :type="'discovered'"></pet-list-group>

        <!--TODO: Is this list really needed?-->
        <!--<pet-list-group-->
            <!--v-show="this.foundPets.length > 0"-->
            <!--:title="$t('text.pet_list_found_title')"-->
            <!--:pets="this.foundPets"-->
            <!--:type="'found'"></pet-list-group>-->
        <hr>
        <pet-list-group
            :title="$t('text.pet_list_all_title')"
            :pets="this.allPets"
            :type="'all'"></pet-list-group>
    </div>
</template>

<script>
    import Loading from './Loading';
    import { mapGetters, mapActions } from "vuex";
    import PetListGroup from './PetListGroup';
    import PetFirsts from './PetFirsts';

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
            Loading,
            PetFirsts
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
