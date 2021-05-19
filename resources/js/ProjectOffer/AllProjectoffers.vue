<template>
    <div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">
            <table class="border-2 rounded-lg bg-white flex-col items-center justify-center">
                <caption class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Project Offers</caption>
                <thead class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">PO</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Project Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Client Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Offer Ref No</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 align-middle">
                <tr v-for="(projectOffer,id) in projectOffers.data" :key="id">
                    <td class="px-6 py-4 text-center">{{ projectOffer.po }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.project_name }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.client }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.offer_reference_no }}</td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex " role="group">
                            <router-link :to="{name: 'edit', params: { id: projectOffer.id }}"
                                         class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteBook(projectOffer.id)">
                        </span>
                            <router-link :to="{name: 'show', params: { id: projectOffer.id }}"
                                         class="m-2 p-2 rounded-md fas fa-eye hover:bg-gray-600 hover:text-white">
                            </router-link>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <pagination class="flex justify-evenly text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                    :data="projectOffers" @pagination-change-page="getResults">
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
    components : {
        'top-bar' : TopBar
    },
    data() {
        return {
            projectOffers: {}
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteBook(id) {
            this.axios
                .delete(`http://po-management.test/api/projectOffers/delete/${id}`)
                .then(response => {
                    let i = this.projectOffers.data.map(item => item.id).indexOf(id); // find index of your object
                    this.projectOffers.data.splice(i, 1)
                });
        },
        showProjectOffer() {

        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get('http://po-management.test/api/projectOffers?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.projectOffers = data;
            });
        }
    }
}
</script>

<style>

</style>
