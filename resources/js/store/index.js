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
            localStorage.setItem('user', responseData.user)
            localStorage.setItem('permissions', responseData.permissions)
            axios.defaults.headers.common.Authorization = `Bearer ${responseData.access_token}`
            localStorage.setItem('token', `Bearer ${responseData.access_token}`)
            console.log(state.user,state.permissions)

        },

        clearUserData(state) {
            localStorage.removeItem('user')
            localStorage.removeItem('permissions')
            localStorage.removeItem('token')
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
        user: (state) => localStorage.getItem('user'),
        permissions : ()=> localStorage.getItem('permissions')
    }
})
