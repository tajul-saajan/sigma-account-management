<template>
<div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateJournal" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Journal</p>

                <div class="mt-2">
                    <label>Transaction Date </label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.transaction_date">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.description">
                </div>

                <div class="mt-2">
                    <label>Debit Account</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.debit_account">
                </div>

                <div class="mt-2">
                    <label>Credit Account</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.credit_account">
                </div>

                <div class="mt-2">
                    <label>Refrence</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.reference">
                </div>

                <div class="mt-2">
                    <label>Adjusted Entry</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.adjusted_entry">
                </div>

                <div class="mt-2">
                    <label>Sub Project</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.sub_project">
                </div>

                <div class="mt-2">
                    <label>Amount</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.amount">
                </div>

                <div class="mt-2">
                    <label>Invoice No.</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.invoice_no">
                </div>


                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>

import TopBar from "./partials/TopBar";

export default {
    name: "EditJournal",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            journal: {},
        }
    },
    created() {
        this.axios
            .get(`http://po-management.test/api/journals/edit/${this.$route.params.id}`)
            .then((response) => {
                this.journal = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateJournal() {
            this.axios
                .post(`http://po-management.test/api/journals/update/${this.$route.params.id}`, this.journal)
                .then((response) => {
                    this.$router.push({name: 'allJournals'});
                });
        }
    }
}
</script>

<style scoped>

</style>
