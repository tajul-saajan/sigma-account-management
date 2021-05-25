<template>
<div class="flex-col  justify-center items-center">
        <top-bar></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Employee</p>

                <div class="mt-2">
                    <label>Name</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Designation</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Departmant</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Unit</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Job Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Date of Birth</label>
                    <input type="date" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Specialization</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Mobile</label>
                    <input type="number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>


                <div class="mt-2">
                    <label>NID</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Image</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>email</label>
                    <input type="email" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                </div>

                <div class="mt-2">
                    <label>Type</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
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
    name: "AddEmployee",
    components:{
        'top-bar':TopBar
    }
}
</script>

<style scoped>

</style>
