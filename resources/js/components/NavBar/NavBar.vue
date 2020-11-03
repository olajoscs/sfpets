<template>
    <div>
        <ul id="dropdown-locale" class="dropdown-content">
            <li>
                <a href="#/characters">
                    {{ $t('text.navbar_current_character', {name: getCurrentCharacter ? getCurrentCharacter.name : $t('text.character_unknown_name') })}}
                </a>
            </li>
            <li>
                <a href="/locale/set/hu">
                    {{ $t('text.navbar_language_hungarian') }}
                </a>
            </li>
            <li>
                <a href="/locale/set/en">
                    {{ $t('text.navbar_language_english') }}
                </a>
            </li>
        </ul>
        <nav class="nav">
            <div class="nav-wrapper">
                <a href="#/" class="brand-logo left">{{ $t(`text.app_title`) }}</a>
                <ul class="right">
                    <li>
                        <a class="dropdown-button dropdown-trigger"
                           href="#!"
                           data-activates="dropdown-locale"
                           data-target="dropdown-locale">
                            <i class="material-icons left locale-icon">menu</i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "NavBar",

        data: () => {
            return {};
        },

        computed: {
            ...mapGetters(['getCurrentCharacter'])
        },
    };
</script>

<style scoped lang="scss">

    #dropdown-locale {
        min-width: 100%;

        li {
            margin: 0;
            padding: 0;

            a {
                margin: 0;
                padding: 1rem;
            }
        }
    }
</style>
