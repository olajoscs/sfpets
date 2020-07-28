<template>
    <div>
        <div v-if="petIds.length === 0">
            No pets to see here
        </div>
        <ul v-else class="pet-list collection with-header collapsible" :class="{expandable: shouldBeExpandable}">
            <li :class="{active: shouldBeExpandable}">
                <div class="collapsible-header">
                    <div class="row">
                        <span>{{ upperFirst(title) }}</span>
                    </div>
                </div>
                <div class="collapsible-body">
                    <ul>
                        <pet v-for="petId in petIds"
                             :key="petId"
                             :id="petId"
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
            shouldBeExpandable() {
                return this.type === 'discovered';
            }
        },

        methods: {
            upperFirst(string) {
                return _.upperFirst(string);
            }
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
