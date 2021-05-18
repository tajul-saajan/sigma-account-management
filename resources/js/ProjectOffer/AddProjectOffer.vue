<template>
    <div class="flex-col  justify-center items-center">
        <div class="flex justify-around mt-4">
            <router-link to="/" class="p-2 bg-gray-700 text-white rounded-md">Home</router-link>
            <router-link to="/add" class="p-2 bg-gray-700 text-white rounded-md">Add Project Offer</router-link>
        </div>
        <div class="flex justify-center mt-4">
            <form @submit.prevent="addProjectOffer" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 mb-2 text-center text-2xl">Add Project Offer</p>
                <div class="form-group">
                    <label class="block text-sm text-gray-00">PO Status</label>
                    <div class="flex items-center">
                        <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                                :disabled="addStatusMode===true"
                                v-model="projectOffer.po_status">
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
                    <input type="tel" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
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

    </div>
</template>

<script>
export default {
    data() {
        return {
            projectOffer: {},
            statuses: {},
            addStatusMode: false,
            newStatus: null,
            subcontract: null
        }
    },
    created() {
        this.loadStatuses()
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
        updateSubContracted() {
            this.subcontract = this.projectOffer.sub_contract;
        },
        loadStatuses() {
            this.axios
                .get(`http://po-management.test/api/projectOffers/projectStatus`)
                .then((response) => {
                    this.statuses = response.data;
                    // console.log(response.data);
                });
        }
        ,
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
select:disabled {
    background: rgba(98, 159, 234, 0.82);
}
</style>
