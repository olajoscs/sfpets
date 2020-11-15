<template>
    <div id="app">
        <nav-bar></nav-bar>
        <div class="container">
            <router-view></router-view>
        </div>
        <cookie-law>
        </cookie-law>
    </div>
</template>


<script>
    import {mapActions} from 'vuex';
    import PetOrganizer from './PetOrganizer';
    import NavBar from './NavBar/NavBar';
    import CookieLaw from './Cookie';

    export default {
        name: "app",

        components: {
            NavBar,
            PetOrganizer,
            CookieLaw
        },

        data: () => {
            return {}
        },

        methods: {
            ...mapActions(['fetchCharacters']),
        },

        async created() {
            this.loading = true;
            await this.fetchCharacters();
            this.loading = false;
        }
    };
</script>

<style scoped>
    h1 {
        font-size: 2em;
    }
</style>
