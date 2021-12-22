<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allTransactions' add='addTransaction'></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateTransaction" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Transaction</p>

                <div class="mt-2 bg-gray-200 p-2 rounded-md">
                    <label class=" mb-4 bg-gray-800 rounded-md text-white ">Transaction Type</label>
                    <div class="flex-col justify-center items-center">
                        <div>
                            <input type="radio" name="transactionType" value="cash in" id="cashIn" @click="clearCashCheque"
                                   v-model="transaction.transaction_type">
                            <label for="cashIn">Cash In</label>
                        </div>
                        <div>
                            <input type="radio" name="transactionType" value="cash out" id="cashOut" @click="clearCashCheque"
                                   v-model="transaction.transaction_type">
                            <label for="cashOut">Cash Out</label>
                        </div>
                    </div>
                </div>

                <div class="mt-2 bg-gray-200 p-2 rounded-md">
                    <label class="mb-4 bg-gray-800 rounded-md text-white">Cash/Cheque</label>
                    <div class="flex-col justify-center items-center">
                        <div>
                            <input type="radio" name="cashOrCheque" value="cash" id="cash" ref="cash"
                                   v-model="transaction.cash_or_check" @click="setSourcesAndDestinationsForCash($event)">
                            <label for="cash">Cash</label>
                        </div>
                        <div>
                            <input type="radio" name="cashOrCheque" value="cheque" id="cheque" ref="cheque"
                                   v-model="transaction.cash_or_check" @click="setSourcesAndDestinationsForCheque($event)">
                            <label for="cheque">Cheque</label>
                        </div>
                    </div>
                </div>


                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="transaction.description">
                </div>

                <div class="mt-2">
                    <label>Source</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            :disabled="(transaction.transaction_type!=='cash in')"

                            @change="setSourceName(transaction.source_id)"
                            v-model="transaction.source_id">
                        <option v-for="source in sources" :value="source.id"> {{ source.gl_name }}</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Destination</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            :disabled="transaction.transaction_type!=='cash out'"

                            @change="setDestinationName(transaction.destination_id)"
                            v-model="transaction.destination_id">
                        <option v-for="destination in destinations" :value="destination.id"> {{ destination.gl_name }}</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Reason</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="transaction.reason">
                </div>

                <div class="mt-2">
                    <label>Reference</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="transaction.reference">
                </div>

                <div class="mt-2">
                    <label>Attach Invoice</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Sub Project</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            @change="setSubProjectName(transaction.sub_project_id)"
                            v-model="transaction.sub_project_id">
                        <option v-for="subProject in subProjects" :value="subProject.id"> {{ subProject.name }}</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Amount</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="transaction.amount">
                </div>

                <div class="mt-2">
                    <label>Bank</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            :disabled="transaction.cash_or_check !=='cheque'"

                            @change="setBankName(transaction.bank_id)"
                            v-model="transaction.bank_id">
                        <option v-for="bank in banks" :value="bank.id"> {{ bank.gl_name }}</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Cheque no</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           :disabled="transaction.cash_or_check !=='cheque'"
                           v-model="transaction.cheque_no">
                </div>


                <div class="mt-2">
                    <label>Attach Cheque Image</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"
                           :disabled="transaction.cash_or_check !=='cheque'"
                    >
                </div>


                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>

export default {
    name: "EditTransaction",
    data() {
        return {
            transaction: {},
            type: {},
            invoice: null,
            cheque: null,
            subProjects: null,
            sources: null,
            destinations: null,
            banks: null,
        }
    },
    created() {
        //get transaction
        this.axios.get(process.env.MIX_PUBLISH_APP_URL + `transactions/edit/${this.$route.params.id}`)
            .then((response) => {
                this.transaction = response.data;
            });

        //get sub projects
        this.axios.get(process.env.MIX_PUBLISH_APP_URL + `subProjects/`)
            .then((response) => {
                this.subProjects = response.data;
            });
    },
    methods: {
        setSubProjectName(id) {
            let el = this.subProjects.map((item) => item.id).indexOf(id);
            this.transaction.sub_project_name = this.subProjects[el].name;
        },
        setBankName(id) {
            let el = this.banks.map((item) => item.id).indexOf(id);
            this.transaction.bank_name = this.banks[el].gl_name;
        },
        setSourceName(id){
            let el = this.sources.map((item) => item.id).indexOf(id);
            this.transaction.source_name = this.sources[el].gl_name;
        },
        setDestinationName(id){
            let el = this.destinations.map((item) => item.id).indexOf(id);
            this.transaction.destination_name = this.destinations[el].gl_name;
        },
        updateTransaction() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL + `transactions/update/${this.$route.params.id}`, this.transaction)
                .then((response) => {
                    this.$router.push({name: 'allTransactions'});
                });
        },
        //cash
        setSourcesAndDestinationsForCash($event) {
            console.log(this.transaction.transaction_type)
            if (this.transaction.transaction_type === undefined){
                alert("Please Select Transaction Types first")
                $event.target.checked=false
                console.log(this.transaction.cash_or_check)
            }
            else if (this.transaction.transaction_type === 'cash in') {
                //get sources for cash in cash credit
                this.axios.get(process.env.MIX_PUBLISH_APP_URL + `coas/allCashInCashCR`)
                    .then((response) => {
                        this.sources = response.data;
                        console.log(this.sources)
                    });
            }
            else if (this.transaction.transaction_type === 'cash out') {
                //get destinations for cash out cash credit
                this.axios.get(process.env.MIX_PUBLISH_APP_URL + `coas/allCashOutCashDB`)
                    .then((response) => {
                        this.destinations = response.data;
                        console.log(this.destinations)
                    });
            }
        },

        //cheque
        setSourcesAndDestinationsForCheque($event) {
            console.log(this.transaction.transaction_type)
            if (this.transaction.transaction_type === undefined){
                alert("Please Select Transaction Types first")
                $event.target.checked=false
            }
            else if (this.transaction.transaction_type === 'cash in') {
                //get sources for cash in cheque credit
                this.axios.get(process.env.MIX_PUBLISH_APP_URL + `coas/allCashInChequeCR`)
                    .then((response) => {
                        this.sources = response.data;
                        console.log(this.sources)
                    });

            }
            else if (this.transaction.transaction_type === 'cash out') {
                //get destinations for cash out cheque debit
                this.axios.get(process.env.MIX_PUBLISH_APP_URL + `coas/allCashOutChequeDB`)
                    .then((response) => {
                        this.destinations = response.data;
                        console.log(this.destinations)
                    });
            }

           //get banks
                this.axios.get(process.env.MIX_PUBLISH_APP_URL + `coas/allBanks`)
                    .then((response) => {
                        this.banks = response.data;
                        console.log(this.banks)
                    });
        },
        clearCashCheque(){
            this.$refs.cash.checked = false;
            this.$refs.cheque.checked = false;
        }

    }
}
</script>

<style scoped>

</style>
