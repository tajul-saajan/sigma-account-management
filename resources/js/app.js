import Vue from "vue";
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import SmartTable from './vuejs-smart-table'
import TopBar from "./TopBar";





Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(require('vue-resource'));
Vue.use(SmartTable)

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

Vue.component('top-bar',TopBar)

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
