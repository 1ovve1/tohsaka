<template>
    <div>
        Channel status:
        <p>
            {{ (channel.instance) ? 'true': 'false'}}
        </p>
        Channel data:

        <ul>
            <li v-for="(item, key) in data">
                {{ key }} : {{ item }}
            </li>
        </ul>

        <button on:click="subscribe">Subscribe</button>
    </div>
</template>

<script>
export default {
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
