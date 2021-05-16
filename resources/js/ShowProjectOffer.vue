<template>
    <div class="grid grid-cols-2 gap-4">
        <div class="p-4 bg-gray-200 border-black rounded-md shadow-lg">
            <div class="flex justify-between mb-2">
                <span> Client </span>
                <span> {{ projectOffer.client }} </span>
            </div>

            <div class="flex justify-between my-2">
                <span> PO Status </span>
                <span> {{ projectOffer.po_status }} </span>
            </div>

            <div class="flex justify-between mt-2">
                <span> Submit Type </span>
                <span> {{ projectOffer.submit_type }} </span>
            </div>
        </div>

        <div class="p-4 bg-gray-200 border-black rounded-md shadow-lg flex-row justify-between">
            <div class="flex justify-between mb-2">
                <span> PO </span>
                <span> {{ projectOffer.po }} </span>
            </div>

            <div class="flex justify-between my-2">
                <span> POC </span>
                <span> {{ projectOffer.poc }} </span>
            </div>

            <div class="flex justify-between my-2">
                <span> PO Date </span>
                <span> {{ projectOffer.po_date }} </span>
            </div>

            <div class="flex justify-between mt-2">
                <span> Offer Date </span>
                <span> {{ projectOffer.offer_date }} </span>
            </div>
        </div>

        <div class="p-4 bg-gray-200 border-black rounded-md shadow-lg flex-row justify-between">
            <div class="flex justify-between mb-2">
                <span> Sub Contracted To </span>
                <span> {{ projectOffer.sub_contracted_to }} </span>
            </div>

            <div class="flex justify-between my-2">
                <span> Sub Contract Amount </span>
                <span> {{ projectOffer.sub_contracted_amount }} </span>
            </div>

            <div class="flex justify-between mt-2">
                <span> Sub Contract Balance </span>
                <span> {{ projectOffer.sub_contracted_balance }} </span>
            </div>

        </div>

        <div class="p-4 bg-gray-200 border-black rounded-md shadow-lg flex-row justify-between">
            <div class="flex justify-between mb-2">
                <span> PO Amount + VAT </span>
                <span> {{ projectOffer.po_amount_with_vat }} </span>
            </div>

            <div class="flex justify-between my-2">
                <span> Received Amount </span>
                <span> {{ projectOffer.received_amount }} </span>
            </div>

            <div class="flex justify-between my-2 ">
                <span> VAT </span>
                <span> {{ projectOffer.vat }} </span>
            </div>

            <div class="flex justify-between my-2">
                <span> AIT </span>
                <span> {{ projectOffer.ait }} </span>
            </div>

            <div class="flex justify-between mt-2">
                <span> Mushok No </span>
                <span> {{ projectOffer.mushok_no }} </span>
            </div>
        </div>

        <div class="p-4 bg-gray-200 border-black rounded-md shadow-lg col-span-2 flex-row justify-between">
            <div class="flex justify-between mb-2">
                <span> eBill Submission Date </span>
                <span> {{ projectOffer.ebill_submission_date }} </span>
            </div>

            <div class="flex justify-between my-2">
                <span> Hard Copy Submission Date </span>
                <span> {{ projectOffer.hard_copy_submission_date }} </span>
            </div>

            <div class="flex justify-between mt-2">
                <span> Money Receive Date </span>
                <span> {{ projectOffer.money_received_date }} </span>
            </div>
        </div>

        <div class="p-4 col-span-2 flex-row justify-between">
            <div class="flex justify-center text-white">
                <router-link :to="{name: 'edit', params: { id: projectOffer.id }}"
                             class="fas fa-pen px-4 py-2  bg-gray-500 hover:bg-blue-500  mr-2 rounded-md"> Edit
                </router-link>
                <span class="fas fa-trash px-4 py-2 bg-gray-500 hover:bg-red-500 ml-2 rounded-md"
                      @click="deleteBook(projectOffer.id)"> Delete</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ShowProjectOffer",
    data() {
        return {
            projectOffer: {},
        }
    },
    created() {
        this.axios.get(`http://po-management.test/api/projectOffers/edit/${this.$route.params.id}`)
            .then((response) => {
                this.projectOffer = response.data;
            })
    },
    deleteBook(id) {
        this.axios
            .delete(`http://po-management.test/api/projectOffers/delete/${id}`)
            .then(response => {
                let i = this.projectOffers.map(item => item.id).indexOf(id); // find index of your object
                this.projectOffers.splice(i, 1)
            });
    },
}
</script>

<style scoped>

</style>
