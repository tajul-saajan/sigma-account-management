<template>
<div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateJournal" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Journal</p>

                <div class="mt-2">
                    <label>Transaction Date </label>
                    <input type="datetime-local" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.transaction_date">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.description">
                </div>

                <div class="mt-2">
                    <label>Debit Account</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setDebitAccountName(journal.debit_account_id)"
                           v-model="journal.debit_account_id" :disabled="true">
                        <option v-for="coa in chartOfAccounts"  :value="coa.id"> {{ coa.gl_name }}  </option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Credit Account</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setCreditAccountName(journal.credit_account_id)"
                           v-model="journal.credit_account_id" :disabled="true">
                        <option v-for="coa in chartOfAccounts" :value="coa.id"> {{coa.gl_name}} </option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Reference 1</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.reference_1">
                </div>

                <div class="mt-2">
                    <label>Reference 2</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.reference_2">
                </div>

                <div class="mt-2">
                    <label>Adjusted Entry</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.adjusted_entry">
                </div>

                <div class="mt-2">
                    <label>Sub Project</label>
                    <select  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setSubProjectName(journal.sub_project_id)"
                           v-model="journal.sub_project_id">
                        <option v-for="subProject in subProjects" :value="subProject.id"> {{ subProject.name }} </option>
                    </select>
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
            chartOfAccounts: null,
            subProjects: null,
        }
    },
    created() {
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL+`journals/edit/${this.$route.params.id}`)
            .then((response) => {
                this.journal = response.data;
                // console.log(response.data);
            });

        //get chart of accounts
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+`coas/`)
            .then((response)=>{
                this.chartOfAccounts = response.data.data;
                // console.log(this.chartOfAccounts)
            });

        //get sub projects
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+`subProjects/`)
            .then((response)=>{
                this.subProjects = response.data.data;
                // console.log(this.chartOfAccounts)
            });
    },
    methods: {
        updateJournal() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`journals/update/${this.$route.params.id}`, this.journal)
                .then((response) => {
                    this.$router.push({name: 'allJournals'});
                });
        },
        setDebitAccountName(id) {
            let el = this.chartOfAccounts.map((item)=>item.id).indexOf(id);
            this.journal.debit_account_name = this.chartOfAccounts[el].gl_name;
        },
        setCreditAccountName(id) {
            let el = this.chartOfAccounts.map((item)=>item.id).indexOf(id);
            this.journal.credit_account_name = this.chartOfAccounts[el].gl_name;
        },
        setSubProjectName(id) {
            let el = this.subProjects.map((item)=>item.id).indexOf(id);
            this.journal.sub_project_name = this.subProjects[el].name;
            console.log(this.journal)
        },
    }
}
</script>

<style scoped>

</style>
