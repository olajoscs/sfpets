<template>
    <tr>
        <td>{{ this.id }}</td>
        <td>{{ this.name }}</td>
        <td>{{ this.description }}</td>
        <td>
            <label>
                <input type="checkbox" @click="markAsOwned"/>
                Megvan
            </label>
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
        ],

        data: function () {
            return {}
        },

        methods: {
            markAsOwned: function() {
                console.log(this.id);
            }
        }
    };
</script>

<style scoped>

</style>
