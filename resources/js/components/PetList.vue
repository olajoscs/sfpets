<template>
    <div>
        <ul class="pet-list collection with-header collapsible" :class="{expandable: shouldBeExpandedAutomatically}">
            <li :class="{active: shouldBeExpandedAutomatically}">
                <div v-if="shouldShowCollapsibleHeader" class="collapsible-header">
                    <div class="row">
                        <span>{{ upperFirst(title) }}</span>
                    </div>
                </div>
                <div class="collapsible-body">
                    <ul>
                        <pet v-for="petId in petIds"
                             :key="petId"
                             :id="petId"
                             :list-type="type"
                        ></pet>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import Pet from './Pet';
    import _ from 'lodash';
    import helpers from '../helpers';

    export default {
        name: "PetList",

        props: [
            'title',
            'petIds',
            'type',
        ],

        components: {
            Pet
        },

        computed: {
            shouldBeExpandedAutomatically() {
                return ['all', 'found'].indexOf(this.type) === -1;
            },

            shouldShowCollapsibleHeader() {
                return this.type !== 'firsts';
            }
        },

        methods: {
            upperFirst(string) {
                return _.upperFirst(string);
            }
        },

        mounted() {
            helpers.initUiComponents();
        }
    };
</script>

<style lang="scss" scoped>
    .pet-list{
        .collapsible-body {
            padding: 0;
        }

        .collapsible-header span:after {
            content: '\25C0';
            color: black;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active .collapsible-header span:after {
            content: "\25BC";
        }

        .row {
            padding: 0;
            width: 100%;
            margin: 0;
        }
    }
</style>
