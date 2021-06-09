<template>
<div class="w-full md:w-1/2 flex flex-col items-center h-64 mx-auto">
    <div class="w-full px-4">
        <div class="flex flex-col items-center relative">
            <div class="w-full  svelte-1l8159u">
                <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                    <div class="flex flex-auto flex-wrap">
                        <!-- component -->
                        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-green-700 bg-green-100 border border-green-300 ">
                            <div class="text-xs font-normal leading-none max-w-full flex-initial">HTML</div>
                        </div>
                    </div>
                    <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                        <span class="fas fa-arrow-up"></span>
                    </div>
                </div>
            </div>
            <div class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                <div class="flex flex-col w-full">
                    <!--component-->
                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-green-100">
                        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-green-100">
                            <div class="w-full items-center flex">
                                <div class="mx-2 leading-6  ">Python </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
    name: "dummy"
}
</script>

<style scoped>
  .top-100 {top: 100%}
    .bottom-100 {bottom: 100%}
    .max-h-select {
        max-height: 300px;
    }
</style>
