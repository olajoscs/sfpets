<template>
    <div id="new-character-modal" class="modal">
        <form @submit.prevent="submitNewCharacter">
            <div class="modal-content">
                <h4>{{ $t('text.character_new_title' )}}</h4>
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder=""
                                       id="new-name"
                                       type="text"
                                       class="validate element-name"
                                       v-model="newCharacterName"
                                >
                                <label for="new-name">{{ $t('text.character_new_name') }}</label>
                                <span class="helper-text" data-error=""></span>
                            </div>
                        </div>
                    </div>
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
                <a @click="cancelNewCharacter"
                        class="modal-close waves-effect waves-green btn btn-flat">
                    {{ $t('text.character_new_cancel') }}
                </a>
            </div>
        </form>
    </div>
</template>


<script>
    import {mapActions} from 'vuex';
    import CharacterService from "./../services/CharacterService";
    import Loading from "./Loading";

    export default {
        name: "NewCharacterModal",

        components: {
            Loading
        },

        data: () => {
            return {
                modals: null,
                buttonsLoading: false,
                newCharacterName: '',
            };
        },

        methods: {
            ...mapActions(['addCharacter']),

            open: function() {
                this.modals = M.Modal.init(
                    document.querySelectorAll('#new-character-modal'),
                    {
                        onOpenEnd: () => {
                            document.querySelector('#new-name').focus();
                        }
                    }
                );
                this.hideAllError();

                this.modals.forEach((modal) => {
                    modal.open();
                });
            },

            hideAllError: function() {
                document.querySelectorAll('input').forEach((node) => {
                    node.classList.remove('invalid');
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
                    document.querySelectorAll(`.element-${key}`).forEach((node) => {
                        node.classList.add('invalid');
                        node.parentElement.querySelector('.helper-text').setAttribute('data-error', values.join("<br>"));
                    })
                });
            },

            cancelNewCharacter: function() {
                this.newCharacterName = '';
            },

            closeAllModals: function() {
                this.modals.forEach((modal) => {
                    modal.close();
                });
            },
        }
    }
</script>

<style scoped>

</style>