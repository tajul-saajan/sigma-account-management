<template>
<div class="flex-col  justify-center items-center">
    <top-bar home="allEmployees" add="addEmployee"></top-bar>
    <div class="flex justify-center mt-4">
            <v-table class="border-2 rounded-lg bg-white flex-col items-center justify-center"
                     :data="employees"
                     :currentPage.sync="currentPage"
                     :pageSize="5"
                     @totalPagesChanged="totalPages = $event"

            >
                <caption slot="head" class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Employees
                </caption>
                <thead slot="head" class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Designation</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Department</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Unit</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">JD</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">DOB</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Specialization</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Mobile</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Email</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Type</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Account No</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Bank</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Address</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Leave Balance</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Action</th>
                </tr>
                </thead>
                <tbody slot="body" slot-scope="{displayData}" class="divide-y divide-gray-200 align-middle">
                <tr v-for="(employee) in displayData" :key="employee.id">
                    <td class="px-6 py-4 text-center">{{ employee.name }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.designation }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.department }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.unit }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.job_description }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.date_of_birth }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.specialization }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.mobile }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.email }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.type }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.account_no }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.bank }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.address }}</td>
                    <td class="px-6 py-4 text-center">{{ employee.leave_balance }}</td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex " role="group">
                            <router-link :to="{name: 'editEmployee', params: { id: employee.id }}"
                                         class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteEmployee(employee.id)">
                            </span>

                        </div>
                    </td>
                </tr>
                </tbody>
            </v-table>
        </div>
        <smart-pagination class="flex justify-center  items-center text-2xl m-2 p-4 bg-gray-200 rounded-lg"
                          :currentPage.sync="currentPage"
                          :totalPages="totalPages"
        />
</div>
</template>

<script>

export default {
    name: "AllEmployees",
    data() {
        return {
            employees: [],
            currentPage: 1,
            totalPages: 0,
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteEmployee(id) {
            this.axios
                .delete(process.env.MIX_PUBLISH_APP_URL + `employees/delete/${id}`)
                .then(response => {
                    let i = this.employees.map(item => item.id).indexOf(id); // find index of your object
                    this.employees.splice(i, 1)
                });
        },
        showProjectOffer() {

        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get(process.env.MIX_PUBLISH_APP_URL + 'employees?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.employees = data;
            });
        }
    }

}
</script>

<style scoped>

</style>
