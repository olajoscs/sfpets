<template>
    <ul :class="classes.join(' ')" :id="this.id">
        <li><a href="/locale/set/hu"><img src="/images/hungary.svg"></a></li>
        <li><a href="/locale/set/en"><img src="/images/uk.svg"></a></li>
    </ul>
</template>

<script>
    export default {
        name: "MenuList",

        props: [
            'classes',
            'id'
        ],
    };
</script>

<style scoped>
    img {
        width: 4em;
    }
</style>
