<template>
    <div class="flex-col  justify-center items-center">
        <div class="flex justify-center mt-4">
            <form @submit.prevent="login" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <label>Email</label>
                <input type="email" v-model="email" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                <label>Password</label>
                <input type="password" v-model="password" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">

                <button type="submit" class="mt-2 px-4 py-1 text-white justify-center font-light tracking-wider bg-gray-900 rounded">
                    Log In</button>
            </form>
        </div>
    </div>

</template>

<script>
export default {
    name: "LogIn",
    data() {
        return {
            email: null,
            password: null,
            user: null,
            access_token: null,
            role_names: [],
            role_ids: [],
        }
    },
    methods: {
        login() {
            this.$store
                .dispatch('login', {
                    email: this.email,
                    password: this.password
                })
                .then(() => {
                    this.$router.push({name: 'profile'})
                    location.reload()
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
}
</script>

<style scoped>

</style>
