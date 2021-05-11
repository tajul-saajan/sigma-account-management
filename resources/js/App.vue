<template xmlns="http://www.w3.org/1999/html">
    <div class="flex justify-center h-screen">
        <div class="container content-center">
            <div class="text-center" style="margin: 20px 0 20px 0;">
                <span class="text-secondary text-3xl text-center">Sigma Solutions Project Offers Dashboard</span>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse">
                    <div class="flex justify-between">
                        <router-link to="/" class="p-4 bg-green-700 text-white rounded-md">Home</router-link>
                        <router-link to="/add" class="p-4 bg-green-700 text-white rounded-md">Add Project Offer
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
