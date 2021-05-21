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
          All Account Sub Types
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
              Actions
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 align-middle">
          <tr v-for="(accountSubType, id) in accountSubTypes.data" :key="id">
            <td class="px-6 py-4 text-center">{{ accountSubType.name }}</td>
            <td class="px-6 py-4 text-center">
              {{ accountSubType.description }}
            </td>
            <td class="px-6 py-4 text-center flex justify-between">
              <div class="flex" role="group">
                <router-link
                  :to="{
                    name: 'editAccountSubTypes',
                    params: { id: accountSubType.id },
                  }"
                  class="text-blue-600 rounded-md m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white"
                >
                </router-link>
                <span
                  class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                  @click="deleteAccountSubType(accountSubType.id)"
                >
                </span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <pagination
      class="flex justify-evenly text-2xl m-2 p-4 bg-gray-200 rounded-lg"
      :data="accountSubTypes"
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
  name: "AllAccountSubTypes",
  components: {
    "top-bar": TopBar,
  },
  data() {
    return {
      accountSubTypes: {},
    };
  },
  created() {
    this.getResults();
  },
  methods: {
    deleteAccountSubType(id) {
      this.axios
        .delete(`http://po-management.test/api/accountSubTypes/delete/${id}`)
        .then((response) => {
          let i = this.accountSubTypes.data.map((item) => item.id).indexOf(id); // find index of your object
          this.accountSubTypes.data.splice(i, 1);
        });
    },
    getResults(page) {
      if (typeof page === "undefined") {
        page = 1;
      }

      this.axios
        .get("http://po-management.test/api/accountSubTypes?page=" + page)
        .then((response) => {
          return response.data;
        })
        .then((data) => {
          this.accountSubTypes = data;
        });
    },
  },
};
</script>

<style scoped>
</style>
