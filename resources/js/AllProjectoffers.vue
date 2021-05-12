<template>
    <div class="flex-col justify-items-center">
        <h3 class="text-center text-2xl text-green-600">All Project Offers</h3><br/>

        <table class="mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">
            <thead class="bg-gray-50">
            <tr class="text-gray-600 text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">ID</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">PO</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Project Name</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Client Name</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Offer Ref No</th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 align-middle">
            <tr v-for="projectOffer in projectOffers" :key="projectOffer.id">
                <td class="px-6 py-4 text-center">{{ projectOffer.id }}</td>
                <td class="px-6 py-4 text-center">{{ projectOffer.po }}</td>
                <td class="px-6 py-4 text-center">{{ projectOffer.project_name }}</td>
                <td class="px-6 py-4 text-center">{{ projectOffer.client }}</td>
                <td class="px-6 py-4 text-center">{{ projectOffer.offer_reference_no }}</td>
                <td class="px-6 py-4 text-center flex justify-between">
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: projectOffer.id }}"
                                     class="bg-blue-500 m-2 p-2 text-white hover:shadow-2xl text-sm rounded-md">Edit
                        </router-link>
                        <button class="bg-red-500 m-2 p-2 text-white hover:shadow-2xl text-sm rounded-md"
                                @click="deleteBook(projectOffer.id)">Delete</button>
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
