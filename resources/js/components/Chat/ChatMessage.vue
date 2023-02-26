<template>
    <div>
        <div :class="makeMyMessageSpecial()">
            <div class="pr-2">
                <span class="name">{{ getName() }}</span>
                <div class="msg">{{ body }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: String,
            body: String,
            is_that_me: Boolean,
            combination: Boolean,
        },

        methods: {
            getName() {
                return this.combination ? '': this.title;
            },

            makeMyMessageSpecial() {
                return this.is_that_me ? 'd-flex align-items-center text-right justify-content-end': 'd-flex align-items-center';
            }
        }
    }
</script>
