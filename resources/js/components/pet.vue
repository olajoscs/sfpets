<template>
    <tr>
        <td>{{ id }}</td>
        <td>{{ name }}</td>
        <td>{{ description }}</td>
        <td>
            <button v-if="isOwned" @click="markAsOwned(false)">Mégsincs meg</button>
            <button v-else-if="isAvailable" @click="markAsOwned(true)">Megvan</button>
        </td>
        <td>
            <button v-if="isAvailable" @click="markAsAvailable(false)">Mégse elérhető</button>
            <button v-else @click="markAsAvailable(true)">Már elérhető</button>
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
            'isAvailable',
            'isOwned'
        ],

        data: function () {
            return {};
        },

        methods: {
            markAsOwned: function(isOwned) {
                this.$emit('markAsOwned', this.id, isOwned);
            },

            markAsAvailable: function(isAvailable) {
                this.$emit('markAsAvailable', this.id, isAvailable);
            },
        }
    };
</script>

<style scoped>

</style>
