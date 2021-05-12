<template xmlns="http://www.w3.org/1999/html">
    <div class="flex items-start justify-center h-screen mx-auto max-w-4xl w-full">
        <div class="container content-center">
            <div class="text-center my-12 p-8 rounded-md shadow-lg bg-gray-300">
                <span class="text-secondary text-4xl text-center">Sigma Solutions Project Offers Dashboard</span>
            </div>

            <nav class="">
                <div class="items-center">
                    <div class="flex justify-between">
                        <router-link to="/" class="p-2 bg-green-700 text-white rounded-md">Home</router-link>
                        <router-link to="/add" class="p-2 bg-green-700 text-white rounded-md">Add Project Offer
                        </router-link>
                    </div>
                </div>
            </nav>
            <br/>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {}
</script>
