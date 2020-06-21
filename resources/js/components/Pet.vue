<template>
    <tr>
        <td>{{ id }}</td>
        <td>{{ name }}</td>
        <td>{{ description }}</td>
        <td>
            <button v-if="isFound" @click="markAsFound(false)">Mégsincs meg</button>
            <button v-else-if="isDiscovered" @click="markAsFound(true)">Megvan</button>
        </td>
        <td>
            <button v-if="isDiscovered" @click="markAsDiscovered(false)">Mégse elérhető</button>
            <button v-else @click="markAsDiscovered(true)">Már elérhető</button>
        </td>
    </tr>
</template>

<script>
    export default {
        name: "Pet",

        props: [
            'id',
            'name',
            'description',
            'isDiscovered',
            'isFound'
        ],

        data: function () {
            return {};
        },

        methods: {
            markAsFound: function(isFound) {
                this.$emit('markAsFound', this.id, isFound);
            },

            markAsDiscovered: function(isDiscovered) {
                this.$emit('markAsDiscovered', this.id, isDiscovered);
            },
        }
    };
</script>

<style scoped>

</style>
