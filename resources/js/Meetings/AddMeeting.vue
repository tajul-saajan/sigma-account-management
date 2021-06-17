<template>
<div class="flex-col  justify-center items-center">
        <top-bar home='allMeetings' add='addMeeting' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addMeeting" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Meeting</p>

                <div class="mt-2">
                    <label>Title</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="meeting.title">
                </div>

                <div class="mt-2">
                    <label>Date</label>
                    <input type="datetime-local" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="meeting.date">
                </div>

                <div class="mt-2">
                    <label>Objective</label>
                    <input  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="meeting.objective">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="meeting.description">
                </div>

                    <div class="mt-2">
                        <label>Attendee</label>
                        <div  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded my-4  p-4">
                            <span v-for="user in users" :key="user.id" :value="user.id" @click="addAttendee(user)"
                                  class="p-0.5 bg-green-600 text-white mx-2 rounded-md" > {{user.name}} </span>
                        </div>
                    </div>

                    <div class="mt-2" v-if="selectedUsers.length>0">
                        <label>Selected</label>
                        <div  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded my-4 p-4" >
                            <span v-for="user in selectedUsers" :key="user.id" :value="user.id"
                                  class="p-1 bg-green-700 text-white m-2 rounded-md inline-block" > {{user.name}}
                                <span class="fas fa-times text-red-500 px-1" @click="removeAttendee(user)"></span>
                            </span>

                        </div>
                    </div>


                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Add
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddMeeting",
    data() {
        return {
            meeting: {},
            selectedUsers: [],
            selectedUserIds: [],
            users:null,
        }
    },
    created() {
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+'users')
            .then(response=>{
                this.users = response.data
            }).catch(error=>{
                console.log(error)
        })
    },
    methods: {
        addMeeting() {
            let userIds = this.getSelectedIds()
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`meetings/add`, [this.meeting,userIds])
                .then((response) => {
                    this.$router.push({name: 'allMeetings'});
                });
        },
        addAttendee(user){
            if (this.selectedUsers.includes(user)) alert("Attendee already added")
            else{
                this.selectedUsers.push(user)
                let index = this.users.indexOf(user)
                this.users.splice(index,1)
            }
        },
        removeAttendee(user){
            let index = this.selectedUsers.indexOf(user)
            this.selectedUsers.splice(index,1)
            this.users.push(user)
        },
        getSelectedIds(){
            let ids = this.selectedUsers.map(item=>{item.id})
            return ids
        }
    }
}
</script>

<style scoped>

</style>
