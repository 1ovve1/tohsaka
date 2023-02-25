<template>
    <RegisterForm />
</template>
<script>
    import RegisterForm from './../components/Forms/RegisterForm.vue';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            RegisterForm
        },

        computed: {
            ...mapGetters({
                isAuth: 'auth/isAuth',
            }),
        },

        created() {
          if (this.isAuth) {
            this.$router.push({ name: 'register' });
          }
        },
    }
</script>
