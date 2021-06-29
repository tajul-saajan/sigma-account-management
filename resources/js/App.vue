<template>
    <div>
        <nav-bar></nav-bar>
        <router-view></router-view>
    </div>
</template>
<script>
import NavBar from "./NavBar";
export default {
    components: {
        'nav-bar' : NavBar
    }
}
</script>
<style>
</style>
