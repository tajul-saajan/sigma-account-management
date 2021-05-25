<template>
<div class="flex-col  justify-center items-center">

        <top-bar></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addAccountSubType" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Item</p>

                <div class="mt-2">
                    <label>Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="item.name">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="item.description">
                </div>

                <div class="mt-2">
                    <label>Col1</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="item.col1">
                </div>

                <div class="mt-2">
                    <label>Col2</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="item.col2">
                </div>

                <div class="mt-2">
                    <label>Col3</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="item.col3">
                </div>

                <div class="mt-2">
                    <label>Balance</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="item.balance">
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
    name: "AddItem",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            item: {},
            accountTypes: null,
        }
    },

    methods: {
        addAccountSubType() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`items/add`, this.item)
                .then((response) => {
                    this.$router.push({name: 'allItems'});
                });
        },
    }
}
</script>

<style scoped>

</style>
