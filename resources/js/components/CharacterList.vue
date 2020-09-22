<template>
    <div>
        <h2>{{ $t('text.character_list_title') }}</h2>
        <div v-if="this.loading">
            <loading></loading>
        </div>

        <div v-else>
            <ul class="collection with-header">
                <character v-for="character in getCharacters"
                     :key="character.id"
                     :id="character.id"
                ></character>
            </ul>
        </div>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import Character from "./Character";
    import Loading from "./Loading";

    export default {
        name: "CharacterList",

        data: () => {
            return {
                characters: [],
                loading: false
            };
        },

        components: {
            Character,
            Loading
        },

        methods: {
            ...mapActions(['fetchCharacters'])
        },

        computed: {
            ...mapGetters(['getCharacters'])
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