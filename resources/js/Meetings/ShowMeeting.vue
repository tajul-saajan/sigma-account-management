<template>
    <div class="flex-col  justify-center items-center">
        <top-bar home='allMeetings' add='addMeeting'></top-bar>
        <div class="flex items-center justify-center mt-2 px-4">
            <div class="flex-col justify-center items-center  bg-white w-2/3 rounded-lg shadow-xl">
                <div class="p-4 border-b flex-col justify-center items-center bg-gray-700 text-white mt-1 rounded-md">
                    <h2 class="text-2xl ">
                        Meeting Information
                    </h2>
                    <p class="text-sm">
                        Meeting details and Tasks
                    </p>
                </div>
                <div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Meeting Title
                        </p>
                        <p>
                            {{ meeting.title }}
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Date
                        </p>
                        <p>
                            {{meeting.date}}
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Objective
                        </p>
                        <p>
                            {{meeting.objective}}
                        </p>
                    </div>

                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Description
                        </p>
                        <p>
                            {{meeting.description}}
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                        <p class="text-gray-600">
                            Attendees
                        </p>
                        <div class="space-y-2">
                            <div class="flex-col items-center p-2 rounded justify-around">
                                <div v-for="user in meetingUsers" :key="user.id" class="space-x-2 truncate border-2 mb-1 p-2">
                                    <span class="fas fa-user inline text-gray-500">
                                    </span>
                                    <span>
                                        {{user.name}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ShowMeeting",
    data() {
        return{
            meeting: {},
            meetingUsers: [],
        }
    },
    created() {
        this.axios.get(process.env.MIX_PUBLISH_APP_URL + 'meetings/edit/'+this.$route.params.id)
            .then(response=>{
                this.meeting = response.data[0]
                this.meetingUsers = response.data[1]
            })
    }
}
</script>

<style scoped>

</style>
