import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

axios.defaults.baseURL = 'http://po-management.test/api'

export default new Vuex.Store({
    state: {
        user: null,
        token: localStorage.getItem('token') || '',
        permissions : null
    },

    mutations: {
        setUserData(state, responseData) {
            state.user = responseData.user
            state.permissions = responseData.permissions
            localStorage.setItem('user', JSON.stringify(responseData.user))
            axios.defaults.headers.common.Authorization = `Bearer ${responseData.access_token}`
            console.log(state.user,state.permissions)

        },

        clearUserData(state) {
            localStorage.removeItem('user')
            axios.defaults.headers.common.Authorization = null
            this.state.user = null
            delete axios.defaults.headers.common.Authorization
            // location.reload()
        }
    },

    actions: {
        login({commit}, credentials) {
            return axios
                .post('/login', credentials)
                .then(({data}) => {
                    commit('setUserData', data)
                })
        },

        logout({commit}) {
            commit('clearUserData')
        }
    },

    getters: {
        isLogged: (state) => localStorage.getItem('user') !== null,
        user: (state) => localStorage.getItem('user')
    }
})
