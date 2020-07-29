<template>
    <div>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">SFP</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down center">
                    <menu-list :classes="[]" id="''"></menu-list>
                </ul>
            </div>
        </nav>

        <menu-list :classes="['sidenav']"
                   :id="'mobile-demo'"></menu-list>
    </div>

</template>

<script>
    import MenuList from './MenuList';

    export default {
        name: "Localization",

        components: {
            MenuList
        },

        data: () => {
            return {};
        },

        computed: {},

        methos: {},

        created() {
        },
    };
</script>

<style scoped>

</style>
