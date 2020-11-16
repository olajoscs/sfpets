<template>
    <div>
        <h4>{{ $t('text.token_connection_title') }}</h4>
        <div>
            <h5>{{ $t('text.token_connection_step_1_title') }}</h5>
            <p>{{ $t('text.token_connection_step_1_1') }}</p>
            <input v-if="token" type="text" v-model="token">
            <p>
                <button v-if="token"
                        class="waves-effect waves-green btn btn-primary"
                        v-clipboard:copy="token"
                        v-clipboard:success="copyDone">
                    {{ $t('text.token_connection_copy_to_clipboard') }}
                </button>

                <button v-else
                        class="waves-effect waves-green btn btn-primary"
                        @click="generateToken">
                    {{ $t('text.token_connection_generate') }}
                </button>
            </p>

            <hr>

            <h5>{{ $t('text.token_connection_step_2_title') }}</h5>
            <p>
                {{ $t('text.token_connection_step_2_1') }}<br>
                {{ $t('text.token_connection_step_2_2') }}
                <input type="text" v-model="generatedToken">
                <button class="waves-effect waves-green btn btn-primary"
                        @click="applyToken">
                    {{ $t('text.token_connection_connect') }}
                </button>
            </p>
        </div>
    </div>
</template>

<script>
    import Axios from 'axios';
    import helpers from '../helpers';

    export default {
        name: "GenerateToken",

        data: () => {
            return {
                token: '',
                generatedToken: '',
            }
        },

        methods: {
            generateToken: async function() {
                const response = await Axios.get('/token/generate');

                this.token = response.data.token;
            },

            applyToken: async function() {
                const response = await Axios.post('/token/apply', {token: this.generatedToken});

                if (response.data.status === 'ok') {
                    location.replace('/');
                } else {
                    helpers.toast(this.$t('text.token_connection_invalid_token_code'));
                }
            },

            copyDone: async function() {
                helpers.toast('Token kimásolva');
            }
        }
    }
</script>

<style scoped>

</style>