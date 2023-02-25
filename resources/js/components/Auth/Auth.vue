<template>
    <div>
        <div v-if="isNotAuth">

            <button class="btn btn-primary" v-on:click="switchForm">{{ form_switch ? 'Регистрация' : 'Вход' }}</button>

            <Transition>
                <div v-if="form_switch">
                    <LoginForm></LoginForm>
                </div>
                <div v-else>
                    <RegisterForm></RegisterForm>
                </div>
            </Transition>
        </div>

        <div v-else>
            <UserPannel></UserPannel>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import LoginForm from './LoginForm.vue';
    import RegisterForm from './RegisterForm.vue';
    import UserPannel from './UserPannel.vue';

    export default {
        components: {
            LoginForm,
            RegisterForm,
            UserPannel,
        },

        data: () => ({
            form_switch: true,
        }),

        computed: {
            ...mapGetters('auth', ['isNotAuth']),
        },

        methods: {
            switchForm() {
                this.form_switch = !this.form_switch;
            }
        },

    }

</script>
