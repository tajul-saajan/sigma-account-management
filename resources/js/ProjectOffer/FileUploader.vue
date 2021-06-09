<template>
    <div class="flex-col  justify-center items-center">

        <top-bar home='home' add='add' ></top-bar>

        <div class="flex justify-center mt-4">

            <form @submit.prevent="addPofile" enctype="multipart/form-data"
                  class="max-w-xl m-4 p-10 bg-white justify-center rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Upload PO File</p>
                <div class="my-2">
                    <label>Offer Ref No</label>
                    <input type="file" required class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           @change="selectFile">
                </div>

                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Add PO File
                </button>
            </form>
        </div>
    </div>
</template>

<script>

import TopBar from "../TopBar";

export default {
    name: "FileUploader",
    components: {
        'top-bar': TopBar
    },
    data() {
        return {
            file: null
        }
    },
    methods: {
        addPofile() {
            const dat = new FormData()
            dat.append('file', this.file)
            this.axios.post(`http://127.0.0.1:8000/api/projectOffers/handleFiles/${this.$route.params.id}`, dat)
                .then(response => {
                    this.$router.push({name: 'show', params: {id: this.$route.params.id}})
                })
        },
        selectFile(event) {
            this.file = event.target.files[0]
            console.log(this.file)
            if (!this.file) {
                event.preventDefault();
                alert('No file chosen');
            }
        }
    }
}
</script>

<style scoped>

</style>
