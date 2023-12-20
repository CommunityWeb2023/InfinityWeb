<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import Paginate from "@/Components/Global/Paginate.vue";
import {MagnifyingGlassCircleIcon, XMarkIcon} from "@heroicons/vue/24/outline/index.js";
import {router, useForm} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {
        Paginate,
        DashboardLayout,
        MagnifyingGlassCircleIcon, XMarkIcon
    },
    props: ['items'],
    data() {
        return {
            search: this.$page.props.url_parameters.query ?? '',
        }
    },
    methods: {
        resetSearch() {
            this.search = '';
        }
    },
    watch: {
        search: {
            handler(){
                router.reload( {
                    only: ['items'],
                    data: {
                        query: this.search,
                        page: 1,
                    }
                });
            },
            deep: true,
        }
    }
}
</script>

<template>
    <DashboardLayout title="Item Database">

        <div class="flex items-center justify-end">
            <div class="relative mt-2 rounded-md shadow-sm flex items-center">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <MagnifyingGlassCircleIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                </div>
                <input type="text" v-model="search" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search" />
                <XMarkIcon class="h-5 w-5 text-gray-400 absolute right-0 mr-3 cursor-pointer" aria-hidden="true" @click="resetSearch" v-if="search" />
            </div>
        </div>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <table class="min-w-full border-separate border-spacing-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Index</th>
                                        <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">Name</th>
                                        <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">Item Level</th>
                                        <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">Icon</th>
                                        <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-3 pr-4 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in items.data">
                                        <td :class="[ 'whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8']">
                                            {{ item.Index }}
                                        </td>
                                        <td :class="[ 'whitespace-nowrap hidden px-3 py-4 text-sm text-gray-500 sm:table-cell']">
                                            {{ item.szName }}
                                        </td>
                                        <td :class="[ 'whitespace-nowrap hidden px-3 py-4 text-sm text-gray-500 lg:table-cell']">
                                            {{ item.dwItemLV }}
                                        </td>
                                        <td :class="[ 'whitespace-nowrap px-3 py-4 text-sm text-gray-500']">
                                            <img :src="item.image_path" class="w-7 h-7" alt="">
                                        </td>
                                        <td :class="[ 'relative whitespace-nowrap py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-8 lg:pr-8']">
                                            <a v-if="!item.is_in_shop" :href="route('item.create', item.Index)" class="text-indigo-600 hover:text-indigo-900">Add to Shop</a>
                                            <a v-else :href="route('item.create', item.Index)" class="text-indigo-600 hover:text-indigo-900">Edit Item in Shop</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



       <div class="flex items-center justify-center mt-5">
           <Paginate :links="items.links" />
       </div>

    </DashboardLayout>
</template>

<style scoped>

</style>