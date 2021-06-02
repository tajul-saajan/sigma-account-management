<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allRoles' add='addRole' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addRole" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Role</p>

                <div class="mt-2">
                    <label>Role Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="role.name">
                </div>

                <div class="mt-2">
                    <label>Permissions</label>

                        <select  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded h-screen" v-model="permission" multiple>
                            <option v-for="p in permissions" :key="p.id" :value="p.id"  :selected="selectPermission(p.id)" >{{p.name}}</option>
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
    name: "EditRole",
    data() {
        return {
            role: {},
            permission: [],
            permissions: null,
            rolePermissions: null,
        }
    },
    created() {
        this.axios
                .get(process.env.MIX_PUBLISH_APP_URL+`roles/edit/`+this.$route.params.id, {
                    headers:{
                        'Authorization': localStorage.getItem('token')
                    }
                })
                .then((response) => {
                    this.role = response.data[0];
                    this.permissions = response.data[1];
                    this.rolePermissions = response.data[2];

                    console.log(this.role)
                    console.log(this.permissions)
                    console.log(this.rolePermissions)
                });
    },

    methods: {
        addRole() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`roles/add`, {'name':this.role, 'permission':this.permission},{
                    headers:{
                        'Authorization': localStorage.getItem('token')
                    }
                })
                .then((response) => {
                    this.$router.push({name: 'allRoles'});
                }).catch(err=>{
                    console.log(err)
            });
        },
        selectPermission(pid){
            return this.rolePermissions.filter(id=>{id===pid}) !== null;
        }
    }
}
</script>

<style scoped>

</style>
