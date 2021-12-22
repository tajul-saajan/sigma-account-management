<template>
    <nav class="flex items-center justify-between flex-wrap bg-gray-600 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
  xmlns="http://www.w3.org/2000/svg">
                <path
 d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/>
            </svg>
            <span class="font-semibold text-xl tracking-tight">Sigma Solutions</span>
        </div>
        <div class="block lg:hidden">
            <button
 class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>
                    Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow" v-if="isLoggedIn">
                <router-link
 class="block mt-4 p-2 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  to="/" v-if="hasPermission('purchase-offer-access')">
                    Project Status
  </router-link>
                <drop-down :links="accountLinks" v-if="hasPermission('account-type-access')"
  class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4">
                    Accounts
  </drop-down>
                <drop-down :links="projectLinks" v-if="hasPermission('project-access')"
  class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4">
                    Projects
  </drop-down>
                <drop-down :links="inventoryLinks" v-if="hasPermission('inventory-access')"
  class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4">
                    Inventory
  </drop-down>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allItems'}" v-if="hasPermission('item-access')">
                    Items
  </router-link>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allTransactions'}" v-if="hasPermission('transaction-access')">
                    Transactions
  </router-link>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allRequisitions'}" v-if="hasPermission('requisition-access')">
                    Requisitions
  </router-link>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allEmployees'}" v-if="hasPermission('employee-access')">
                    Employees
  </router-link>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allApplications'}" v-if="hasPermission('application-access')">
                    Leaves
  </router-link>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allHolidays'}" v-if="hasPermission('holiday-access')">
                    Holidays
  </router-link>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allRoles'}" v-if="hasPermission('role-access')">
                    Roles
  </router-link>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allUsers'}" v-if="hasPermission('role-access')">
                    Users
  </router-link>
                <router-link
 class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4 hover:bg-gray-500"
  :to="{name: 'allMeetings'}" >
                    Meetings
  </router-link>
            </div>
            <div>
                <router-link v-if="!isLoggedIn"
  class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0"
  :to="{name: 'login'}">
                    Log In
  </router-link>
                <div v-else>
                    <router-link :to="{'name': 'profile'}"
  class="inline-block text-sm px-4 py-2 leading-none border rounded text-white
 border-white hover:border-transparent hover:text-teal-500 hover:bg-gray-500 mt-4 lg:mt-0"  >
                        {{ getUser }}
  </router-link>
                    <button
 class="inline-block text-sm px-4 py-2 leading-none border rounded text-white
 border-white hover:border-transparent hover:text-teal-500 hover:bg-gray-500 mt-4 lg:mt-0"  @click="logout">
                        Log Out
  </button>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
import Dropdown from './DropDown'
export default {
    name: "NavBar",
    components: {
        'drop-down': Dropdown
    },
    data() {
        return {
            isOpenAccount: false,
            isOpenProject: false,
            isOpenInventory: false,
            accountLinks: [
                {
                    'name': 'allAccountTypes',
                    'text': 'Account Type'
  },
                {
                    'name': 'allAccountSubTypes',
                    'text': 'Account Sub Type'
  },
                {
                    'name':'allCharts',
                    'text':'COAs'
  },
                {
                    'name':'allJournals',
                    'text':'Journals'
  },
            ],
            projectLinks: [
                {
                    'name': 'allProjects',
                    'text': 'Projects'
  },
                {
                    'name': 'allSubProjects',
                    'text': 'Sub Projects'
  }
            ],
            inventoryLinks: [
                {
                    'name': 'allInventories',
                    'text': 'Inventories'
  },
                {
                    'name': 'allInventoryItems',
                    'text': 'Inventory Items'
  }
            ],
        }
    },
    created() {
        console.log(localStorage.getItem('token'))
    },
    methods: {
        logout: function () {
            this.$store.dispatch('logout')
                .then(() => {
                    this.$router.push('/login')
                    location.reload()
                })
        },
    },
    computed: {
        isLoggedIn: function () {
            return this.$store.getters.isLogged
  },
        getUser() {
            let user = (this.$store.getters.user);
            console.log(user)
            return user ? user.name : "";
        },
    },
}
</script>
<style scoped>
.active {
    background: #7f9da1;
    color: black;
    font-weight: bold;
}
</style>
