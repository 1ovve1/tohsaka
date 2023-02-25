import { createStore, createLogger } from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import auth from './modules/auth';

const debug = true;

export default createStore({
    modules: {
        auth
    },
    strict: debug,
    plugins: debug ? [createLogger(), createPersistedState()] : [createPersistedState()],
});
