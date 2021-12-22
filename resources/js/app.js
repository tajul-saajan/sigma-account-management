import Vue from "vue";
import App from "./App.vue";
import VueRouter from "vue-router";
import VueAxios from "vue-axios";
import axios from "axios";
import { routes } from "./routes";
import SmartTable from "./vuejs-smart-table";
import TopBar from "./TopBar";
import store from "./store";
import VueSweetalert2 from "vue-sweetalert2";

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(require("vue-resource"));
Vue.use(SmartTable);
Vue.component("top-bar", TopBar);
Vue.use(VueSweetalert2);

const router = new VueRouter({
    mode: "history",
    routes: routes
});

Vue.mixin({
    methods: {
        hasPermission(permission) {
            let permissions = JSON.parse(localStorage.getItem("permissions"));
            return permissions.includes(permission);
        }
    }
});

const token = localStorage.getItem("token");
if (token) {
    axios.defaults.headers.common.Authorization = token;
}

axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (error.response.status === 403) {
            this.$swal({
                title: "ALert",
                text: "You are not authorized to this action!\n Please Log In!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Okay",
                showCloseButton: true,
                showLoaderOnConfirm: true
            });
            store
                .dispatch("logout")
                .then(() => {
                    router.push({ name: "login" });
                    // location.reload()
                })
                .catch(error => {
                    console.log(error);
                });
        } else if (error.response.status === 401) {
            this.$swal({
                title: "ALert",
                text: "Session expired!\nPlease Log In again!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Okay",
                showCloseButton: true,
                showLoaderOnConfirm: true
            });
            store
                .dispatch("logout")
                .then(() => {
                    router.push({ name: "login" });
                    // location.reload()
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
);

const app = new Vue({
    el: "#app",
    router: router,
    store: store,
    render: h => h(App)
});
