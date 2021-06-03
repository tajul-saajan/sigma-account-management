<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allUsers' add='addUser'></top-bar>

        <div class="flex justify-center mt-4">
            <v-table class="border-2 rounded-lg bg-white flex-col items-center justify-center"
                     :data="users"
                     :currentPage.sync="currentPage"
                     :pageSize="5"
                     @totalPagesChanged="totalPages = $event"

            >
                <caption slot="head" class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Users
                </caption>
                <thead slot="head" class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Email</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Actions</th>
                </tr>
                </thead>
                <tbody slot="body" slot-scope="{displayData}" class="divide-y divide-gray-200 align-middle">
                <tr v-for="(user) in displayData" :key="user.id">
                    <td class="px-6 py-4 text-center">{{ user.name }}</td>
                    <td class="px-6 py-4 text-center">{{ user.email }}</td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex " role="group">
                            <router-link :to="{name: 'editUser', params: { id: user.id }}"
                                         class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteUser(user.id)">
                            </span>

                        </div>
                    </td>
                </tr>
                </tbody>
            </v-table>
        </div>

        <smart-pagination class="flex justify-center  items-center text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                          :currentPage.sync="currentPage"
                          :totalPages="totalPages"
        />
    </div>
</template>

<script>
export default {
    name: "AllUsers",
    data() {
        return {
            users: [],
            currentPage: 1,
            totalPages: 0,
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteUser(id) {
            this.axios
                .delete(process.env.MIX_PUBLISH_APP_URL + `users/delete/${id}`,{
                    headers: {
                    'Authorization': localStorage.getItem('token')
                }
                })
                .then(response => {
                    let i = this.users.map(item => item.id).indexOf(id); // find index of your object
                    this.users.splice(i, 1)
                });
        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get(process.env.MIX_PUBLISH_APP_URL + 'users?page=' + page,{
                headers: {
                    'Authorization': localStorage.getItem('token')
                }
            })
                .then(response => {
                    return response.data;
                }).then(data => {
                this.users = data;
            });
        },
    },
    computed: {}
}
</script>

<style scoped>

</style>
