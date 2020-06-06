<template>
    <div id="app">
        <h1>{{ pageTitle }}</h1>
    </div>
</template>


<script>
    export default {
        el: '#app',
        name: "app",
        data: () => {
            return {
                pageTitle: 'Shakes and fidget pets'
            }
        },
    };
</script>

<style scoped>

</style>
