<template>
    <pet-list-group :title="$t('text.pet_list_firsts_title')"
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
                const petMap = [];

                this.allPets.map(pet => {
                    if (!petMap[pet.categoryId] && !pet.isDiscovered) {
                        petMap[pet.categoryId] = pet;
                    }
                });

                return petMap;
            }
        }
    };
</script>

<style scoped>

</style>
