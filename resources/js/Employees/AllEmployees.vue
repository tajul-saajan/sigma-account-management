<template>
<div class="flex-col  justify-center items-center">
    <top-bar></top-bar>
</div>
</template>

<script>
import TopBar from "./partials/TopBar";
export default {
    name: "AllEmployees",
    components:{
        'top-bar':TopBar
    }
}
</script>

<style scoped>

</style>
