<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allInventories' add='addInventory' ></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="addInventory" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Inventory</p>

                <div class="mt-2">
                    <label>Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="inventory.name">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="inventory.description">
                </div>

                <div class="mt-2">
                    <label>Location</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="inventory.location">
                </div>

                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Add
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import TopBar from "../TopBar";
export default {
    name: "AddInventory",
    components: {
        'top-bar' : TopBar
    },
    data() {
        return {
            inventory: {},
        }
    },

    methods: {
        addInventory() {
            this.axios
                .post(`http://po-management.test/api/inventories/add`, this.inventory) //todo send all api call to config file
                .then((response) => {
                    this.$router.push({name: 'allInventories'});
                });
        }
    }
}
</script>

<style scoped>

</style>
