<template>
<div class="flex justify-around mt-4">
        <router-link :to="{name:'allJournals'}" class="p-2 bg-gray-700 text-white rounded-md">Home</router-link>
        <router-link :to="{name: 'addJournal'}" class="p-2 bg-gray-700 text-white rounded-md">Add Journal
        </router-link>
    </div>
</template>

<script>
export default {
    name: "TopBar"
}
</script>

<style scoped>

</style>
