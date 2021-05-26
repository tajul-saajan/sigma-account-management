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

                <div class="mt-2">
                    <label>Account Type</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setAccountTypeName(accountSubType.account_type_id)"
                            v-model="accountSubType.account_type_id">
                        <option v-for="accountType in accountTypes" :value="accountType.id"> {{ accountType.type }}
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
    name: "AddAccountSubType",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            accountSubType: {},
            accountTypes: null,
        }
    },

    created() {
        //get account types
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL+"accountTypes")
            .then((response) => {
                return response.data;
            })
            .then((data) => {
                this.accountTypes = data;
                console.log(data)
            });
    },

    methods: {
        addAccountSubType() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`accountSubTypes/add`, this.accountSubType)
                .then((response) => {
                    this.$router.push({name: 'allAccountSubTypes'});
                });
        },
        setAccountTypeName(id) {
            let el = this.accountTypes.map((item)=>item.id).indexOf(id);
            this.accountSubType.account_type_name = this.accountTypes[el].type;
        }
    }
}
</script>

<style scoped>

</style>
