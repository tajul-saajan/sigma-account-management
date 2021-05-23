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
                    All Items
                </caption>
                <thead class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Name
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Description
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Col1
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Col2
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Col3
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Balance
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 align-middle">
                <tr v-for="(item, id) in items.data" :key="id">
                    <td class="px-6 py-4 text-center">{{ item.name }}</td>
                    <td class="px-6 py-4 text-center">
                        {{ item.description }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ item.col1 }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ item.col2 }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ item.col3 }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ item.balance }}
                    </td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex" role="group">
                            <router-link :to="{name: 'editItem',params: { id: item.id}}"
                                class="text-blue-600 rounded-md m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteItem(item.id)">
                            </span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <pagination
            class="flex justify-evenly text-2xl m-2 p-4 bg-gray-200 rounded-lg"
            :data="items"
            @pagination-change-page="getResults"
        >
      <span slot="prev-nav">
        <span class="fas fa-arrow-circle-left"></span>
        <span>Previous</span>
      </span>
            <span slot="next-nav">
        <span>Next</span>
        <span class="fas fa-arrow-circle-right"></span>
      </span>
        </pagination>
    </div>
</template>

<script>
import TopBar from "./partials/TopBar";
export default {
    name: "AllItems",
    components: {
        "top-bar": TopBar,
    },
    data() {
        return {
            items: {},
        };
    },
    created() {
        this.getResults();
    },
    methods: {
        deleteItem(id) {
            this.axios
                .delete(`http://po-management.test/api/items/delete/${id}`)
                .then((response) => {
                    let i = this.items.data.map((item) => item.id).indexOf(id); // find index of your object
                    this.items.data.splice(i, 1);
                });
        },
        getResults(page) {
            if (typeof page === "undefined") {
                page = 1;
            }

            this.axios
                .get("http://po-management.test/api/items?page=" + page)
                .then((response) => {
                    return response.data;
                })
                .then((data) => {
                    this.items = data;
                });
        },
    },
}
</script>

<style scoped>

</style>
