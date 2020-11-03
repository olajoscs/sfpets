<template>
    <div id="modify-character-modal" class="modal">
        <form @submit.prevent="submitModifyCharacter" action="">
            <div class="modal-content">
                <h4>{{ $t('text.character_modify_title' )}}</h4>
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder=""
                                       id="modify-name"
                                       type="text"
                                       class="validate element-name"
                                       v-model="character.name"
                                >
                                <label for="modify-name">{{ $t('text.character_new_name') }}</label>
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
                <a @click="cancelModifyCharacter"
                   class="modal-close waves-effect waves-green btn btn-flat">
                    {{ $t('text.character_modify_cancel') }}
                </a>
                <button type="submit"
                        class="waves-effect waves-green btn btn-primary">
                    {{ $t('text.character_modify_ok') }}
                </button>
            </div>
        </form>
    </div>
</template>


<script>
    import {mapActions} from 'vuex';
    import CharacterService from "../../services/CharacterService";
    import Loading from "../Loading";

    export default {
        name: "ModifyCharacterModal",

        components: {
            Loading
        },

        data: () => {
            return {
                characterData: {},
                modal: null,
                modals: null,
                buttonsLoading: false,
                character: '',
            };
        },

        methods: {
            ...mapActions(['addCharacter']),

            open: function(character) {
                this.modals = M.Modal.init(
                    document.querySelectorAll('#modify-character-modal'),
                    {
                        onOpenEnd: () => {
                            document.querySelector('#modify-name').focus();
                        }
                    }
                );

                this.character = character;

                this.hideAllError();

                this.modals.forEach(modal => {
                    modal.open();
                });
            },

            hideAllError: function() {
                document.querySelectorAll('input').forEach((node) => {
                    node.classList.remove('invalid');
                });
            },

            submitModifyCharacter: async function() {
                this.buttonsLoading = true;
                this.hideAllError();

                const response = await CharacterService.modify({
                    id: this.character.id,
                    name: this.character.name
                });

                if (response.status !== 'ok') {
                    this.showErrors(response.errors);
                    this.buttonsLoading = false;
                    return;
                }

                this.character = {};
                this.buttonsLoading = false;

                this.closeAllModals();
            },

            showErrors: function(errors) {
                _.forOwn(errors, (values, key) => {
                    document.querySelectorAll(`.element-${key}`).forEach((node) => {
                        node.classList.add('invalid');
                        node.parentElement.querySelector('.helper-text').setAttribute('data-error', values.join("<br>"));
                    })
                });
            },

            cancelModifyCharacter: function() {
                this.characterName = '';
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