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
                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" @change="setProjectName(subProject.main_project_id)"
                           v-model.number="subProject.main_project_id">
                        <option v-for="project in projects" :value="project.id"> {{ project.name }} </option>
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
            projects: null,
        }
    },
    created() {
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL+`subProjects/edit/${this.$route.params.id}`)
            .then((response) => {
                this.subProject = response.data;
                // console.log(response.data);
            });

        //get projects
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL+"projects")
            .then((response) => {
                return response.data.data;
            })
            .then((data) => {
                this.projects = data;
                console.log(data)
            });
    },
    methods: {
        updateSubProject() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`subProjects/update/${this.$route.params.id}`, this.subProject)
                .then((response) => {
                    this.$router.push({name: 'allSubProjects'});
                });
        },
        setProjectName(id) {
            let el = this.projects.map((item)=>item.id).indexOf(id);
            this.subProject.main_project_name = this.projects[el].name;
        }
    }
}
</script>

<style scoped>

</style>
