require('./bootstrap');

import Vue from 'vue'
import Vuex from 'vuex';
import App from './components/App.vue'
import store from './store/Store';
import VueI18n from "vue-i18n";
import ENGLISH_TRANSLATIONS from "./translations/en";
import HUNGARIAN_TRANSLATIONS from "./translations/hu";
import VueRouter from 'vue-router';
import router from './router';
import VueClipboard from 'vue-clipboard2';

Vue.use(VueI18n);
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(VueClipboard);

const TRANSLATIONS = {
    en: ENGLISH_TRANSLATIONS,
    hu: HUNGARIAN_TRANSLATIONS,
};

const i18n = new VueI18n({
    locale: LOCALE, // defined in the main view file,
    messages: TRANSLATIONS,
});

new Vue({
    store,
    i18n,
    router,
    render: h => h(App)
}).$mount('#app');

