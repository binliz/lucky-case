const state = {
    lucky: null,
    lucky_history: null
};

const getters = {
    LUCKY: state => {
        return state.lucky
    },
    LUCKY_HISTORY: state => {
        return state.lucky_history
    },
};

const mutations = {
    SET_LUCKY: (state, payload) => {
        state.lucky = payload;
    },
    SET_LUCKY_HISTORY: (state, payload) => {
        state.lucky_history = payload;
    },
};

const actions = {
    LOAD_NEW_LUCKY: async (context, payload) => {
        let {data} = await axios.get('/api/links/' + payload + '/lucky');
        context.commit('SET_LUCKY', data.data);
        context.commit('SET_LUCKY_HISTORY', null);
    },
    LOAD_LUCKY_HISTORY: async (context, payload) => {
        let {data} = await axios.get('/api/links/' + payload + '/history');
        context.commit('SET_LUCKY_HISTORY', data.data);
    },
}

export default {
    state,
    getters,
    mutations,
    actions,
};
