<template>
<div class="flex justify-around mt-4">
        <router-link :to="{name:'allRequisitions'}" class="p-2 bg-gray-700 text-white rounded-md">Home</router-link>
        <router-link :to="{name: 'addRequisition'}" class="p-2 bg-gray-700 text-white rounded-md">Add Requisition
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
