<template>
    <div>
        <h2>{{ $t('text.character_list_title') }}</h2>

        <div v-if="this.loading">
            <loading></loading>
        </div>

        <div v-else>
            <ul class="collection with-header">
                <character v-for="character in getOrderedCharacters"
                           @modifyCharacter="modifyCharacter"
                           :key="character.id"
                           :id="character.id"
                ></character>
            </ul>
            <div>
                <button data-target="new-character-modal"
                        @click="openNewCharacterModal"
                        class="waves-effect waves-light btn btn-small modal-trigger">
                    <i class="material-icons">add</i>
                </button>
            </div>
        </div>

        <new-character-modal ref="newCharacterModal"></new-character-modal>

    </div>

</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import Character from "./Character";
    import Loading from "./Loading";
    import NewCharacterModal from "./NewCharacterModal";

    export default {
        name: "CharacterList",

        data: () => {
            return {
                characters: [],
                loading: false,
            };
        },

        components: {
            NewCharacterModal,
            Character,
            Loading
        },

        methods: {
            ...mapActions(['fetchCharacters']),

            openNewCharacterModal: function() {
                this.$refs.newCharacterModal.open();
            },

            modifyCharacter(character) {
                console.log(character);
            }
        },

        computed: {
            ...mapGetters(['getCharacters', 'getCurrentCharacterId']),

            getOrderedCharacters: function() {
                return this.getCharacters.sort((a, b) => {
                    if (a.id === this.getCurrentCharacterId) {
                        return -1;
                    }

                    if (b.id === this.getCurrentCharacterId) {
                        return 1;
                    }

                    return Math.sign(a.id - b.id);
                });
            }
        },

        created() {
            this.loading = true;
            (async () => {
                await this.fetchCharacters();
                this.loading = false;
            })();
        }
    }
</script>

<style scoped>

</style>