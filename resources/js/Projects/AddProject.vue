<template>
<div class="flex-col  justify-center items-center">

        <top-bar></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addProject" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Project</p>

                <div class="mt-2">
                    <label>Project Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="project.name">
                </div>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="project.description">
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
    name: "AddProject",
    components: {
        'top-bar' : TopBar
    },
    data() {
        return {
            project: {},
        }
    },

    methods: {
        addProject() {
            this.axios
                .post(`http://po-management.test/api/projects/add`, this.project)
                .then((response) => {
                    this.$router.push({name: 'allProjects'});
                    console.log(response)
                });
        }
    }
}
</script>

<style scoped>

</style>
