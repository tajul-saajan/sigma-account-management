<template>
    <div class="flex-col  justify-center items-center">
        <top-bar home='allRequisitions' add='addRequisition'></top-bar>
        <div class="flex justify-center mt-4">
            <v-table class="border-2 rounded-lg bg-white flex-col items-center justify-center"
                     :data="requisitions"
                     :currentPage.sync="currentPage"
                     :pageSize="5"
                     @totalPagesChanged="totalPages = $event"

            >
                <caption slot="head" class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Requisitions
                </caption>
                <thead slot="head" class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Description</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Reason</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Comment</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Reference</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Amount</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Applied By</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Applied At</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Endorsed</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Approved</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Action</th>
                </tr>
                </thead>
                <tbody slot="body" slot-scope="{displayData}" class="divide-y divide-gray-200 align-middle">
                <tr v-for="(requisition) in displayData" :key="requisition.id">
                    <td class="px-6 py-4 text-center">{{ requisition.description }}</td>
                    <td class="px-6 py-4 text-center">{{ requisition.reason }}</td>
                    <td class="px-6 py-4 text-center">{{ requisition.comment }}</td>
                    <td class="px-6 py-4 text-center">{{ requisition.reference }}</td>
                    <td class="px-6 py-4 text-center">{{ requisition.amount }}</td>
                    <td class="px-6 py-4 text-center">{{ requisition.applied_by }}</td>
                    <td class="px-6 py-4 text-center">{{ requisition.applied_at }}</td>
                    <td class="px-6 py-4 text-center">{{ requisition.endorsed }}</td>
                    <td class="px-6 py-4 text-center">{{ requisition.approved }}</td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex " role="group">
                            <router-link :to="{name: 'editRequisition', params: { id: requisition.id }}"
                                         class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteRequisition(requisition.id)">
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
    name: "EditRequisition",
    data() {
        return {
            requisitions: [],
            currentPage: 1,
            totalPages: 0,
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteRequisition(id) {
            this.axios
                .delete(process.env.MIX_PUBLISH_APP_URL + `requisitions/delete/${id}`)
                .then(response => {
                    let i = this.requisitions.map(item => item.id).indexOf(id); // find index of your object
                    this.requisitions.splice(i, 1)
                });
        },
        showProjectOffer() {

        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get(process.env.MIX_PUBLISH_APP_URL + 'requisitions?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.requisitions = data;
            });
        }
    }
}
</script>

<style scoped>

</style>
