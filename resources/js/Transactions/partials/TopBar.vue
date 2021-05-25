<template>
<div class="flex justify-around mt-4">
        <router-link :to="{name:'allTransactions'}" class="p-2 bg-gray-700 text-white rounded-md">Home</router-link>
        <router-link :to="{name: 'addTransaction'}" class="p-2 bg-gray-700 text-white rounded-md">Add Transaction
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
