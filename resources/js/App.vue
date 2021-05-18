<template>
    <div>
        <nav-bar></nav-bar>
        <router-view></router-view>
    </div>
</template>

<script>

import NavBar from "./ProjectOffer/NavBar";

export default {
    components: {
        'nav-bar' : NavBar
    }
}
</script>
