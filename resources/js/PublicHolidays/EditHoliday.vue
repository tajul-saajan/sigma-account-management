<template>
<div class="flex-col  justify-center items-center">

        <top-bar home='allHolidays' add='addHoliday' ></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateHoliday" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Holiday</p>

                <div class="mt-2">
                    <label>Date</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="holiday.date">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="holiday.description">
                </div>

                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import TopBar from "../TopBar";

export default {
    name: "EditHoliday",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            holiday: {},
        }
    },
    created() {
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL+`holidays/edit/${this.$route.params.id}`)
            .then((response) => {
                this.holiday = response.data;
            });
    },
    methods: {
        updateHoliday() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`holidays/update/${this.$route.params.id}`, this.holiday)
                .then((response) => {
                    this.$router.push({name: 'allHolidays'});
                });
        }
    }
}
</script>

<style scoped>

</style>
