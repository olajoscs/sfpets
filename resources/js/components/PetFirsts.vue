<template>
    <pet-list-group :title="'First pets'"
                    :type="'firsts'"
                    :pets="this.firstPets"
    ></pet-list-group>
</template>

<script>
    import { mapGetters } from "vuex";
    import PetList from './PetList';
    import PetListGroup from "./PetListGroup";

    export default {
        name: "PetFirsts",

        components: {PetListGroup, PetList},

        data: () => {
            return {};
        },

        computed: {
            ...mapGetters(['allPets']),

            firstPets() {
                const petMap = {};

                this.allPets.map(pet => {
                    if (typeof petMap[pet.categoryId] === 'undefined' && !pet.isDiscovered) {
                        petMap[pet.categoryId] = pet;
                    }
                });

                return Object.values(petMap);
            }
        }
    };
</script>

<style scoped>

</style>
