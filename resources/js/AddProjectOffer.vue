<template>
    <div>
        <h3 class="text-center">Add Project Offer</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProjectOffer">
                    <div class="form-group">
                        <label>PO</label>
                        <input type="text" class="form-control" v-model="projectOffer.po">
                    </div>
                    <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" class="form-control" v-model="projectOffer.project_name">
                    </div>
                    <div class="form-group">
                        <label>Client</label>
                        <input type="text" class="form-control" v-model="projectOffer.client">
                    </div>
                    <div class="form-group">
                        <label>Offer Ref No</label>
                        <input type="text" class="form-control" v-model="projectOffer.offer_reference_no">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Project Offer</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                projectOffer: {}
            }
        },
        methods: {
            addProjectOffer() {

                this.axios
                    .post('http://po-management.test/api/projectOffers/add', this.projectOffer)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
