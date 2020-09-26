<template>
    <div>
        <h2>{{ $t('text.character_list_title') }}</h2>

        <div v-if="this.loading">
            <loading></loading>
        </div>

        <div v-else>
            <ul class="collection with-header">
                <character v-for="character in getOrderedCharacters"
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

        <div id="new-character-modal" class="modal">

            <div class="modal-content">
                <h4>{{ $t('text.character_new_title' )}}</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder=""
                                       id="name"
                                       type="text"
                                       class="validate"
                                       v-model="newCharacterName"
                                >
                                <label for="name">{{ $t('text.character_new_name') }}</label>
                                <span class="helper-text" data-error=""></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div v-if="buttonsLoading" class="modal-footer">
                <loading></loading>
            </div>

            <div v-else="buttonsLoading" class="modal-footer">
                <button @click="submitNewCharacter"
                        class="waves-effect waves-green btn btn-primary">
                    {{ $t('text.character_new_ok') }}
                </button>
                <button @click="cancelNewCharacter"
                        class="modal-close waves-effect waves-green btn btn-flat">
                    {{ $t('text.character_new_cancel') }}
                </button>
            </div>

        </div>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import Character from "./Character";
    import Loading from "./Loading";
    import CharacterService from "./../services/CharacterService";

    export default {
        name: "CharacterList",

        data: () => {
            return {
                characters: [],
                loading: false,
                buttonsLoading: false,
                newCharacterName: '',
                modals: null,
            };
        },

        components: {
            Character,
            Loading
        },

        methods: {
            ...mapActions(['fetchCharacters', 'addCharacter']),

            openNewCharacterModal: function() {
                this.modals = M.Modal.init(document.querySelectorAll('#new-character-modal'));
            },

            closeAllModals: function() {
                this.modals.forEach((modal) => {
                    modal.close();
                });
            },

            submitNewCharacter: function() {
                this.buttonsLoading = true;
                this.hideAllError();

                (async () => {
                    const response = await CharacterService.submit({name: this.newCharacterName});

                    if (response.status !== 'ok') {
                        this.showErrors(response.errors);
                        this.buttonsLoading = false;
                        return;
                    }

                    this.newCharacterName = '';
                    this.buttonsLoading = false;

                    const character = response.character;

                    this.addCharacter({character});
                    this.closeAllModals();
                })();
            },

            showErrors: function(errors) {
                _.forOwn(errors, (values, key) => {
                    document.querySelectorAll(`#${key}`).forEach((node) => {
                        node.classList.add('invalid');
                        node.parentElement.querySelector('.helper-text').setAttribute('data-error', values.join("<br>"));
                    })
                });
            },

            hideAllError: function() {
                document.querySelectorAll('input').forEach((node) => {
                    node.classList.remove('invalid');
                });
            },

            cancelNewCharacter: function() {
                this.newCharacterName = '';
            },
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