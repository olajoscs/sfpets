<template>
    <li class="collection-item avatar" :class="{'red lighten-5': getCurrentCharacterId === this.id}">
        <img src="http://lorempixel.com/400/400/" alt="" class="pet-image circle responsive-img">

        <span class="title"><strong>{{ character.name }}</strong></span>

        <div class="secondary-content">
            <a @click="setCharacter"
               class="waves-effect waves-light btn btn-small">
                <i class="material-icons">check</i>
            </a>

            <a @click="remove"
               class="waves-effect waves-light btn btn-small red lighten-3">
                <i class="material-icons">delete_forever</i>
            </a>
        </div>
    </li>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name: "Character",

        props: [
            'id',
        ],

        computed: {
            ...mapGetters(['getCharacter', 'getCurrentCharacterId']),

            character() {
                return this.getCharacter(this.id);
            }
        },

        methods: {
            ...mapActions(['setCurrentCharacterId', 'deleteCharacter']),

            setCharacter() {
                this.setCurrentCharacterId({characterId: this.id});
                window.location.href = '#/';
            },

            remove() {
                if (confirm('Biztos?')) {
                    this.deleteCharacter({characterId: this.id});
                }
            },
        },
    }
</script>

<style scoped>

</style>