<template>
    <li class="collection-item avatar" :class="{fade: shouldFade}">
        <img src="https://picsum.photos/50" alt="" class="circle responsive-img">
        <span class="title"><strong>{{ pet.name }}</strong></span>
        <p>
            {{ pet.location }}<br>
            {{ pet.description }}
        </p>
        <div class="secondary-content">
            <a v-if="pet.isFound" @click="markAsFound(false, `Mégsincs megszerezve: ${pet.name}`)"
                    class="btn-small red lighten-3"
                    title="Mégsincs megszerezve">
                <i class="material-icons">check</i>
            </a>
            <a v-else-if="pet.isDiscovered" @click="markAsFound(true, `Megszereztem: ${pet.name}`)"
                    class="btn-small"
                    title="Megszereztem">
                <i class="material-icons">check</i>
            </a>
            <a v-if="pet.isDiscovered" @click="markAsDiscovered(false, `Mégsincs felfedezve: ${pet.name}`)"
                    class="btn-small red lighten-3"
                    title="Mégsincs felfedezve">
                <i class="material-icons">search</i>
            </a>
            <a v-else @click="markAsDiscovered(true, `Felfedeztem: ${pet.name}`)"
                    class="btn-small"
                    title="Felfedeztem">
                <i class="material-icons">search</i>
            </a>
        </div>
    </li>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import helpers from '../helpers';

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
            },

            shouldFade() {
                return this.pet.isDiscovered;
            }
        },

        methods: {
            ...mapActions(['setFound', 'setDiscovered']),

            markAsFound: function(isFound, message) {
                helpers.toast(message);
                this.setFound({petId: this.pet.id, isFound});
            },

            markAsDiscovered: function(isDiscovered, message) {
                helpers.toast(message);
                this.setDiscovered({petId: this.pet.id, isDiscovered});
            },
        }
    };
</script>

<style scoped>
</style>
