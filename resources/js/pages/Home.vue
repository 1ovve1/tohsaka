<template>
    <div class="container">
        <Chat></Chat>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex';
    import Chat from '../components/Chat/Chat.vue';

    export default {

        components: {
            Chat
        },

        computed: {
            ...mapGetters({
                isNotAuth: 'auth/isNotAuth'
            })
        },

        created() {
            if (this.isNotAuth) {
                this.$router.push({ name: 'login' });
            }
        }
    }
</script>
