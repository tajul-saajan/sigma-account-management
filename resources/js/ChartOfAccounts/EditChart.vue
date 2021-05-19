<template>
<div class="flex-col  justify-center items-center">

        <top-bar></top-bar>
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
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setSubAccount"
                           v-model="selectedSubAccount">Select Sub Account
                        <option v-for="subAccount in subAccounts"  :value="subAccount"> {{subAccount.name}} </option>
                    </select>
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
            .get(`http://po-management.test/api/coas/edit/${this.$route.params.id}`)
            .then((response) => {
                this.chart = response.data;
                this.selectedSubAccount = this.chart.account_subtype_name
                // console.log(response.data);
            });

        // get sub projects
        this.axios.get(`http://po-management.test/api/accountSubTypes/all`)
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
                .post(`http://po-management.test/api/coas/update/${this.$route.params.id}`, this.chart)
                .then((response) => {
                    this.$router.push({name: 'allCharts'});
                });
        },
        setSubAccount(){
            this.chart.account_subtype_id = this.selectedSubAccount.id;
            this.chart.account_subtype_name = this.selectedSubAccount.name;
        }
    }
}
</script>

<style scoped>

</style>
