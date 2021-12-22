<template>
    <div class="flex-col  justify-center items-center">

        <top-bar home='home' add='add' ></top-bar>

        <!-- filter start -->


        <div class="flex">

            <!--po status-->
            <div class="my-8 px-3 py-4 bg-gray-400">
                <label>Status </label>
                <select class="border-black border-2 rounded-xl" v-model="filters.po_status.value">
                    <option :value="null">Select a column</option>
                    <option v-for="status in projectStatuses" :key="status.id" :value="status.project_status">
                        {{ status.project_status }}
                    </option>
                </select>
            </div>

            <!--submit type-->
            <div class="my-8 px-3 py-4 bg-gray-400">
                <label>Submit Type</label>
                <select class="border-black border-2 rounded-xl" v-model="filters.submit_type.value">
                    <option :value="null">Select a column</option>
                    <option value="Full">Full</option>
                    <option value="Partial">Partial</option>
                </select>
            </div>

            <!--Sub contract-->
            <div class=" my-8 px-3 py-4 bg-gray-400">
                <label>Sub Contract</label>
                <select class="border-black border-2 rounded-xl" v-model="filters.sub_contract.value">
                    <option :value="null">Select a column</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <!-- Project Name-->
            <div class="my-8 px-3 py-4 bg-gray-400">
                <label>Project Name</label>
                <input class="border-black border-2 rounded-xl" v-model="filters.project_name.value"/>
            </div>

            <!-- Client-->
            <div class=" my-8 px-3 py-4 bg-gray-400">
                <label>Client</label>
                <input class="border-black border-2 rounded-xl" v-model="filters.client.value"/>
            </div>

            <!--Offer Ref no-->
            <div class=" my-8 px-3 py-4 bg-gray-400">
                <label>Offer Ref no</label>
                <input class="border-black border-2 rounded-xl" v-model="filters.offer_reference_no.value"/>
            </div>


            <!-- Offer Date-->
            <div class="my-8 px-3 py-4 bg-gray-400">
                <label>Offer Date</label>
                <input class="border-black border-2 rounded-xl" v-model="filters.offer_date.value"/>
            </div>

            <!-- po date-->
            <div class=" my-8 px-3 py-4 bg-gray-400">
                <label>PO Date </label>
                <input class="border-black border-2 rounded-xl" v-model="filters.po_date.value"/>
            </div>

            <!-- Money Receive Date-->
            <div class=" my-8 px-3 py-4 bg-gray-400">
                <label>Money Rcv Date </label>
                <input class="border-black border-2 rounded-xl" v-model="filters.money_received_date.value"/>
            </div>

            <!-- PO-->
            <div class=" my-8 px-3 py-4 bg-gray-400 ">
                <label>PO</label>
                <input class="border-black border-2 rounded-xl" v-model="filters.po.value"/>
            </div>

            <div class="flex justify-center items-end my-8 px-3 py-4 bg-gray-400">
                <button class="border-black border-2 rounded-xl px-2" @click="clearFilter">
                    Clear
                </button>
            </div>
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
                <caption slot="head" class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Project Status</caption>
                <thead class="bg-gray-200" slot="head">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Status</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Offer Ref No</th>
                    <v-th :sort-key="offerDate" class="font-semibold text-sm uppercase px-6 py-4 text-center">Offer Date</v-th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Project Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Client</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">POC</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">PO</th>
                    <v-th :sort-key="poAmount" class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Amount+VAT
                    </v-th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">AIT</th>

                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Inserted By</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Updated by</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Last Update Time</th>

                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Actions</th>
                </tr>
                </thead>
                <tbody slot="body" slot-scope="{displayData}" class="divide-y divide-gray-200 align-middle">
                <tr v-for="(projectOffer) in displayData" :key="projectOffer.id">
                    <td class="px-6 py-4 text-center">{{ projectOffer.po_status }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.offer_reference_no }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.offer_date }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.project_name }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.client }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.poc_name }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.po }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.po_amount_with_vat }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.ait }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.inserted_by }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.last_updated_by }}</td>
                    <td class="px-6 py-4 text-center">{{ projectOffer.last_update_time }}</td>
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
        </div>
            <smart-pagination class="flex justify-center  items-center text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                              :currentPage.sync="currentPage"
                              :totalPages="totalPages"
            />

    </div>
</template>

<script>

import TopBar from "../TopBar";


export default {
    components: {
        'top-bar': TopBar,
    },
    data() {
        return {
            projectOffers: [],
            currentPage: 1,
            totalPages: 0,
            projectStatuses: {},
            filters: {
                po_status: {value: '', keys: ['po_status']},
                submit_type: {value: '', keys: ['submit_type']},
                sub_contract: {value: '', keys: ['sub_contract']},
                sub_contracted_to: {value: '', keys: ['sub_contracted_to']},
                offer_reference_no: {value: '', keys: ['offer_reference_no']},
                offer_date: {value: '', keys: ['offer_date']},
                po_date: {value: '', keys: ['po_date']},
                money_received_date: {value: '', keys: ['money_received_date']},
                po: {value: '', keys: ['po']},
                project_name: {value: '', keys: ['project_name']},
                client: {value: '', keys: ['client']},
            },

        }
    },

    created() {
        this.getResults()
    },
    methods: {
        deleteBook(id) {
            this.axios
                .delete(process.env.MIX_PUBLISH_APP_URL+`projectOffers/delete/${id}`)
                .then(response => {
                    let i = this.projectOffers.map(item => item.id).indexOf(id); // find index of your object
                    this.projectOffers.splice(i, 1)
                });
        },
        showProjectOffer() {

        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get(process.env.MIX_PUBLISH_APP_URL+'projectOffers?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.projectOffers = data;
            });

            this.axios.get(process.env.MIX_PUBLISH_APP_URL+'projectOffers/projectStatus')
                .then(response => {
                    return response.data;
                }).then(data => {
                this.projectStatuses = data;
            });
        },
        clearFilter() {
            this.filters.po_status.value = null;
            this.filters.submit_type.value = null;
            this.filters.sub_contract.value = null;
            this.filters.offer_reference_no.value = null;
            this.filters.offer_date.value = null;
            this.filters.po_date.value = null;
            this.filters.money_received_date.value = null;
            this.filters.po.value = null;
            this.filters.project_name.value = null;
            this.filters.client.value = null;
        },
        //sort functions
        poAmount(row) {
            return row.po_amount_with_vat;
        },
        offerDate(row){
            return row.offer_date;
        }
    }
}
</script>

<style>
 .disabled svg {
    color: grey;
  }

  .disabled a {
    cursor: not-allowed
  }
</style>
