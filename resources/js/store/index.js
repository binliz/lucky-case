import Vue from 'vue';
import Vuex from 'vuex';

import links from './modules/links/index';
import lucky from './modules/lucky/index';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        links, lucky
    },
});

