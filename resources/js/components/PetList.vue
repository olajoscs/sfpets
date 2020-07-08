<template>
    <div>
        <h3>{{ title }}</h3>
        <div v-if="petIds.length === 0">
            No pets to see here
        </div>
        <table v-else>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <pet v-for="petId in petIds"
                     :key="petId"
                     :id="petId"
                ></pet>
            </tbody>
        </table>
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
