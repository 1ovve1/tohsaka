<template>
    <div class="wrapper">
        <div class="main">
            <div class="px-2 scroll" ref="chat_window">
                <div v-for="(message, index) of messages" v-bind:key="index">
                    <ChatMessage
                        :title="message.title"
                        :body="message.body"
                        :is_that_me="message.user_id === myUserId"
                        :combination="message.user_id === previusMessageUserId(index)"
                    >
                    </ChatMessage>
                </div>
            </div>
            <form class="bg-white d-flex justify-content-between p-2">
                <input
                    type="text"
                    name="message_field"
                    ref="message_field"
                    class="form-control"
                    placeholder="Type a message..."
                >
                <input
                    type="submit"
                    class="btn"
                    value="Send"
                    @click="sendMessage"
                >
            </form>
        </div>
    </div>
</template>
<script>
    import { nextTick } from 'vue';
    import { mapGetters } from 'vuex';
    import ChatMessage from './ChatMessage.vue';

    export default {
        components: {
            ChatMessage,
        },

        data: () => ({
            channel: {},
            messages: []
        }),

        computed: {
            ...mapGetters({
                myUserId: 'auth/getUserId'
            })
        },


        methods: {
            async sendMessage(event) {
                event.preventDefault();

                const message_field = this.$refs.message_field;

                if (message_field.value.trim() === '') {
                    return;
                }

                const message_package = {
                    body: message_field.value,
                }
                message_field.value = '';

                await axios.post('/api/chat/message', message_package)
                    .then( (response) => {

                    } )
                    .catch( (response) => {
                        alert(response);
                });
            },

            fillMessages(messages) {
                for (const message of messages) {
                    this.messages.push(message);
                }

                nextTick(this.scrollToTheBottom);
            },

            scrollToTheBottom() {
                const chat_window = this.$refs.chat_window;

                chat_window.scrollTop = chat_window.scrollHeight - chat_window.clientHeight;
            },

            previusMessageUserId(index) {
                const previus_message_index = index - 1;

                if (previus_message_index < 0) {
                    return -1;
                } else {
                    return this.messages[previus_message_index].user_id;
                }
            }
        },


        mounted() {
            this.channel = Echo.channel('presence.chat.1');

            this.channel
            .listen('.new_chat_message_event', (message) => {
                this.fillMessages(message)
            });

        },

        created() {
            axios.get('api/chat/message/')
            .then( ({ data }) => {
                this.fillMessages(data.data.reverse())
            });
        },
    }

</script>
