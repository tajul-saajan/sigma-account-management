<template>
    <div class="flex-col justify-center items-center">
        <top-bar></top-bar>

        <div class="flex justify-center mt-4">
            <table
                class="border-2 rounded-lg bg-white flex-col items-center justify-center"
            >
                <caption
                    class="text-white text-2xl bg-gray-600 p-4 font-bold text-center"
                >
                    All COAs
                </caption>
                <thead class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        GL Name
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Balance
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Sub Account
                    </th><th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 align-middle">
                <tr v-for="(chart, id) in charts" :key="id">
                    <td class="px-6 py-4 text-center">{{ chart.gl_name }}</td>
                    <td class="px-6 py-4 text-center">
                        {{ chart.balance }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ chart.account_subtype_name }}
                    </td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex" role="group">
                            <router-link :to="{name: 'editChart',params: { id: chart.id },}"
                                         class="text-blue-600 rounded-md m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteAccountSubType(chart.id)">
                            </span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>

import TopBar from "./partials/TopBar";

export default {
    name: "AllCharts",
    components: {
        "top-bar": TopBar,
    },
    data() {
        return {
            charts: {},
        };
    },
    created() {
        this.getResults();
    },
    methods: {
        deleteAccountSubType(id) {
            this.axios
                .delete(`http://po-management.test/api/coas/delete/${id}`)
                .then((response) => {
                    let i = this.charts.data.map((item) => item.id).indexOf(id); // find index of your object
                    this.charts.data.splice(i, 1);
                });
        },
        getResults(page) {
            if (typeof page === "undefined") {
                page = 1;
            }

            this.axios
                .get("http://po-management.test/api/coas")
                .then((response) => {
                    return response.data;

                })
                .then((data) => {
                    this.charts = data;
                    console.log(this.charts)
                });
        },
    },
}
</script>

<style scoped>

</style>
