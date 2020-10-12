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
    import PetListGroup from './Pet/PetListGroup';
    import PetFirsts from './Pet/PetFirsts';
    import CurrentCharacterRepository from './../services/CurrentCharacterRepository';

    export default {
        name: "PetOrganizer",

        data: () => {
            return {
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
            ...mapActions(['fetchPets', 'fetchCharacters'])
        },

        created() {
            const currentCharacterId = CurrentCharacterRepository.getCurrentCharacterId();

            if (!currentCharacterId) {
                window.location.href = '#/characters';
                return;
            }

            this.loading = true;

            Promise.all([
                this.fetchPets({currentCharacterId}),
                this.fetchCharacters()
            ]).then(() => {
                this.loading = false;
            });
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
