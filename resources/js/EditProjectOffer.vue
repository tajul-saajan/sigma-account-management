<template>
    <div class="leading-loose flex items-center justify-center col-md-6">
        <form @submit.prevent="updateProjectOffer" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
            <p class="text-gray-800 font-bold text-center">Edit Project Offer</p>

            <div class="form-group">
                <label class="block text-sm text-gray-00">PO</label>
                <input type="text"  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                       v-model="projectOffer.po">
            </div>

            <div class="mt-2">
                <label>PO Status</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.po_status">
            </div>

            <div class="mt-2">
                <label>Submit Type</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.submit_type"> //todo column name change in migration
            </div>

            <div class="mt-2">
                <label>AMC Type</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.amc_type">
            </div>

            <div class="mt-2">
                <label>Sub Contract</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.sub_contract">
            </div>

            <div class="mt-2">
                <label>Sub Contracted To</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.po_status">
            </div>

            <div class="mt-2">
                <label>Project Name</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.project_name">
            </div>
            <div class="form-group">
                <label>Client</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.client">
            </div>
            <div class="form-group">
                <label>Offer Ref No</label>
                <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="projectOffer.offer_reference_no">
            </div>

            <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                Update Project Offer</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            projectOffer: {}
        }
    },
    created() {
        this.axios
            .get(`http://po-management.test/api/projectOffers/edit/${this.$route.params.id}`)
            .then((response) => {
                this.projectOffer = response.data;
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
        }
    }
}
</script>
