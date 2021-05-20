<template>
    <div class="flex-col  justify-center items-center">

        <top-bar></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateProject" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Edit Project</p>

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
                    Update
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import TopBar from "./partials/TopBar";

export default {
    name: "EditProject",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            project: {},
        }
    },
    created() {
        this.axios
            .get(`http://po-management.test/api/projects/edit/${this.$route.params.id}`)
            .then((response) => {
                this.project = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateProject() {
            this.axios
                .post(`http://po-management.test/api/projects/update/${this.$route.params.id}`, this.project)
                .then((response) => {
                    this.$router.push({name: 'allProjects'});
                });
        }
    }
}
</script>

<style scoped>

</style>
