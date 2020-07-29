<template>
    <div id="app">
        <nav-bar></nav-bar>
        <div class="container">
            <pet-organizer></pet-organizer>
        </div>
    </div>
</template>


<script>
    import PetOrganizer from './PetOrganizer';
    import NavBar from './NavBar/NavBar';

    export default {
        name: "app",

        components: {
            NavBar,
            PetOrganizer
        },

        data: () => {
            return {}
        },
    };
</script>

<style scoped>
    h1 {
        font-size: 2em;
    }
</style>
