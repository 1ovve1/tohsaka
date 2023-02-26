<template>
    <LoginForm />
</template>
<script>
    import LoginForm from './../components/Forms/LoginForm.vue';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            LoginForm
        },

        computed: {
            ...mapGetters({
                isAuth: 'auth/isAuth',
            }),
        },

        created() {
          if (this.isAuth) {
            this.$router.push({ name: 'home' });
          }
        },
    }
</script>
