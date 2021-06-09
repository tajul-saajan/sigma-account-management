<template>
    <div class="flex justify-around mt-4">
        <router-link :to="{name: home}" class="p-2 bg-gray-700 text-white rounded-md">Home</router-link>
        <router-link :to="{name: add }" class="p-2 bg-gray-700 text-white rounded-md">Add </router-link>
    </div>
</template>

<script>
export default {
    name: "TopBar",
    props:{
        home:String,
        add: String
    }
}
</script>


<style scoped>

</style>
