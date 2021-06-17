<template>
<div class="flex-col  justify-center items-center">
        <top-bar home='allMeetings' add='addMeeting' ></top-bar>
        <div class="flex justify-center mt-4">
            <v-table class="border-2 rounded-lg bg-white flex-col items-center justify-center"
                     :data="meetings"
                     :currentPage.sync="currentPage"
                     :pageSize="5"
                     @totalPagesChanged="totalPages = $event"

            >
                <caption slot="head" class="text-white text-2xl bg-gray-600 p-4 font-bold text-center">All Meetings</caption>
                <thead slot="head" class="bg-gray-200">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Title</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Date</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Objective</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Description</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Action</th>
                </tr>
                </thead>
                <tbody slot="body" slot-scope="{displayData}" class="divide-y divide-gray-200 align-middle">
                <tr v-for="(meeting) in displayData" :key="meeting.id">
                    <td class="px-6 py-4 text-center">{{ meeting.title }}</td>
                    <td class="px-6 py-4 text-center">{{ meeting.date }}</td>
                    <td class="px-6 py-4 text-center">{{ meeting.objective }}</td>
                    <td class="px-6 py-4 text-center">{{ meeting.description }}</td>
                    <td class="px-6 py-4 text-center flex justify-between">
                        <div class="flex " role="group">
                            <router-link :to="{name: 'editMeeting', params: { id: meeting.id }}"
                                         class="text-blue-600 rounded-md  m-2 p-2 fas fa-pen hover:bg-blue-600 hover:text-white">
                            </router-link>
                            <span
                                class="m-2 p-2 rounded-md fas fa-trash-restore text-red-500 hover:bg-red-600 hover:text-white"
                                @click="deleteMeeting(meeting.id)">
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
    name: "AllMeetings",
    data() {
        return {
            meetings: [],
            currentPage: 1,
            totalPages: 0,
        }
    },
    created() {
        this.getResults()
    },
    methods: {
        deleteMeeting(id) {
            this.axios
                .delete(process.env.MIX_PUBLISH_APP_URL + `meetings/delete/${id}`)
                .then(response => {
                    let i = this.meetings.map(item => item.id).indexOf(id); // find index of your object
                    this.meetings.splice(i, 1)
                });
        },
        showProjectOffer() {

        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            this.axios.get(process.env.MIX_PUBLISH_APP_URL + 'meetings?page=' + page)
                .then(response => {
                    return response.data;
                }).then(data => {
                this.meetings = data;
            });
        }
    }
}
</script>

<style scoped>

</style>
