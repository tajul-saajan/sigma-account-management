<template>
    <div class="flex flex-wrap m-6">
        <div class="w-full">
            <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal"
                       v-on:click="toggleTabs(1)"
                       v-bind:class="{'text-gray-600 bg-white': openTab !== 1, 'text-white bg-gray-600': openTab === 1}">
                        Profile
                    </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal"
                       v-on:click="toggleTabs(2)"
                       v-bind:class="{'text-gray-600 bg-white': openTab !== 2, 'text-white bg-gray-600': openTab === 2}">
                        Leaves
                    </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal"
                       v-on:click="toggleTabs(3)"
                       v-bind:class="{'text-gray-600 bg-white': openTab !== 3, 'text-white bg-gray-600': openTab === 3}">
                        Requisitions
                    </a>
                </li>
            </ul>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="px-4 py-5 flex-auto">
                    <div class="tab-content tab-space">
                        <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">
                            <p>
                                <profile-tab></profile-tab>
                            </p>
                        </div>
                        <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">
                            <p>
                                <leave-tab></leave-tab>
                            </p>
                        </div>
                        <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
                            <p>
                                <requisition-tab></requisition-tab>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProfilePage from "./ProfilePage";
import LeaveList from "./LeaveList";
import RequisitionList from "./RequisitionList";

export default {
    name: "Tabs",
    components:{
        'profile-tab':ProfilePage,
        'leave-tab':LeaveList,
        'requisition-tab':RequisitionList,
    },
    data() {
        return {
            openTab: 1,
        }
    },
    methods: {
        toggleTabs: function (tabNumber) {
            this.openTab = tabNumber
        }
    }
}
</script>

<style scoped>

</style>
