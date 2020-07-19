<template>
        <div class="row card-panel grey lighten-5 z-depth-1">
            <div class="col s4 l2 justify-content-md-center">
                <img src="https://picsum.photos/50" alt="" class="circle responsive-img">
                <!-- notice the "circle" class -->
            </div>
            <div class="col s4 l2 justify-content-md-center">{{ pet.name }}</div>
            <div class="col s4 l2 justify-content-md-center">{{ pet.location }}</div>
            <div class="col s4 l2 justify-content-md-center">{{ pet.description }}</div>
            <div class="col s4 l2 justify-content-md-center">
                <button v-if="pet.isFound" @click="markAsFound(false)" class="waves-effect waves-light btn-small">
                    Mégsincs meg
                </button>
                <button v-else-if="pet.isDiscovered" @click="markAsFound(true)"
                        class="waves-effect waves-light btn-small">Megvan
                </button>
            </div>
            <div class="col s4 l2 justify-content-md-center">
                <button v-if="pet.isDiscovered" @click="markAsDiscovered(false)"
                        class="waves-effect waves-light btn-small">Mégse elérhető
                </button>
                <button v-else @click="markAsDiscovered(true)" class="waves-effect waves-light btn-small">Már
                    elérhető
                </button>
            </div>
        </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name: "Pet",

        props: [
            'id',
        ],

        data: function () {
            return {};
        },

        computed: {
            ...mapGetters(['getPet']),
            pet() {
                return this.getPet(this.id);
            }
        },

        methods: {
            ...mapActions(['setFound', 'setDiscovered']),

            markAsFound: function(isFound) {
                this.setFound({petId: this.pet.id, isFound});
            },

            markAsDiscovered: function(isDiscovered) {
                this.setDiscovered({petId: this.pet.id, isDiscovered});
            },
        }
    };
</script>

<style scoped>
    .row .col {
        height:60px;
    }
</style>
