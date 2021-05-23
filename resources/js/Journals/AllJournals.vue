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


        <div v-if="selectedFilter==='Debit Account Name'" class="flex justify-center my-8 px-3 py-4 bg-gray-400">
            <label>Filter by Debit Account : </label>
            <input class="border-black border-2" v-model="filters.debit_account_name.value"/>
        </div>

        <div v-if="selectedFilter==='Credit Account Name'" class="flex justify-center my-8 px-3 py-4 bg-gray-400">
            <label>Filter by Credit Account : </label>
            <input class="border-black border-2" v-model="filters.credit_account_name.value"/>
        </div>
        <div v-if="selectedFilter==='Sub Project'" class="flex justify-center my-8 px-3 py-4 bg-gray-400">
            <label>Filter by Sub Project : </label>
            <input class="border-black border-2" v-model="filters.sub_project_name.value"/>
        </div>

        <!-- filter end -->

        <div class="flex justify-center mt-4">
            <v-table class="border-2 rounded-lg bg-white flex-col items-center justify-center"
                     :data="journals"
                     :filters="filters"
                     :currentPage.sync="currentPage"
                     :pageSize="5"
                     @totalPagesChanged="totalPages = $event"
            >
                <caption class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Journals
                </caption>
                <thead class="bg-gray-200"  slot="head">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Transaction Date</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Description</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Debit Account</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Credit Account</th>
                    <v-th :sort-key="getAmount" class="font-semibold text-sm uppercase px-6 py-4 text-center">Amount</v-th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Invoice No.</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Reference1</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Reference2</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">ADJ Entry</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Sub Project</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Last Update Time</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Last Updated By</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Inserted By</th>

                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 align-middle" slot="body" slot-scope="{displayData}">
                <tr v-for="(journal) in displayData" :key="journal.id">
                    <td class="px-6 py-4 text-center">{{ journal.transaction_date }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.description }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.debit_account_name }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.credit_account_name }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.amount }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.invoice_no }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.reference_1 }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.reference_2 }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.adjusted_entry }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.sub_project_name }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.last_update_time }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.updated_by }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.inserted_by }}</td>

                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex " role="group">
                            <router-link :to="{name: 'editJournal', params: { id: journal.id }}"
                                         class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteJournal(journal.id)">
                            </span>

                        </div>
                    </td>
                </tr>
                </tbody>
            </v-table>
        </div>

        <smart-pagination class="flex justify-evenly text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                :currentPage.sync="currentPage"
                :totalPages="totalPages"
            />
    </div>
</template>

<script>

import TopBar from "./partials/TopBar";

export default {
    name: "AllJournals",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            journals: [],
            currentPage: 1,
            totalPages: 0,
            filters: {
                debit_account_name: {value: '', keys: ['debit_account_name']},
                credit_account_name: {value: '', keys: ['credit_account_name']},
                sub_project_name: {value: '', keys: ['sub_project_name']},
            },
            selectedFilter: null,
            allFilters: ['Debit Account Name', 'Credit Account Name' ,'Sub Project'],
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteJournal(id) {
            this.axios
                .delete(`http://po-management.test/api/journals/delete/${id}`)
                .then(response => {
                    let i = this.journals.data.map(item => item.id).indexOf(id); // find index of your object
                    this.journals.data.splice(i, 1)
                });
        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get('http://po-management.test/api/journals?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.journals = data;
            });
        },
        //filter column
        getAmount(row) {
            return row.amount;
        }
    }
}
</script>

<style scoped>

</style>
