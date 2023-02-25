<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    †
                    Tohsaka
                    <b class="text-danger">Rin</b>
                    †
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link :to="{name: 'home'}" class="nav-link active" aria-current="page">Home</router-link>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <div v-if="isAuth" class="d-flex flex-lg-row flex-column">
                            <li class="nav-item">
                                <router-link v-text="getUserName" :to="{name: 'home'}" class="nav-link"></router-link>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link btn" v-on:click="logout">Logout</button>
                            </li>
                        </div>
                        <div v-else class="d-flex flex-lg-row flex-column">
                            <li class="nav-item">
                                <router-link :to="{name: 'login'}" class="nav-link">Login</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'register'}" class="nav-link">Register</router-link>
                            </li>
                        </div>
                    </ul>
                    <hr>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {

        computed: {
            ...mapGetters({
                isAuth: 'auth/isAuth',
                getUserName: 'auth/getUserName'
            }),
        },
        methods:{
            ...mapActions({
                forgetUser: "auth/logout"
            }),
            async logout(){
                await axios.post('/api/logout').then(({data})=>{
                    this.forgetUser();
                    this.$router.push({ name: "home" });
                })
            },
        }
    }
</script>
