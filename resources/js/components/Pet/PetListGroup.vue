<template>
    <ul class="pet-list-group" :class="{'collapsible': shouldShowCollapsible}">
        <li :class="{'active': shouldShowCollapsible && shouldBeExpandedAutomatically && hasPet}">
            <div :class="{'collapsible-header': shouldShowCollapsible && hasPet, 'empty-header': !hasPet}">
                <div class="row">
                    <h4>{{ title }}</h4>
                </div>
            </div>
            <div v-if="hasPet"
                 :class="{'collapsible-body': shouldShowCollapsible && hasPet}">
                <pet-list v-for="(petIds, category) in categorizedIds"
                          :pet-ids="petIds"
                          :title="category"
                          :key="category"
                          :type="type"
                ></pet-list>
            </div>
            <div v-else>
                <empty-pet-list-group></empty-pet-list-group>
            </div>
        </li>
    </ul>
</template>

<script>
    import PetList from './PetList';
    import EmptyPetListGroup from "./EmptyPetListGroup";

    export default {
        name: "PetListGroup",

        components: {
            EmptyPetListGroup,
            PetList
        },

        props: [
            'title',
            'pets',
            'type',
        ],

        computed: {
            categorizedIds: function() {
                const categorizedIds = {};
                this.pets.map(pet => {
                    if (!categorizedIds[pet.category]) {
                        categorizedIds[pet.category] = [];
                    }

                    categorizedIds[pet.category].push(pet.id);
                });

                return categorizedIds;
            },

            hasPet: function () {
                return this.pets.length > 0;
            },

            shouldShowCollapsible: function() {
                return true;
            },

            shouldBeExpandedAutomatically: function() {
                return this.type === 'discovered';
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

        .empty-header {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
        }
    }
</style>
