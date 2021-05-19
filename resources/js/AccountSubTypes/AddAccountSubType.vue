<template>
    <div class="flex-col  justify-center items-center">

        <top-bar></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addAccountSubType" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Account SubType</p>

                <div class="mt-2">
                    <label>Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="accountSubType.name">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="accountSubType.description">
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
    name: "AddAccountSubType",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            accountSubType: {},
        }
    },

    methods: {
        addAccountSubType() {
            this.axios
                .post(`http://po-management.test/api/accountSubTypes/add`, this.accountSubType)
                .then((response) => {
                    this.$router.push({name: 'allAccountSubTypes'});
                });
        }
    }
}
</script>

<style scoped>

</style>
