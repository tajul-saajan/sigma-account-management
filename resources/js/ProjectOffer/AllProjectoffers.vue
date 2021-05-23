<template>
    <div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <!-- filter start -->
        <div class="flex justify-center my-8 px-3 py-4 bg-gray-400">
            <label class="mr-4">Select a filter : </label>
            <select class="border-black border-2" v-model="selectedFilter">
                <option :value="null">Select a column</option>
                <option v-for="(filter,index) in allFilters" :key="index" :value="filter">{{filter}}</option>
            </select>
        </div>

        <div v-if="selectedFilter==='Project Status'" class="flex justify-center my-8 px-3 py-4 bg-gray-400">
            <label>Filter by Status : </label>
            <select class="border-black border-2" v-model="filters.po_status.value">
                <option :value="null">Select a column</option>
                <option v-for="status in projectStatuses" :key="status.id" :value="status.project_status">
                    {{ status.project_status }}
                </option>
            </select>
        </div>

        <div v-if="selectedFilter==='PO'" class="flex justify-center my-8 px-3 py-4 bg-gray-400">
            <label>Filter by PO : </label>
            <input class="border-black border-2" v-model="filters.po.value"/>
        </div>

        <div v-if="selectedFilter==='Client Name'" class="flex justify-center my-8 px-3 py-4 bg-gray-400">
            <label>Filter by Client : </label>
            <input class="border-black border-2" v-model="filters.client_name.value"/>
        </div>
        <div v-if="selectedFilter==='Sub-Contracted To'" class="flex justify-center my-8 px-3 py-4 bg-gray-400">
            <label>Filter by Sub Contracted To : </label>
            <input class="border-black border-2" v-model="filters.sub_contracted_to.value"/>
        </div>

        <!-- filter end -->

        <div class="flex-col justify-center mt-4">
            <v-table class="border-2 rounded-lg bg-white flex-col items-center justify-center"
                     :data="projectOffers"
                     :filters="filters"
                     :currentPage.sync="currentPage"
                     :pageSize="5"
                     @totalPagesChanged="totalPages = $event"
            >
                <caption class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Project Offers</caption>
                <thead class="bg-gray-200" slot="head">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">PO</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Status</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Offer Date</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Project Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Client Name</th>
                    <v-th :sort-key="poAmount" class="font-semibold text-sm uppercase px-6 py-4 text-center">Amount+VAT</v-th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">VAT</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Actions</th>
                </tr>
                </thead>
                <tbody slot="body" slot-scope="{displayData}" class="divide-y divide-gray-200 align-middle">
                <tr v-for="(projectOffer) in displayData" :key="projectOffer.id">
                    <td class="px-6 py-4 text-center">{{ projectOffer.po }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.po_status }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.offer_date }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.project_name }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.client }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.po_amount_with_vat }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.vat }}</td>
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
            </v-table>
            <smart-pagination class="flex justify-evenly text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                :currentPage.sync="currentPage"
                :totalPages="totalPages"
            />
        </div>

    </div>
</template>

<script>

import TopBar from "./partials/TopBar";

export default {
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            projectOffers: [],
            currentPage: 1,
            totalPages: 0,
            projectStatuses: {},
            filters: {
                po_status: {value: '', keys: ['po_status']},
                po: {value: '', keys: ['po']},
                client_name: {value: '', keys: ['client']},
                sub_contracted_to: {value: '', keys: ['sub_contracted_to']},
            },
            selectedFilter: null,
            allFilters: ['Project Status', 'PO' ,'Client Name', 'Sub-Contracted To'], //todo insertedby and updatedby will be added
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

            this.axios.get('http://po-management.test/api/projectOffers/projectStatus')
                .then(response => {
                    return response.data;
                }).then(data => {
                this.projectStatuses = data;
            });
        },
        //sort functions
        poAmount(row){
            return row.po_amount_with_vat;
        }
    }
}
</script>

<style>

</style>
