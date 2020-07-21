<template>
    <div>
        <h3>{{ title }}</h3>
        <div v-if="petIds.length === 0">
            No pets to see here
        </div>
        <ul class="collection" v-else>
            <pet v-for="petId in petIds"
                 :key="petId"
                 :id="petId"
            ></pet>
        </ul>
    </div>
</template>

<script>
    import Pet from './Pet';

    export default {
        name: "PetList",

        props: [
            'title',
            'petIds',
            'type',
        ],

        components: {
            Pet
        },
    };
</script>

<style scoped>

</style>
