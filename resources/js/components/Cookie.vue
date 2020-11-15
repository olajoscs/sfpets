<template>
    <footer>
        <cookie-law :buttonText="$t('text.cookie_accept')"
                    :message="$t('text.cookie_message')"
        ></cookie-law>
    </footer>
</template>

<script>
    import CookieLaw from 'vue-cookie-law'
    export default {
        components: { CookieLaw }
    }
</script>