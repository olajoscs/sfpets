<template>
    <div>
        <h3>{{ title }}</h3>
        <div v-if="petIds.length === 0">
            No pets to see here
        </div>
        <div v-else>
            <pet v-for="petId in petIds"
                 :key="petId"
                 :id="petId"
            ></pet>
        </div>
    </div>
</template>

<script>
    import Pet from './Pet';

    export default {
        name: "PetList",

        props: [
            'title',
            'petIds',
        ],

        components: {
            Pet
        },
    };
</script>

<style scoped>

</style>
