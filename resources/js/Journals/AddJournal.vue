<template>
    <div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="addJournal" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Journal</p>

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
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" required
                            @change="setDebitAccountName(journal.debit_account_id)"
                            v-model.number="journal.debit_account_id">
                        <option v-for="coa in debitAccounts" :value="coa.id"> {{ coa.gl_name }}</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Credit Account</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" required
                            @change="setCreditAccountName(journal.credit_account_id)"
                            v-model.number="journal.credit_account_id">
                        <option v-for="coa in creditAccounts" :value="coa.id"> {{ coa.gl_name }}</option>
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
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            @change="setSubProjectName(journal.sub_project_id)"
                            v-model="journal.sub_project_id">
                        <option v-for="subProject in subProjects" :value="subProject.id"> {{ subProject.name }}</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Amount</label>
                    <input type="number" required class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.amount">
                </div>

                <div class="mt-2">
                    <label>Invoice No.</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="journal.invoice_no">
                </div>


                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Add
                </button>
            </form>
        </div>
    </div>
</template>

<script>

import TopBar from "./partials/TopBar";

export default {
    name: "AddJournal",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            journal: {},
            debitAccounts: [],
            creditAccounts: [],
            subProjects: null,
        }
    },
    created() {
        //get debit accounts
        this.axios.get(`http://po-management.test/api/coas/debitAccounts`)
            .then((response) => {
                this.debitAccounts = response.data;
            }).catch((error) => {
            console.log(error)
        });

         //get credit accounts
        this.axios.get(`http://po-management.test/api/coas/creditAccounts`)
            .then((response) => {
                this.creditAccounts = response.data;

            }).catch((error) => {
            console.log(error)
        });

        //get sub projects
        this.axios.get(`http://po-management.test/api/subProjects/`)
            .then((response) => {
                this.subProjects = response.data.data;
            });
    },

    methods: {
        addJournal() {
            this.axios
                .post(`http://po-management.test/api/journals/add`, this.journal)
                .then((response) => {
                    console.log(response.status)
                    this.$router.push({name: 'allJournals'});
                }).catch(error => {
                console.log(error.response.status)
                alert('Please Select correct Debit and Credit account')
            });
        },
        setDebitAccountName(id) {
            console.log((this.debitAccounts))
            console.log(this.subProjects)
            let el = this.debitAccounts.map((item) => item.id).indexOf(id);
            this.journal.debit_account_name = this.debitAccounts[el].gl_name;
        },
        setCreditAccountName(id) {
            console.log(typeof(this.creditAccounts))
            let el = this.creditAccounts.map((item) => item.id).indexOf(id);
            this.journal.credit_account_name = this.creditAccounts[el].gl_name;
        },
        setSubProjectName(id) {
            let el = this.subProjects.map((item) => item.id).indexOf(id);
            this.journal.sub_project_name = this.subProjects[el].name;
        }

    }
}
</script>

<style scoped>

</style>
