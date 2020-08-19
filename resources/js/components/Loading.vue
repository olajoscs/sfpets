<template>
    <div class="valign-wrapper loading-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Loading"
    };
</script>

<style scoped>
    .loading-container {
        width: 100%;
        min-height: 100px;
    }

    .preloader-wrapper {
        margin: auto;
    }
</style>
