<template>
    <div class="flex-col  justify-center items-center">

        <top-bar home='allAccountTypes' add='addAccountTypes' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addAccountType" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Account Type</p>

                <div class="mt-2">
                    <label>Account Type</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="accountType.type">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="accountType.description">
                </div>

                <div class="mt-2">
                    <label>Account Classification</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="accountType.classification">
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
    name: "AddAccountType",
    components: {
        'top-bar' : TopBar
    },
    data() {
        return {
            accountType: {},
        }
    },

    methods: {
        addAccountType() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`accountTypes/add`, this.accountType)
                .then((response) => {
                    this.$router.push({name: 'allAccountTypes'});
                });
        }
    }
}
</script>

<style scoped>

</style>
