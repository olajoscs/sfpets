<template>
    <li class="collection-item avatar">
        <img src="https://picsum.photos/50" alt="" class="circle responsive-img">
        <span class="title"><strong>{{ pet.name }}</strong></span>
        <p>
            {{ pet.location }}<br>
            {{ pet.description }}
        </p>
        <div class="secondary-content">
            <a v-if="pet.isFound" @click="markAsFound(false)"
                    class="btn-small red lighten-3 tooltipped">
                <i class="material-icons">check</i>
            </a>
            <a v-else-if="pet.isDiscovered" @click="markAsFound(true)"
                    class="btn-small tooltipped">
                <i class="material-icons">check</i>
            </a>
            <a v-if="pet.isDiscovered" @click="markAsDiscovered(false)"
                    class="btn-small red lighten-3 tooltipped">
                <i class="material-icons">search</i>
            </a>
            <a v-else @click="markAsDiscovered(true)"
                    class="btn-small tooltipped">
                <i class="material-icons">search</i>
            </a>
        </div>
    </li>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name: "Pet",

        props: [
            'id',
        ],

        data: function () {
            return {};
        },

        computed: {
            ...mapGetters(['getPet']),
            pet() {
                return this.getPet(this.id);
            }
        },

        methods: {
            ...mapActions(['setFound', 'setDiscovered']),

            markAsFound: function(isFound) {
                this.setFound({petId: this.pet.id, isFound});
            },

            markAsDiscovered: function(isDiscovered) {
                this.setDiscovered({petId: this.pet.id, isDiscovered});
            },
        }
    };
</script>

<style scoped>
</style>
