<template>
    <div class="flex flex-wrap" @mouseover="showDropDown()" ref="btnDropdownRef" @mouseleave="hideDropDown">
        <div class="w-full sm:w-6/12 md:w-4/12">
            <div class="relative inline-flex align-middle w-full">
                <div class="flex">
                    <button class="flex text-white font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg
                    outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 ease-linear transition-all
                    duration-150 font-normal px-6 py-2 rounded outline-none focus:outline-none mr-1 mb-1
                    capitalize w-full" type="button">
                        <slot></slot>
                    <span class="ml-3 fas fa-caret-down"></span>
                    </button>
                </div>
                <div v-bind:class="{'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow}"
                     class="bg-gray-600 text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                     style="min-width:12rem" ref="popoverDropdownRef">
                    <router-link v-for="link in links" :key="link.name" :to="{'name' :link.name}"
                                 class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent
                                  text-blueGray-700 hover:bg-gray-500">
                        {{link.text}}
                    </router-link>

                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {createPopper} from "@popperjs/core";

export default {
    name: "DropDown",
    props: {
        links: Array
    },
    data() {
        return {
            dropdownPopoverShow: false
        }
    },
    methods: {
        hideDropDown() {
            this.dropdownPopoverShow = false;
        },
        showDropDown() {
            this.dropdownPopoverShow = true;
            createPopper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
                placement: "bottom-start"
            });
        }
    }
}
</script>

<style scoped>

</style>
