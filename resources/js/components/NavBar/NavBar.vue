<template>
    <div>
        <ul id="dropdown-locale" class="dropdown-content">
            <li>
                <a href="/locale/set/hu">
                    {{ $t('text.language_hungarian') }}
                </a>
            </li>
            <li>
                <a href="/locale/set/en">
                    {{ $t('text.language_english') }}
                </a>
            </li>
        </ul>
        <nav class="nav">
            <div class="nav-wrapper">
                <a href="#/" class="brand-logo left">{{ $t(`text.app_title`) }}</a>
                <ul class="right">
                    <li>
                        <a href="#/characters">
                            <i class="material-icons left">account_box</i>
                            <div class="truncate player-name">
                                <span v-if="getCurrentCharacter">{{ getCurrentCharacter.name }}</span>
                                <span v-else>{{ $t(`text.character_unknown_name`) }}</span>
                            </div>
                        </a>
                    </li>
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
    .locale-icon {
        margin-right: 0;
        padding-right: 15px;
    }

    .locale-dropdown-icon {
        margin-left: 0;
    }

    .player-name {
        width: 50px;
    }

    #dropdown-locale li {
        margin: 0;
        padding: 0;

        a {
            margin: 0;
            padding: 13px;

            img {
                width: 40px;
            }
        }
    }
</style>
