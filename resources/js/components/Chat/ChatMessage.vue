<template>
    <div>
        <div v-if="isThatMe">
            <div class="d-flex align-items-center text-right justify-content-end ">
                <div class="pr-2"> <span class="name">{{ title }}</span>
                    <p class="msg">{{ message }}</p>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="d-flex align-items-center">
                <div class="pr-2"> <span class="name">{{ title }}</span>
                    <p class="msg">{{ message }}</p>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        props: {
            title: String,
            message: String,
            userId: Number,
        },

        computed: {
            ...mapGetters({
                myUserId: 'auth/getUserId'
            }),

            isThatMe() {
                return this.userId === myUserId;
            }
        }
    }
</script>
