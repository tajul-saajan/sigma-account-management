<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allHolidays' add='addHoliday' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addHoliday" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Holiday</p>

                <div class="mt-2">
                    <label>Date</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="holiday.date">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="holiday.description">
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
    name: "AddHoliday",
    data() {
        return {
            holiday: {},
        }
    },

    methods: {
        addHoliday() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`holidays/add`, this.holiday)
                .then((response) => {
                    this.$router.push({name: 'allHolidays'});
                });
        }
    }
}
</script>

<style scoped>

</style>
