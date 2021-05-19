<template>
    <div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">
            <table class="border-2 rounded-lg bg-white flex-col items-center justify-center">
                <caption class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Account Types</caption>
                <thead class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Type</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Description</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Classification</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 align-middle">
                <tr v-for="(accountType,id) in accountTypes.data" :key="id">
                    <td class="px-6 py-4 text-center">{{ accountType.type }}</td>
                    <td class="px-6 py-4 text-center">{{ accountType.description }}</td>
                    <td class="px-6 py-4 text-center">{{ accountType.classification }}</td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex " role="group">
                            <router-link :to="{name: 'editAccountTypes', params: { id: accountType.id }}"
                                         class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteBook(accountType.id)">
                            </span>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <pagination class="flex justify-evenly text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                    :data="accountTypes" @pagination-change-page="getResults">
            <span slot="prev-nav">
                <span class="fas fa-arrow-circle-left"></span>
                <span>Previous</span>
            </span>
            <span slot="next-nav">
                <span>Next</span>
                <span class="fas fa-arrow-circle-right"></span>
            </span>

        </pagination>
    </div>
</template>

<script>
import TopBar from "./partials/TopBar";

export default {
    name: "AllAccountTypes",
    components: {
      'top-bar' : TopBar
    },
    data() {
        return {
            accountTypes: {}
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteBook(id) {
            this.axios
                .delete(`http://po-management.test/api/accountTypes/delete/${id}`)
                .then(response => {
                    let i = this.accountTypes.data.map(item => item.id).indexOf(id); // find index of your object
                    this.accountTypes.data.splice(i, 1)
                });
        },
        showProjectOffer() {

        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get('http://po-management.test/api/accountTypes?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.accountTypes = data;
            });
        }
    }
}
</script>

<style scoped>

</style>
