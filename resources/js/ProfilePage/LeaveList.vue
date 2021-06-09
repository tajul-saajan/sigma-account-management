<template>
    <div>
    <div class="flex justify-center mt-4">
        <router-link class="text-center text-white bg-gray-600  py-2 px-6"
            :to="{name:'addApplication', params: {from: 'Profile'}}"
        >Add</router-link>
    </div>
    <div class="flex justify-center mt-4">
        <v-table class="border-2 rounded-lg bg-white flex-col items-center justify-center"
                 :data="applications"
                 :currentPage.sync="currentPage"
                 :pageSize="5"
                 @totalPagesChanged="totalPages = $event"

        >
            <caption slot="head" class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">My Applications
            </caption>
            <thead slot="head" class="bg-gray-200">
            <tr class="text-gray-600 text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Type</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">From</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">To</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Days</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">DOA</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Dependency</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Endorsed</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Endorsed By</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Approved</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Approved By</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Applied By</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Applied At</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Actions</th>
            </tr>
            </thead>
            <tbody slot="body" slot-scope="{displayData}" class="divide-y divide-gray-200 align-middle">
            <tr v-for="(application) in displayData" :key="application.id">
                <td class="px-6 py-4 text-center">{{ application.leave_type }}</td>
                <td class="px-6 py-4 text-center">{{ application.from_date }}</td>
                <td class="px-6 py-4 text-center">{{ application.to_date }}</td>
                <td class="px-6 py-4 text-center">{{ application.no_of_days }}</td>
                <td class="px-6 py-4 text-center">{{ application.delegation_of_authority }}</td>
                <td class="px-6 py-4 text-center">{{ application.dependency }}</td>
                <td class="px-6 py-4 text-center">{{ application.endorsed }}</td>
                <td class="px-6 py-4 text-center">{{ application.endorsed_by }}</td>
                <td class="px-6 py-4 text-center">{{ application.approved }}</td>
                <td class="px-6 py-4 text-center">{{ application.approved_by }}</td>
                <td class="px-6 py-4 text-center">{{ application.applied_by }}</td>
                <td class="px-6 py-4 text-center">{{ application.applied_at }}</td>
                <td class="px-6 py-4 text-center flex justify-between">
                    <div class="flex " role="group">
                        <router-link :to="{name: 'editApplication', params: { id: application.id ,from: 'Profile'}}"
                                     class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                        </router-link>
                        <span
                            class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                            @click="deleteApplication(application.id)">
                            </span>

                    </div>
                </td>
            </tr>
            </tbody>
        </v-table>
        <smart-pagination class="flex justify-center  items-center text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                          :currentPage.sync="currentPage"
                          :totalPages="totalPages"
        />
    </div>
        </div>
</template>

<script>
export default {
    name: "LeaveList",
    data() {
        return {
            applications: [],
            currentPage: 1,
            totalPages: 0,
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteApplication(id) {
            this.axios
                .delete(process.env.MIX_PUBLISH_APP_URL + `applications/delete/${id}`)
                .then(response => {
                    let i = this.applications.map(item => item.id).indexOf(id); // find index of your object
                    this.applications.splice(i, 1)
                });
        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get(process.env.MIX_PUBLISH_APP_URL + 'auth/leaves?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.applications = data;
            });
        },
    },
}
</script>

<style scoped>

</style>
