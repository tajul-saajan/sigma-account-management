<template>
    <div class="flex-col  justify-center items-center">

        <top-bar home='allTransactions' add='addTransaction' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Transaction</p>

                <div class="mt-2 bg-gray-200 p-2 rounded-md">
                    <label class=" mb-4 bg-gray-800 rounded-md text-white ">Transaction Type</label>
                    <div class="flex-col justify-center items-center">
                        <div>
                            <input type="radio" name="transactionType" class="" id="cashIn">
                            <label for="cashIn">Cash In</label>
                        </div>
                        <div>
                            <input type="radio" name="transactionType" class="" id="cashOut">
                            <label for="cashOut">Cash Out</label>
                        </div>
                    </div>
                </div>

                <div class="mt-2 bg-gray-200 p-2 rounded-md">
                    <label class="mb-4 bg-gray-800 rounded-md text-white">Type</label>
                    <div class="flex-col justify-center items-center">
                        <div>
                            <input type="radio" name="cashOrCheque" class="" id="cash">
                            <label for="cash">Cash</label>
                        </div>
                        <div>
                            <input type="radio" name="cashOrCheque" class="" id="cheque">
                            <label for="cheque">Cheque</label>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <label>Type</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Source</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Reference1</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Reference2</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Attach Invoice</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Sub Project</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            @change="setSubProjectName(transaction.sub_project_id)"
                            v-model="transaction.sub_project_id">
                        <option v-for="subProject in subProjects" :value="subProject.id"> {{ subProject.name }}</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label>Amount</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Cheque no</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Bank</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Attach Cheque Image</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
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
    name: "AddTransaction",
    data(){
        return {
            transaction: {},
            subProjects: null,
        }
    },
    created() {
        //get sub projects
        this.axios.get(process.env.MIX_PUBLISH_APP_URL+`subProjects/`)
            .then((response) => {
                this.subProjects = response.data.data;
            });
    },
    methods: {
        setSubProjectName(id) {
            let el = this.subProjects.map((item) => item.id).indexOf(id);
            this.transaction.sub_project_name = this.subProjects[el].name;
        }
    }
}
</script>

<style scoped>

</style>
