<template>
    <div id="app">
        <h1>{{ pageTitle }}</h1>
        <pet-list-list></pet-list-list>
    </div>
</template>


<script>
    import PetListList from './PetListList';

    export default {
        el: '#app',
        name: "app",

        components: {
            PetListList
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
