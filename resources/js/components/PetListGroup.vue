<template>
    <ul class="pet-list-group" :class="{'collapsible': shouldShowCollapsible}">
        <li :class="{'active': shouldShowCollapsible && shouldBeExpandedAutomatically}">
            <div :class="{'collapsible-header': shouldShowCollapsible}">
                <div class="row">
                    <h4>{{ title }}</h4>
                </div>
            </div>
            <div :class="{'collapsible-body': shouldShowCollapsible}">
                <pet-list v-for="(petIds, category) in categorizedIds"
                          :pet-ids="petIds"
                          :title="category"
                          :key="category"
                          :type="type"
                ></pet-list>
            </div>
        </li>
    </ul>
</template>

<script>
    import PetList from './PetList';

    export default {
        name: "PetListGroup",

        components: {
            PetList
        },

        props: [
            'title',
            'pets',
            'type',
        ],

        computed: {
            categorizedIds() {
                const categorizedIds = {};
                this.pets.map(pet => {
                    if (!categorizedIds[pet.category]) {
                        categorizedIds[pet.category] = [];
                    }

                    categorizedIds[pet.category].push(pet.id);
                });

                return categorizedIds;
            },

            shouldShowCollapsible() {
                return true;
            },

            shouldBeExpandedAutomatically() {
                return this.type === 'firsts';
            }
        },
    };
</script>

<style lang="scss" scoped>
    .pet-list-group {
        h4 {
            font-size: 1.5em;
            margin: 0.3em 0;
        }

        .collapsible-body {
            padding: 0;
        }

        .collapsible-header h4:after {
            content: '\25C0';
            color: black;
            font-weight: bold;
            float: right;
            margin-left: 5px;
            font-size: 0.5em;
        }

        .active .collapsible-header h4:after {
            content: "\25BC";
        }

        .row {
            padding: 0;
            width: 100%;
            margin: 0;
        }
    }
</style>
