<template>
    <div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">
            <table class="border-2 rounded-lg bg-white flex-col items-center justify-center">
                <caption class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Journals
                </caption>
                <thead class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Transaction Date</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Description</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Debit Account</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Credit Account</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Amount</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Invoice No.</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Reference</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">ADJ Entry</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Sub Project</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Last Update Time</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Last Updated By</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Inserted By</th>

                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 align-middle">
                <tr v-for="(journal,id) in journals.data" :key="id">
                    <td class="px-6 py-4 text-center">{{ journal.transaction_date }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.description }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.debit_account }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.credit_account }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.amount }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.invoice_no }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.reference }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.adjusted_entry }}</td>
                    <td class="px-6 py-4 text-center">{{ journal.sub_project }}</td>
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
            </table>
        </div>

        <pagination class="flex justify-evenly text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                    :data="journals" @pagination-change-page="getResults">
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
    name: "AllJournals",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            journals: {}
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
        }
    }
}
</script>

<style scoped>

</style>
