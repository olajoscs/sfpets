<template>
    <div class="collection-item avatar" :class="{'red lighten-5': getCurrentCharacterId === this.id}">
        <div @click="setCharacter" class="character-select-div">
            <i class="large material-icons pet-image circle responsive-img">person</i>

            <span class="title"><strong>{{ character.name }}</strong></span>
        </div>

        <div class="secondary-content">
            <a @click="setCharacter"
               class="waves-effect waves-light btn btn-small">
                <i class="material-icons">check</i>
            </a>

            <a @click="modify"
               class="waves-effect waves-light btn btn-small">
                <i class="material-icons">edit</i>
            </a>

            <a @click="remove"
               class="waves-effect waves-light btn btn-small red lighten-3">
                <i class="material-icons">delete_forever</i>
            </a>
        </div>
    </div>
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

            character: function() {
                return this.getCharacter(this.id);
            }
        },

        methods: {
            ...mapActions(['setCurrentCharacterId', 'deleteCharacter']),

            setCharacter: function() {
                this.setCurrentCharacterId({characterId: this.id});
                window.location.href = '#/';
            },

            remove: function() {
                if (confirm('Biztos?')) {
                    this.deleteCharacter({characterId: this.id});
                }
            },

            modify: function() {
                this.$emit('modifyCharacter', this.character);
            }
        },
    }
</script>

<style scoped>
    .character-select-div {
        cursor: pointer;
        height: 4rem;
    }
</style>