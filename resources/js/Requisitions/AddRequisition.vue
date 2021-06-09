<template>
    <div class="flex-col  justify-center items-center">
        <top-bar home='allRequisitions' add='addRequisition' ></top-bar>
        <div class="flex justify-center mt-4">

            <form @submit.prevent="addRequisition" method="post" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                <p class="text-gray-800 font-bold text-center">Add Requisition</p>

                <div class="mt-2">
                    <label>Description</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="requisition.description">
                </div>

                <div class="mt-2">
                    <label>Reason</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                           v-model="requisition.reason" >
                </div>

                <div class="mt-2">
                    <label>Comment</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            v-model="requisition.comment">
                </div>

                <div class="mt-2">
                    <label>Reference</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            v-model="requisition.reference">
                </div>


                <div class="mt-2">
                    <label>Attachment</label>
                    <input type="file" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"
                            @change="setAttachment" >
                </div>

                <div class="mt-2">
                    <label>Amount</label>
                    <input type="text" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            v-model="requisition.amount">
                </div>

                <button type="submit" class="mt-2 px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                    Add
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddRequisition",
    data(){
        return {
            requisition : {},
            attachment: null
        }
    },
    created() {

    },
    methods: {
        addRequisition(){
            const data = new FormData()
            if (this.attachment) data.append('attachment', this.attachment)
            const json = JSON.stringify(this.requisition)
            data.append('requisition',json)

            console.log(this.fromPage)

            this.axios
                .post(process.env.MIX_PUBLISH_APP_URL+`requisitions/add`, data)
                .then((response) => {
                    let next;
                    next = (this.$route.params.from === 'Profile')?'profile': 'allRequisitions'
                    this.$router.push({name: next});
                });
        },
        setAttachment(event){
            this.attachment = event.target.files[0];
            if (!this.attachment){
                event.preventDefault()
                alert('No file Chosen')
            }
        }
    }

}
</script>

<style scoped>

</style>
