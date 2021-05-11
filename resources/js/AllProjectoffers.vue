<template>
    <div class="flex-col justify-items-center">
        <h3 class="text-center text-2xl text-green-600">All Project Offers</h3><br/>

        <table class="border-separate border-green-800 border justify-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>PO</th>
                <th>Project Name</th>
                <th>Client Name</th>
                <th>Offer Ref No</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="projectOffer in projectOffers" :key="projectOffer.id">
                <td>{{ projectOffer.id }}</td>
                <td>{{ projectOffer.po }}</td>
                <td>{{ projectOffer.project_name }}</td>
                <td>{{ projectOffer.client }}</td>
                <td>{{ projectOffer.offer_reference_no }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: projectOffer.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteBook(projectOffer.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            projectOffers: []
        }
    },
    created() {
        this.axios
            .get('http://po-management.test/api/projectOffers')
            .then(response => {
                this.projectOffers = response.data;
            });
    },
    methods: {
        deleteBook(id) {
            this.axios
                .delete(`http://po-management.test/api/projectOffers/delete/${id}`)
                .then(response => {
                    let i = this.projectOffers.map(item => item.id).indexOf(id); // find index of your object
                    this.projectOffers.splice(i, 1)
                });
        }
    }
}
</script>
