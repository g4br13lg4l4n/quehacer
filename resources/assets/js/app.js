require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import router from './router';
import axios from 'axios'
import API from './services/API'
import Store from './services/auth'

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'

Vue.use(Toaster, {timeout: 5000})

Vue.component('App', require('./App.vue'));

axios.defaults.baseURL = 'http://localhost:8000/';
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
};

window.axios = axios
window.API = API
window.Store = Store


/* eslint-disable no-new */
const app = new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App },
});
