<template>
    <div class="leading-loose flex items-center justify-center col-md-6">
        <form @submit.prevent="addProjectOffer" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
            <p class="text-gray-800 font-bold text-center">Add Project Offer</p>

            <div class="form-group" >
                <label class="block text-sm text-gray-00">PO Status</label>
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.po_status">
                    <option value="PO Pending">PO Pending</option>
                    <option value="PO Received">PO Received</option>
                    <option value="eBill Submitted">eBill Submitted</option>
                    <option value="Hard Copy Submitted"> Hard Copy Submitted</option>
                    <option value="Money received"> Money received</option>
                </select>
            </div>

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
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.sub_contract" @change="updateSubContracted">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <!-- will be visible if sub-contract = yes -->
            <div v-if="subcontract === 'Yes' ">
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
                Add Project Offer
            </button>
        </form>

    </div>
</template>

<script>
export default {
    data() {
        return {
            projectOffer: {},
            subcontract: null
        }
    },
    methods: {
        addProjectOffer() {

            this.axios
                .post('http://po-management.test/api/projectOffers/add', this.projectOffer)
                .then(response => (
                    this.$router.push({name: 'home'})
                    // console.log(response.data)
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        },
        updateSubContracted(){
            this.subcontract = this.projectOffer.sub_contract;
        }

    }
}
</script>
