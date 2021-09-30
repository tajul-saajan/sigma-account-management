<template>
    <div class="flex items-center justify-center mt-2 px-4">
        <div class="flex-col justify-center items-center  bg-white w-2/3 rounded-lg shadow-xl">
            <div class="p-4 border-b flex-col justify-center items-center bg-gray-700 text-white mt-1 rounded-md">
                <div class=" flex justify-between">
                    <p class="text-2xl">Tasks Information</p>
                    <button class="py-1 px-2.5 bg-gray-500 rounded-md">Add</button>
                </div>
            </div>
            <div>
                <v-table
                    :data="tasks"
                    :currentPage.sync="currentPage"
                    :pageSize="5"
                    @totalPagesChanged="totalPages = $event">
                    <thead slot="head" class="bg-gray-200">
                    <tr>
                        <th class="font-semibold text-sm uppercase px-9 py-3 text-center">Name</th>
                        <th class="font-semibold text-sm uppercase px-9 py-3 text-center">Description</th>
                        <th class="font-semibold text-sm uppercase px-9 py-3 text-center">Challenges</th>
                        <th class="font-semibold text-sm uppercase px-9 py-3 text-center">Dependency</th>
                        <th class="font-semibold text-sm uppercase px-9 py-3 text-center">Accountable</th>
                        <th class="font-semibold text-sm uppercase px-9 py-3 text-center">Responsible</th>
                        <th class="font-semibold text-sm uppercase px-9 py-3 text-center">Target Date</th>
                        <th class="font-semibold text-sm uppercase px-9 py-3 text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody slot="body" slot-scope="{displayData}">

                    <!-- form inputs -->



                    <tr v-for="task in displayData" :key="task.id">
                        <td class="text-center">{{ task.name }}</td>
                        <td class="text-center">{{ task.description }}</td>
                        <td class="text-center">{{ task.challenges }}</td>
                        <td class="text-center">{{ task.dependency }}</td>
                        <td class="text-center">{{ task.accountable }}</td>
                        <td class="text-center">{{ task.responsible }}</td>
                        <td class="text-center">{{ task.target_date }}</td>
                        <td class="text-center">{{ task.status }}</td>
                    </tr>
                    </tbody>
                </v-table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Tasks",
    props: {
        tasks: Array,
    },
    data() {
        return {
            currentPage: 0,
            meetingUsers: {}
        }
    }
}
</script>

<style scoped>

</style>
