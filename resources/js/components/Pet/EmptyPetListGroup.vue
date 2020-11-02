<template>
    <div class="empty-element">
        {{ $t('text.pet_list_no_pets') }}
    </div>
</template>

<script>
    export default {
        name: "EmptyPetListGroup"
    }
</script>

<style scoped>
    .empty-element {
        padding: 1rem;
    }
</style>