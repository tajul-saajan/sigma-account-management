<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allRoles' add='addRole' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateRole" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Role</p>

                <div class="mt-2">
                    <label>Role Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="role.name">
                </div>

                <div class="mt-2">
                    <label>Selected</label>
                    <ul class="grid grid-cols-2 px-5 py-1 text-gray-700 bg-gray-200 border-black rounded">
                        <li v-for="item in selected" :key="item.id"
                            class="px-1 m-1 bg-green-100 flex justify-between content-center text-green-800">
                            {{item.name}}  <span class="fas fa-times text-red-400 p-1 ml-2 flex  items-center" @click="removeItem(item)"></span> </li>
                    </ul>
                </div>

                <div class="mt-2">
                    <label>Permissions</label>

                        <select  class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded h-screen" v-model="permission" multiple>
                            <option v-for="p in allPermissions" :key="p.id" :value="p.id"  @click="addToSelected(p)"
                            >{{p.name}}</option>
                        </select>

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
    name: "EditRole",
    data() {
        return {
            role: {},
            permission: [],
            allPermissions: null,
            permissions: null,
            selected:[],
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
                    this.allPermissions = response.data[1];
                    this.rolePermissions = response.data[2];
                    this.permissions = response.data[3];
                    this.permission = response.data[3];

                    console.log(this.permissions)

                    this.selected = this.allPermissions.filter((item)=>{
                        return this.permissions.includes(item.id)
                    })
                    console.log(this.selected)
                });
    },

    methods: {
        updateRole() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+'roles/update/'+this.$route.params.id,
                    {'name':this.role.name, 'permission':this.permission},{
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
        selectPermission(id){

        },


        addToSelected(p){
            if (!this.selected.includes(p))this.selected.push(p);
        },
        removeItem(item){
            let  el = this.selected.indexOf(item);
            this.selected.splice(el,1);

            let  index = this.permission.indexOf(item.id);
            this.permission.splice(index,1);
        }
    }
}
</script>

<style scoped>

</style>
