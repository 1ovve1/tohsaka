<template>
    <div>
        <NavBar></NavBar>

        <router-view></router-view>
    </div>
</template>

<script>

    import NavBar from './components/NavBar.vue';

    export default {
        components: {
            NavBar
        },

        data: () => ({
            channel: {
                instance: null,
                data: [],
            },
        }),

        methods: {
            subscribe() {

            }
        },
    }
</script>
