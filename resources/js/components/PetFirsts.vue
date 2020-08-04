<template>
    <pet-list :pet-ids="this.firstPets"
              :title="'First pets'"
              :type="'firsts'"
    ></pet-list>
</template>

<script>
    import { mapGetters } from "vuex";
    import PetList from './PetList';

    export default {
        name: "PetFirsts",

        components: {PetList},

        data: () => {
            return {};
        },

        computed: {
            ...mapGetters(['allPets']),

            firstPets() {
                const petIdMap = {};

                this.allPets.map(pet => {
                    if (typeof petIdMap[pet.categoryId] === 'undefined' && !pet.isDiscovered) {
                        petIdMap[pet.categoryId] = pet.id;
                    }
                });

                return petIdMap;
            }
        },

        methos: {},

        created() {
        },
    };
</script>

<style scoped>

</style>
