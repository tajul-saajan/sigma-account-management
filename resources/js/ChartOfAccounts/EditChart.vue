<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allCharts' add='addChart' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateChart" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit COA</p>

                <div class="mt-2">
                    <label>GL Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="chart.gl_name">
                </div>

                <div class="mt-2">
                    <label>Balance</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="chart.balance">
                </div>

                <div class="mt-2">
                    <label>Sub Account</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setSubAccount(chart.account_sub_type_id)"
                           v-model="chart.account_sub_type_id">Select Sub Account
                        <option v-for="subAccount in subAccounts"  :value="subAccount.id"> {{subAccount.name}} </option>
                    </select>
                </div>

                <div class="mt-2 bg-gray-200 p-2 rounded-md">
                    <label class=" mb-4 bg-gray-800 rounded-md text-white ">For Transaction</label>
                    <div class="flex-col justify-center items-center">
                        <div>
                            <input type="checkbox" name="cashInCashCredit" class="" id="cashInCashCredit" v-model="chart.cash_in_cash_credit">
                            <label for="cashInCashCredit">Cash-In Cash Credit</label>
                        </div>
                        <div>
                            <input type="checkbox" name="cashOutCashDebit" class="" id="cashOutCashDebit" v-model="chart.cash_out_cash_debit">
                            <label for="cashOutCashDebit">Cash Out Cash Debit</label>
                        </div>


                        <div>
                            <input type="checkbox" name="cashInChequeDebit" class="" id="cashInChequeDebit" v-model="chart.cash_in_cheque_credit">
                            <label for="cashInChequeDebit">Cash-In Cheque Credit</label>
                        </div>
                        <div>
                            <input type="checkbox" name="cashOutChequeDebit" class="" id="cashOutChequeDebit" v-model="chart.cash_in_cheque_debit">
                            <label for="cashOutChequeDebit">Cash-In Cheque Debit</label>
                        </div>

                        <div>
                            <input type="checkbox" name="cashOutCashCredit" class="" id="cashOutCashCredit" v-model="chart.cash_out_cheque_debit">
                            <label for="cashOutCashCredit">Cash Out Cheque Debit</label>
                        </div>
                        <div>
                            <input type="checkbox" name="cashOutChequeCredit" class="" id="cashOutChequeCredit" v-model="chart.cash_out_cheque_credit">
                            <label for="cashOutChequeCredit">Cash Out Cheque Credit</label>
                        </div>

                    </div>
                </div>

                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>

import TopBar from "../TopBar";

export default {
    name: "EditChart",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            chart: {},
            subAccounts : {},
            selectedSubAccount : null
        }
    },
    created() {
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL+`coas/edit/${this.$route.params.id}`)
            .then((response) => {
                this.chart = response.data;
                this.selectedSubAccount = this.chart.account_subtype_name
                // console.log(response.data);
            });

        // get sub projects
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+`accountSubTypes/all`)
            .then((response)=>{
                return response.data;
            })
            .then( (data)=>{
                this.subAccounts = data;
            })
    },
    methods: {
        updateChart() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`coas/update/${this.$route.params.id}`, this.chart)
                .then((response) => {
                    this.$router.push({name: 'allCharts'});
                });
        },
        setSubAccount(id){
            let el  = this.subAccounts.map((item)=>item.id).indexOf(id);
            this.chart.account_subtype_name = this.subAccounts[el].type;
        }
    }
}
</script>

<style scoped>

</style>
