const state = {
    links: null,
    currentLink: null
};

const getters = {
    LINKS: state => {
        return state.links
    },
    CURRENT_LINK: state => {
        return state.currentLink
    }
};

const mutations = {
    SET_LINKS: (state, payload) => {
        state.links = payload;
    },
    SET_CURRENT_LINK: (state, payload) => {
        state.currentLink = payload;
    }
};

const actions = {
    LOAD_LINKS: async (context, payload) => {
        let {data} = await axios.get('/api/links');
        context.commit('SET_LINKS', data.data);
    },
    ADD_LINK: async (context, payload) =>{
        let {data} = await axios.post('/api/links');
        context.commit('SET_LINKS', data.data);
    },
    DEACTIVATE_LINK:async (context, payload) =>{
        let {data} = await axios.put('/api/links/'+payload,{valid: false});
        context.commit('SET_LINKS', data.data);
    },
    ACTIVATE_LINK:async (context, payload) =>{
        let {data} = await axios.put('/api/links/'+payload,{valid: true});
        context.commit('SET_LINKS', data.data);
    },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
