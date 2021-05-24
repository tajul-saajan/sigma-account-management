import Vue from "vue";
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import SmartTable from 'vuejs-smart-table'





Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(require('vue-resource'));
Vue.use(SmartTable)

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const BASE_URL =   process.env.VUE_APP_API_URL;

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
