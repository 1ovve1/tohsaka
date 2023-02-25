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

        created() {
            this.channel.instance = Echo.channel('public.cinema.1');

            this.channel.instance.subscribed(() => {
                console.log('Succsesfull!!');
            }).listen('.cinema', (event) => {
                console.log(event);
            });
        },
    }
</script>
