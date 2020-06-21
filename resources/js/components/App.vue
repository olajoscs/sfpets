<template>
    <div id="app">
        <h1>{{ pageTitle }}</h1>
        <pet-organizer></pet-organizer>
    </div>
</template>


<script>
    import PetOrganizer from './PetOrganizer';

    export default {
        el: '#app',
        name: "app",

        components: {
            PetOrganizer
        },

        data: () => {
            return {
                pageTitle: 'Shakes & fidget pets'
            }
        }
    };
</script>

<style scoped>

</style>
