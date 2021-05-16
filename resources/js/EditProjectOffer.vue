<template>
    <div class="leading-loose flex items-center justify-center col-md-6">
        <form @submit.prevent="updateProjectOffer" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
            <p class="text-gray-800 font-bold text-center">Add Project Offer</p>
            <div class="form-group">
                <label class="block text-sm text-gray-00">PO Status</label>
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.po_status"
                        @change="updatePoStatus">
                    <option value="PO Pending">PO Pending</option>
                    <option value="PO Received">PO Received</option>
                    <option value="eBill Submitted">eBill Submitted</option>
                    <option value="Hard Copy Submitted"> Hard Copy Submitted</option>
                    <option value="Money received"> Money received</option>
                </select>
            </div>

            <!--  ******  Fields Based On PO Status START    ******    -->

            <!--     PO Received     -->
            <div v-if="poStatus==='PO Received'">
                <div class="my-2">
                    <label>PO No</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.po">
                </div>
                <div class="my-2">
                    <label>PO Date</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.po_date">
                </div>

            </div>


            <!--     eBill Submitted     -->
            <div v-if="poStatus==='eBill Submitted'">
                <div class="my-2">
                    <label>eBill Submission Date</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.ebill_submission_date">
                </div>
                <div class="my-2">
                    <label>Mushok NO</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.mushok_no">
                </div>

                <div class="my-2">
                    <label>Tracking NO</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.tracking_no_robi">
                </div>

            </div>

            <!--     Hard Copy Submitted     -->
            <div v-if="poStatus==='Hard Copy Submitted'">
                <div class="my-2">
                    <label>Hard Copy Submission Date</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.hard_copy_submission_date">
                </div>

                <!-- room for file upload -->

            </div>

            <!--     Money Received     -->
            <div v-if="poStatus==='Money received'">
                <div class="my-2">
                    <label>Money Receive Date</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.money_received_date">
                </div>
                <div class="my-2">
                    <label>Received Amount</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
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
                <label>POC</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                       v-model="projectOffer.poc">
            </div>
            <div class="form-group">
                <label class="block text-sm text-gray-00">Submit Type</label>
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.submit_type">
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
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.sub_contract"
                        @change="updateSubContracted">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <!-- will be visible if sub-contract = yes -->
            <div v-if="subcontracted === 'Yes'">
                <div class="mt-2">
                    <label>Sub Contracted To</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="projectOffer.sub_contracted_to">
                </div>
                <div class="mt-2">
                    <label>Sub Contracted Amount</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
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
</template>
<script>
export default {
    data() {
        return {
            projectOffer: {},
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
        }
    }
}
</script>
