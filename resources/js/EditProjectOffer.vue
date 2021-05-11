<template>
    <div>
        <h3 class="text-center">Edit Book</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateProjectOffer">
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
                    <button type="submit" class="btn btn-primary">Update Project Offer</button>
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
        created() {
            this.axios
                .get(`http://po-management.test/api/projectOffers/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.projectOffer = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateProjectOffer() {
                this.axios
                    .post(`http://po-management.test/api/projectOffers/update/${this.$route.params.id}`, this.projectOffer)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>
