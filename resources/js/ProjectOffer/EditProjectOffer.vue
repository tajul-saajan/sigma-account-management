<template>
    <div class="flex-col  justify-center items-center">

        <top-bar home='home' add='add' ></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateProjectOffer" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Project Offer</p>
                <div class="form-group">
                    <label class="block text-sm text-gray-00">PO Status</label>
                    <div class="flex items-center">
                        <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                                :disabled="addStatusMode===true"
                                v-model="projectOffer.po_status"
                                @change="updatePoStatus">
                            <option v-for="status in statuses" :value="status.project_status"> {{
                                    status.project_status
                                }}
                            </option>
                        </select>
                        <span class="fas fa-plus-square ml-2 text-2xl" @click="addStatusMode=true"
                              v-if="addStatusMode===false"></span>
                    </div>

                    <!--for adding new statuses-->
                    <div class="flex items-center mt-2" v-if="addStatusMode===true">
                        <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="newStatus" placeholder="Enter New Status">
                        <span class="fas fa-plus-square ml-2 text-2xl" @click="addNewStatus"></span>
                    </div>
                    <!--end-->

                </div>

                <!--  ******  Fields Based On PO Status START    ******    -->

                <!--     PO Received     -->
                <div>
                    <div class="my-2">
                        <label>PO No</label>
                        <input type="number" :disabled="poStatus!=='PO Received'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.po">
                    </div>
                    <div class="my-2">
                        <label>PO Date</label>
                        <input type="date" :disabled="poStatus!=='PO Received'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.po_date">
                    </div>

                </div>


                <!--     eBill Submitted     -->
                <div>
                    <div class="my-2">
                        <label>eBill Submission Date</label>
                        <input type="date" :disabled="poStatus!=='eBill Submitted'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.ebill_submission_date">
                    </div>
                    <div class="my-2">
                        <label>Mushok NO</label>
                        <input type="text" :disabled="poStatus!=='eBill Submitted'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.mushok_no">
                    </div>

                    <div class="my-2">
                        <label>Tracking NO</label>
                        <input type="text" :disabled="poStatus!=='eBill Submitted'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.tracking_no_robi">
                    </div>

                </div>

                <!--     Hard Copy Submitted     -->
                <div>
                    <div class="my-2">
                        <label>Hard Copy Submission Date</label>
                        <input type="date" :disabled="poStatus!=='Hard Copy Submitted'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.hard_copy_submission_date">
                    </div>

                    <!-- room for file upload -->

                </div>

                <!--     Money Received     -->
                <div>
                    <div class="my-2">
                        <label>Money Receive Date</label>
                        <input type="date" :disabled="poStatus!=='Money received'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.money_received_date">
                    </div>
                    <div class="my-2">
                        <label>Received Amount</label>
                        <input type="number" :disabled="poStatus!=='Money received'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.received_amount">
                    </div>

                </div>

                <!--  ######  Fields Based On PO Status END    ######    -->


                <div class="my-2">
                    <label>Offer Ref No</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.offer_reference_no">
                </div>
                <div class="my-2">
                    <label>Offer Date</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.offer_date">
                </div>
                <div class="mt-2">
                    <label>Project Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.project_name">
                </div>
                <div class="mt-2">
                    <label>Client</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.client">
                </div>
                <div class="mt-2">
                    <label>POC Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.poc_name">
                </div>
                <div class="mt-2">
                    <label>POC Contact</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.poc_contact">
                </div>

                <div class="form-group">
                    <label class="block text-sm text-gray-00">Submit Type</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            v-model="projectOffer.submit_type">
                        <option value="Full"> Full</option>
                        <option value="Partial"> Partial</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="block text-sm text-gray-00">AMC</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.amc">
                        <option value="Yes"> Yes</option>
                        <option value="No"> No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="block text-sm text-gray-00">Sub Contract</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            v-model="projectOffer.sub_contract"
                            @change="updateSubContracted">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <!-- will be visible if sub-contract = yes -->
                <div>
                    <div class="mt-2">
                        <label>Sub Contracted To</label>
                        <input type="text" :disabled="subcontracted!=='Yes'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.sub_contracted_to">
                    </div>
                    <div class="mt-2">
                        <label>Sub Contracted Amount</label>
                        <input type="number" :disabled="subcontracted!=='Yes'"
                               class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.sub_contracted_amount">
                    </div>

                    <div class="mt-2">
                        <label>Sub Contracted Balance</label>
                        <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                               v-model="projectOffer.sub_contracted_balance">
                    </div>
                </div>
                <div class="mt-2">
                    <label>PO Amount + VAT</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.po_amount_with_vat">
                </div>
                <div class="mt-2">
                    <label>VAT</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.vat">
                </div>
                <div class="mt-2">
                    <label>AIT</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.ait">
                </div>
                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Update Project Offer
                </button>
            </form>
        </div>
    </div>
</template>
<script>
import TopBar from "../TopBar";

export default {
    components : {
        'top-bar' : TopBar
    },
    data() {
        return {
            projectOffer: {},
            statuses: {},
            addStatusMode: false,
            newStatus: null,
            poStatus: null,
            subcontracted: null,
            poFile: null,
        }
    },
    created() {
        this.axios
            .get(`http://po-management.test/api/projectOffers/edit/${this.$route.params.id}`)
            .then((response) => {
                this.projectOffer = response.data;
                this.poStatus = this.projectOffer.po_status;
                this.subcontracted = this.projectOffer.sub_contract;
                // console.log(response.data);
            });
        this.loadStatuses()
    },
    methods: {
        updateProjectOffer() {
            this.axios
                .post(`http://po-management.test/api/projectOffers/update/${this.$route.params.id}`, this.projectOffer)
                .then((response) => {
                    this.$router.push({name: 'home'});
                });
        },
        updatePoStatus() {
            this.poStatus = this.projectOffer.po_status;
        },
        updateSubContracted() {
            this.subcontracted = this.projectOffer.sub_contract;
        },
        loadStatuses() {
            this.axios
                .get(`http://po-management.test/api/projectOffers/projectStatus`)
                .then((response) => {
                    this.statuses = response.data;
                    // console.log(response.data);
                });
        },
        addNewStatus() {
            this.axios
                .post(`http://po-management.test/api/projectOffers/projectStatus/${this.newStatus}`)
                .then((response) => {
                    this.addStatusMode = false;
                    this.loadStatuses();
                    alert("New Status Added");
                });
        }
    }
}
</script>
<style>
input:disabled {
    background: rgba(98, 159, 234, 0.82);
}
</style>
