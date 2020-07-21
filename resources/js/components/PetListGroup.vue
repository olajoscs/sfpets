<template>
    <div>
        <h2>{{ title }}</h2>
        <pet-list v-for="(petIds, category) in categorizedIds"
                  :pet-ids="petIds"
                  :title="category"
                  :key="category"
                  :type="type"
        ></pet-list>
    </div>
</template>

<script>
    import PetList from './PetList';

    export default {
        name: "PetListGroup",

        components: {
            PetList
        },

        props: [
            'title',
            'pets',
            'type',
        ],

        computed: {
            categorizedIds() {
                const categorizedIds = {};
                this.pets.map(pet => {
                    if (typeof categorizedIds[pet.category] === 'undefined') {
                        categorizedIds[pet.category] = [];
                    }

                    categorizedIds[pet.category].push(pet.id);
                });

                return categorizedIds;
            }
        },
    };
</script>

<style scoped>

</style>
