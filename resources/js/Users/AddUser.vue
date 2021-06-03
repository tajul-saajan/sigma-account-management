<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allUsers' add='addUser' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addUser" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add User</p>

                <div class="mt-2">
                    <label>Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="user.name">
                </div>

                <div class="mt-2">
                    <label>Email</label>
                    <input type="email" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="user.email">
                </div>


                <div class="mt-2">
                    <label>Role</label>

                        <select  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" v-model="user.roles">
                            <option v-for="role in allRoles" :key="role.id" :value="role.id">{{role.name}}</option>
                        </select>

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
    name: "AddUser",
    data() {
        return {
            user: {},
            allRoles: [],
        }
    },
    created() {
        this.axios
                .get(process.env.MIX_PUBLISH_APP_URL+`roles/`, {
                    headers:{
                        'Authorization': localStorage.getItem('token')
                    }
                })
                .then((response) => {
                    this.allRoles = response.data;
                    console.log(response.data)
                });
    },

    methods: {
        addUser() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`register`, this.user,{
                    headers:{
                        'Authorization': localStorage.getItem('token')
                    }
                })
                .then((response) => {
                    this.$router.push({name: 'allUsers'});
                }).catch(err=>{
                    console.log(err)
            });
        }
    }
}
</script>

<style scoped>

</style>
