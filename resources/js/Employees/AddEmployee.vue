<template>
    <div class="flex-col  justify-center items-center">
        <top-bar home="allEmployees" add="addEmployee"></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addEmployee" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Employee</p>

                <div class="mt-2">
                    <label>Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.name">
                </div>

                <div class="mt-2">
                    <label>Designation</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.designation">
                </div>

                <div class="mt-2">
                    <label>Department</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.department">
                </div>

                <div class="mt-2">
                    <label>Unit</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.unit">
                </div>

                <div class="mt-2">
                    <label>Job Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.job_description">
                </div>

                <div class="mt-2">
                    <label>Date of Birth</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.date_of_birth">
                </div>

                <div class="mt-2">
                    <label>Specialization</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.specialization">
                </div>

                <div class="mt-2">
                    <label>Mobile</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.mobile">
                </div>


                <div class="mt-2">
                    <label>NID</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"
                           @change="setNid">
                </div>

                <div class="mt-2">
                    <label>Image</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"
                            @change="setImage">
                </div>

                <div class="mt-2">
                    <label>email</label>
                    <input type="email" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.email">
                </div>

                <div class="mt-2">
                    <label>Type</label>
                    <select type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.type">
                        <option v-for="type in employee_types" :key="type.id" :value="type.name" > {{type.name}}</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Account No</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.account_no">
                </div>

                <div class="mt-2">
                    <label>Bank</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.bank">
                </div>

                <div class="mt-2">
                    <label>Address</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="employee.address">
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
    name: "AddEmployee",
    data() {
        return {
            employee: {},
            employee_types: null,
            nid_file: null,
            image_file: null,
        }
    },
    created() {
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+'employees/types')
            .then((response)=>{
                this.employee_types = response.data
            })
    },
    methods: {
        setNid(event) {
            this.nid_file = event.target.files[0]
            if (!this.nid_file) {
                event.preventDefault()
                alert('No files selected')
            }
        },
        setImage(event) {
            this.image_file = event.target.files[0]
            if (!this.image_file) {
                event.preventDefault()
                alert('No files selected')
            }
        },
        addEmployee(){
            const data = new  FormData()
            data.append('nid',this.nid_file)
            data.append('image',this.image_file)
            const json =  JSON.stringify(this.employee)
            data.append('employee', json)

            this.axios.post(process.env.MIX_PUBLISH_APP_URL+'employees/add',data)
                .then((response)=>{
                    this.$router.push({name:'allEmployees'})
                })
        }
    }

}
</script>

<style scoped>

</style>
