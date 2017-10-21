require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import router from './router';
import axios from 'axios'
import API from './services/API'
import Store from './services/auth'

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'

import EventBus from './components/plugins/event-bus'

Vue.use(Toaster, {timeout: 5000})
Vue.component('App', require('./App.vue'));
Vue.use(EventBus)

var bus = new Vue()

axios.defaults.baseURL = 'http://localhost:8000/';

//axios.defaults.baseURL = 'http://165.227.111.118/'; 
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
