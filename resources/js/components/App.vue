<template>
    <div id="app" class="container">
        <h1>{{ pageTitle }}</h1>
        <pet-organizer></pet-organizer>
    </div>
</template>


<script>
    import PetOrganizer from './PetOrganizer';

    export default {
        name: "app",

        components: {
            PetOrganizer
        },

        data: () => {
            return {
                pageTitle: 'Shakes & fidget pets'
            }
        },

        created: function() {
            console.log('created');
        },
    };
</script>

<style scoped>

</style>
