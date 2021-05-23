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
            <div class="text-sm lg:flex-grow">

                <router-link
                     class="block mt-4 p-2 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" to="/">
                    Project Offers
                </router-link>

                <div class="relative mt-4 p-2 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4">
                    <button @click="isOpenAccount = !isOpenAccount" class="relative z-10 block overflow-hidden">
                        Account
                    </button>
                    <button v-if="isOpenAccount" @click="isOpenAccount = false" tabindex="-1" class="fixed inset-0 h-full w-full bg-gray-50 opacity-25 cursor-default"></button>
                    <div v-if="isOpenAccount" class="absolute mt-2 py-2 w-40 bg-gray-200 rounded-lg shadow-xl">
                        <router-link class="block px-4 py-2 rounded-lg text-gray-800 hover:bg-gray-500 hover:text-white" :to="{name:'allAccountTypes'}">
                            Account Types
                        </router-link>
                        <router-link class="block px-4 py-2 rounded-lg text-gray-800 hover:bg-gray-500 hover:text-white" :to="{name: 'allAccountSubTypes'}">
                            Account SubTypes
                        </router-link>
                    </div>
                </div>

                <div class="relative mt-4 p-2 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4">
                    <button @click="isOpenProject = !isOpenProject" class="relative z-10 block overflow-hidden">
                        Project
                    </button>
                    <button v-if="isOpenProject" @click="isOpenProject = false" tabindex="-1" class="fixed inset-0 h-full w-full bg-gray-50 opacity-25 cursor-default"></button>
                    <div v-if="isOpenProject" class="absolute mt-2 py-2 w-40 bg-gray-200 rounded-lg shadow-xl">
                        <router-link class="block px-4 py-2 rounded-lg text-gray-800 hover:bg-gray-500 hover:text-white" :to="{name:'allProjects'}">
                            Projects
                        </router-link>
                        <router-link class="block px-4 py-2 rounded-lg text-gray-800 hover:bg-gray-500 hover:text-white" :to="{name: 'allSubProjects'}">
                            SubProjects
                        </router-link>
                    </div>
                </div>

                <!-- <router-link
                    class="block mt-4 p-2 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name:'allAccountTypes'}">
                    Account Types
                </router-link>

                <router-link
                    class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name: 'allAccountSubTypes'}">
                    Account SubTypes
                </router-link>

                <router-link
                    class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name: 'allProjects'}">
                    Projects
                </router-link>

                <router-link
                    class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name: 'allSubProjects'}">
                    SubProjects
                </router-link> -->

                <router-link  class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name: 'allCharts'}">
                    COAs
                </router-link>

                <router-link  class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name: 'allJournals'}">
                    Journals
                </router-link>

                <div class="relative mt-4 p-2 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4">
                    <button @click="isOpenInventory = !isOpenInventory" class="relative z-10 block overflow-hidden">
                        Inventory
                    </button>
                    <button v-if="isOpenInventory" @click="isOpenInventory = false" tabindex="-1" class="fixed inset-0 h-full w-full bg-gray-50 opacity-25 cursor-default"></button>
                    <div v-if="isOpenInventory" class="absolute mt-2 py-2 w-40 bg-gray-200 rounded-lg shadow-xl">
                        <router-link class="block px-4 py-2 rounded-lg text-gray-800 hover:bg-gray-500 hover:text-white" :to="{name:'allInventories'}">
                            Inventories
                        </router-link>
                        <router-link class="block px-4 py-2 rounded-lg text-gray-800 hover:bg-gray-500 hover:text-white" :to="{name: 'allInventoryItems'}">
                            Inventory Items
                        </router-link>
                    </div>
                </div>

                <!-- <router-link  class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name: 'allInventories'}">
                    Inventories
                </router-link>

                <router-link  class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name: 'allInventoryItems'}">
                    Inventory Items
                </router-link> -->

                <router-link  class="block p-2 mt-4 lg:inline-block lg:mt-0 text-teal-200 text-white mr-4" :to="{name: 'allItems'}">
                    Items
                </router-link>
            </div>
            <div>
                <a href="#"
                   class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">
                    TBA</a>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBar",
    data() {
        return {
            isOpenAccount:false,
            isOpenProject:false,
            isOpenInventory:false,
        }
    },
	created(){
		const handleEscape = (e) => {
			if(e.key === 'Esc' || e.key === 'Escape'){
				this.isOpen = false,
                console.log('Click')
			}
		}

		document.addEventListener('keydown', handleEscape)

		this.$once('keydown', ()=>{
			document.removeEventListener('keydown', handleEscape)
		})
	},
    methods: {

    }
}
</script>

<style scoped>

.active {
    background: #7f9da1;
    color: black;
    font-weight: bold;
}

</style>
