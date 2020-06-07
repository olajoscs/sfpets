<template>
    <div id="app">
        <h1>{{ pageTitle }}</h1>
        <pet-list></pet-list>
    </div>
</template>


<script>
    import PetList from './petlist';

    export default {
        el: '#app',
        name: "app",

        components: {
            PetList
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
