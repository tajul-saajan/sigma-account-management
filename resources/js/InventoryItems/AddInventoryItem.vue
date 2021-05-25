<template>
<div class="flex-col  justify-center items-center">

        <top-bar></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addInventoryItem" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Inventory Item</p>

                <div class="mt-2">
                    <label>Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="inventoryItem.item_name">
                </div>

                <div class="mt-2">
                    <label>Balance</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="inventoryItem.balance">
                </div>

                <div class="mt-2">
                    <label>Inventory</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setInventoryName(inventoryItem.inventory_id)"
                            v-model="inventoryItem.inventory_id">
                        <option v-for="inventory in inventories" :value="inventory.id"> {{ inventory.name }}
                        </option>
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
import TopBar from "./partials/TopBar";
export default {
    name: "AddInventoryItem",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            inventoryItem: {},
            inventories: null,
        }
    },

    created() {
        //get account types
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL+"inventories")
            .then((response) => {
                return response.data.data;
            })
            .then((data) => {
                this.inventories = data;
            });
    },

    methods: {
        addInventoryItem() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`inventoryItems/add`, this.inventoryItem)
                .then((response) => {
                    this.$router.push({name: 'allInventoryItems'});
                });
        },
        setInventoryName(id) {
            let el = this.inventories.map((item)=>item.id).indexOf(id);
            this.inventoryItem.inventory_name = this.inventories[el].name;
        }
    }
}
</script>

<style scoped>

</style>
