const state = () => ({
    auth_status: false,
    user: {}
});

const getters = {
    isAuth: (state) => state.auth_status,
    isNotAuth: (state) => !state.auth_status,

    user: (state) => state.user,
};

const mutations = {
    SET_AUTH_STATUS: (state, status) => state.auth_status = status,
    SET_USER_INSTANCE: (state, user) => state.user = user,
};

const actions = {
    login: ({ commit }) => {
        axios.get('api/user')
            .then( ({ data }) => {
                commit('SET_USER_INSTANCE', data);
                commit('SET_AUTH_STATUS', true);
            }).catch( ({ response: { data } }) => {
                commit('SET_AUTH_STATUS', false);
            });
    },

    logout: ({ commit }) => {
        commit('SET_USER_INSTANCE', {});
        commit('SET_AUTH_STATUS', false);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
