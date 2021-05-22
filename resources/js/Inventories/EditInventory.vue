<template>
<div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateInventory" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Inventory</p>

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
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import TopBar from "./partials/TopBar";
export default {
    name: "EditInventory",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            inventory: {},
        }
    },
    created() {
        this.axios
            .get(`http://po-management.test/api/inventories/edit/${this.$route.params.id}`)
            .then((response) => {
                this.inventory = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateInventory() {
            this.axios
                .post(`http://po-management.test/api/inventories/update/${this.$route.params.id}`, this.inventory)
                .then((response) => {
                    this.$router.push({name: 'allInventories'});
                });
        }
    }
}
</script>

<style scoped>

</style>
