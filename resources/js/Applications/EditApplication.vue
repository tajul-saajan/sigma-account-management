<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allApplications' add='addApplication' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateApplication" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Application</p>

                <div class="mt-2">
                    <label>Type</label>
                    <select type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="application.leave_type">
                        <option v-for="type in leaveTypes" :key="type.id" :value="type.name"> {{type.name}} </option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>From</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="application.from_date">
                </div>

                <div class="mt-2">
                    <label>To</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="application.to_date">
                </div>

                <div class="mt-2">
                    <label>No of Days</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model.number="application.no_of_days">
                </div>

                <div class="mt-2">
                    <label>Delegation of Authority</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model.number="application.delegation_of_authority">
                        <option v-for="doa in employees" :key="doa.id"
                                :value="doa.name"> {{ doa.name }} </option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Dependency</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="application.dependency">
                </div>

                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditApplication",
    data() {
        return {
            application: {},
            leaveTypes: null,
            employees: null,
        }
    },

    created() {
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+"applications/edit/"+this.$route.params.id)
            .then((response)=>{
                this.application = response.data;
            })


        //get types
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL +"applications/leaveTypes")
            .then((response) => {
                this.leaveTypes = response.data;
            })
        //get employees
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+"employees")
            .then((response)=>{
                this.employees = response.data
            })

    },

    methods: {
        updateApplication() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`applications/update/`+this.$route.params.id, this.application)
                .then((response) => {
                    this.$router.push({name: 'allApplications'});
                });
        },
    }
}
</script>

<style scoped>

</style>
