<template>
    <div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateSubProject" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Sub Project</p>

                <div class="mt-2">
                    <label>Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="subProject.name">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="subProject.description">
                </div>

                <div class="mt-2">
                    <label>Project</label>
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model.number="subProject.main_project">
                        <option value="1">Sigma Solutions</option>
                        <option value="2">Pixmama</option>
                    </select>
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
    name: "EditSubProjects",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            subProject: {},
        }
    },
    created() {
        this.axios
            .get(`http://po-management.test/api/subProjects/edit/${this.$route.params.id}`)
            .then((response) => {
                this.subProject = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateSubProject() {
            this.axios
                .post(`http://po-management.test/api/subProjects/update/${this.$route.params.id}`, this.subProject)
                .then((response) => {
                    this.$router.push({name: 'allSubProjects'});
                });
        }
    }
}
</script>

<style scoped>

</style>
