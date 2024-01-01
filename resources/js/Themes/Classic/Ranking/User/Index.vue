<script>
import Classic from "@/Themes/Classic/Layout/Classic.vue";
import {router} from "@inertiajs/vue3";
import Paginate from "@/Components/Global/Paginate.vue";

export default {
    name: "Index",
    components: {Paginate, Classic},
    props: ['characters', 'currentPageSize'],
    data() {
        return {
            paginateSizes: [10, 25, 50, 100, 150, 200, 250],
        }
    },
    methods: {
        reloadPaginate(pageSize){
            router.reload({
                data: {
                    pageSize: pageSize
                },
            })
        }
    }
}
</script>

<template>
    <Classic title="User Ranking">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="font-semibold text-xl">Character Ranking</h2>
                <div class="my-5">
                    <div class="flex items-center gap-4">
                        <button v-for="pageSize in paginateSizes" @click="reloadPaginate(pageSize)" type="button" :class="pageSize == currentPageSize ? 'text-yellow-600' : 'text-blue-800'">
                            Top {{ pageSize }}
                        </button>
                    </div>

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"></th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Class</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Level</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Play Time</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                    <tr v-for="(character, index) in characters.data" :key="character.m_szName">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ index + 1 }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ character.m_szName }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ character.m_nJob }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ character.m_nLevel }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ character.TotalPlayTime }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ character.CreateTime }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <Paginate :links="characters.links" />
                </div>
            </div>
        </div>

    </Classic>
</template>

<style scoped>

</style>