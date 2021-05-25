<template>
<div class="flex-col  justify-center items-center">

        <top-bar></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addChart" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add COA</p>

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
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setSubProjectName(chart.account_sub_type_id)"
                           v-model="chart.account_sub_type_id">
                        <option v-for="subAccount in subAccounts"  :value="subAccount.id"> {{subAccount.name}} </option>
                    </select>
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
    name: "AddChart",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            chart: {},
            subAccounts : {},
        }
    },
    created() {
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+`accountSubTypes/all`)
            .then((response)=>{
                return response.data;
            })
            .then( (data)=>{
                this.subAccounts = data;
            })
    },

    methods: {
        addChart() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`coas/add`, this.chart)
                .then((response) => {
                    this.$router.push({name: 'allCharts'});
                });
        },
        setSubProjectName(id){
            let el = this.subAccounts.map((item)=>item.id).indexOf(id);
            this.chart.account_subtype_name = this.subAccounts[el].name;
        }
    }
}
</script>

<style scoped>

</style>
