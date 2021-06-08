<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allRoles' add='addRole' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addRole" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Role</p>

                <div class="mt-2">
                    <label>Role Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="role">
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
                            <option @click="addToSelected(p)" v-for="p in permissions" :key="p.id" :value="p.id">{{p.name}}</option>
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
    name: "AddRole",
    data() {
        return {
            role: null,
            permission: [],
            selected: [],
            permissions: null,
        }
    },
    created() {
        this.axios
                .get(process.env.MIX_PUBLISH_APP_URL+`roles/permissions`, {
                    headers:{
                        'Authorization': localStorage.getItem('token')
                    }
                })
                .then((response) => {
                    this.permissions = response.data;
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
        addToSelected(p){
            if (!this.selected.includes(p))this.selected.push(p);
            // if (!this.permission.includes(p))this.permission.push(p.id);
        },
        removeItem(item){
            let  el = this.selected.indexOf(item);
            this.selected.splice(el,1);

            let  index = this.permissions.indexOf(item.id);
            this.permissions.splice(index,1);
        }
    }
}
</script>

<style scoped>

</style>
