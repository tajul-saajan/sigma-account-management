<template>
    <div class="flex-col  justify-center items-center">

        <top-bar home='allSubProjects' add='addSubProjects' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="updateProject" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Sub Project</p>

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
                    Add
                </button>
            </form>
        </div>
    </div>
</template>

<script>


export default {
    name: "AddSubProjects",

    data() {
        return {
            subProject: {},
            projects: null,
        }
    },

    created() {
        //get projects
        this.axios
            .get(process.env.MIX_PUBLISH_APP_URL +"projects")
            .then((response) => {
                return response.data;
            })
            .then((data) => {
                this.projects = data;
                console.log(data)
            });
    },

    methods: {
        updateProject() {
            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`subProjects/add`, this.subProject)
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
