<template>
<div class="flex-col  justify-center items-center">
    <top-bar home='allTransactions' add='addTransaction' ></top-bar>
    <div class="flex justify-center mt-4">
            <v-table class="border-2 rounded-lg bg-white flex-col items-center justify-center"
                     :data="transactions"
                     :currentPage.sync="currentPage"
                     :pageSize="5"
                     @totalPagesChanged="totalPages = $event"

            >
                <caption slot="head" class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Transactions</caption>
                <thead slot="head" class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Type</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Cash or Cheque</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Description</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Source</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Destination</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Reason</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Reference</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Sub Project</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Amount</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Cheque No</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Bank</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Inserted By</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Updated By</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Last Update Time</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Action</th>
                </tr>
                </thead>
                <tbody slot="body" slot-scope="{displayData}" class="divide-y divide-gray-200 align-middle">
                <tr v-for="(transaction) in displayData" :key="transaction.id">
                    <td class="px-6 py-4 text-center">{{ transaction.transaction_type }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.cash_or_check }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.description }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.source_name }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.destination_name }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.reason }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.reference }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.sub_project_name }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.amount }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.cheque_no }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.bank_name }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.inserted_by }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.updated_by }}</td>
                    <td class="px-6 py-4 text-center">{{ transaction.last_update_time }}</td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex " role="group">
                            <router-link :to="{name: 'editTransaction', params: { id: transaction.id }}"
                                         class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteTransaction(transaction.id)">
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
    name: "AllTransactions",
    data() {
        return {
            transactions: [],
            currentPage: 1,
            totalPages: 0,
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteTransaction(id) {
            this.axios
                .delete(process.env.MIX_PUBLISH_APP_URL + `transactions/delete/${id}`)
                .then(response => {
                    let i = this.transactions.map(item => item.id).indexOf(id); // find index of your object
                    this.transactions.splice(i, 1)
                });
        },
        showProjectOffer() {

        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get(process.env.MIX_PUBLISH_APP_URL + 'transactions?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.transactions = data;
            });
        }
    }
}
</script>

<style scoped>

</style>
