import Vue from "vue";
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import SmartTable from './vuejs-smart-table'
import TopBar from "./TopBar";
import store from "./store";



Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(require('vue-resource'));
Vue.use(SmartTable)
Vue.component('top-bar', TopBar)

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const token = localStorage.getItem('token')
if (token) {
    axios.defaults.headers.common.Authorization = token
}


const app = new Vue({
    el: '#app',
    router: router,
    store:store,
    render: h => h(App),
});


router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLogged===false) {
            next({
                path: '/login',
                params: {nextUrl: to.fullPath}
            })
        } else {
            let user = JSON.parse(localStorage.getItem('user'))
            if (to.matched.some(record => record.meta.is_admin)) {
                if (user.is_admin === 1) {
                    next()
                } else {
                    next({name: 'admin-dashboard'})
                }
            } else if (to.matched.some(record => record.meta.is_user)) {
                if (user.is_admin === 0) {
                    next()
                } else {
                    next({name: 'admin'})
                }
            }
            next()
        }
    } else {
        next()
    }
})
