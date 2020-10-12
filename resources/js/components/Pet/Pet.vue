<template>
    <li class="collection-item avatar" :class="{fade: shouldFade}">
        <img :src="pet.image" alt="" class="pet-image circle responsive-img">
        <a class="unsure-mark btn btn-small tooltipped red lighten-4" data-position="bottom" :data-tooltip="$t('text.pet_not_sure')">
            <i v-if="isUnSure" class="material-icons">error_outline</i>
        </a>

        <span class="title"><strong>{{ pet.name }}</strong></span>
        <p>
            {{ pet.location }}<br>
            {{ pet.description }}
        </p>
        <div class="secondary-content">

            <a v-if="pet.isFound" @click="markAsFound(false, $t('text.pet_not_found', {pet: pet.name}))"
                    class="waves-effect waves-light btn btn-small red lighten-3"
                    title="Mégsincs megszerezve">
                <i class="material-icons">check</i>
            </a>
            <a v-else-if="pet.isDiscovered" @click="markAsFound(true, $t('text.pet_found', {pet: pet.name}))"
                    class="waves-effect waves-light btn btn-small"
                    title="Megszereztem">
                <i class="material-icons">check</i>
            </a>
            <a v-if="pet.isDiscovered" @click="markAsDiscovered(false, $t('text.pet_not_discovered', {pet: pet.name}))"
                    class="waves-effect waves-light btn btn-small red lighten-3"
                    title="Mégsincs felfedezve">
                <i class="material-icons">search</i>
            </a>
            <a v-else @click="markAsDiscovered(true, $t('text.pet_discovered', {pet: pet.name}))"
                    class="waves-effect waves-light btn btn-small"
                    title="Felfedeztem">
                <i class="material-icons">search</i>
            </a>
        </div>
    </li>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import helpers from '../../helpers';

    export default {
        name: "Pet",

        props: [
            'id',
            'listType',
        ],

        data: function () {
            return {};
        },

        computed: {
            ...mapGetters(['getPet', 'getCurrentCharacterId']),

            pet: function() {
                return this.getPet(this.id);
            },

            shouldFade: function() {
                return this.pet.isDiscovered;
            },

            isUnSure: function() {
                return !this.pet.sure && this.listType === 'discovered';
            }
        },

        methods: {
            ...mapActions(['setFound', 'setDiscovered']),

            markAsFound: function(isFound, message) {
                helpers.toast(message);
                this.setFound({
                    characterId: this.getCurrentCharacterId,
                    petId: this.pet.id,
                    isFound
                });
            },

            markAsDiscovered: function(isDiscovered, message) {
                helpers.toast(message);
                this.setDiscovered({
                    characterId: this.getCurrentCharacterId,
                    petId: this.pet.id,
                    isDiscovered
                });

                if (!isDiscovered) {
                    this.setFound({
                        characterId: this.getCurrentCharacterId,
                        petId: this.pet.id,
                        isDiscovered
                    });
                }
            },
        }
    };
</script>

<style scoped>
    .pet-image {
        position: relative;
    }

    .unsure-mark {
        position: absolute;
        bottom: 0;
        left: 0;
        margin: auto;
        padding: 0;
    }
</style>
