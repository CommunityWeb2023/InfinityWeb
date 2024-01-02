<script>

import { MagnifyingGlassCircleIcon, PencilSquareIcon, TrashIcon, XMarkIcon } from "@heroicons/vue/24/outline/index.js";
import ConfirmDeleteModal from "@/Components/Global/Modals/ConfirmDeleteModal.vue";
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";

export default {
    name: "Index",
    components: {
        ConfirmDeleteModal,
        Dashboard,
        TrashIcon,
        PencilSquareIcon,
        MagnifyingGlassCircleIcon,
        XMarkIcon
    },
    props: ['posts'],
    data() {
        return {
            showConfirmDeleteModal: false,
            postToDelete: null,
            search: '',
        }
    },
    computed: {
        filteredPosts() {
            return this.posts.filter(post => {
                return post.title.toLowerCase().includes(this.search.toLowerCase());
            });
        }
    },
    methods: {
        confirmDelete(postId) {
            this.postToDelete = postId;
            this.showConfirmDeleteModal = true;
        },
        closeConfirmDeleteModal() {
            this.showConfirmDeleteModal = false;
            this.postToDelete = null;
        },
        deletePost() {
            this.$inertia.delete(route('post.destroy', this.postToDelete), {
                onSuccess: () => {
                    this.closeConfirmDeleteModal();
                },
            });
        },
    }
}
</script>

<template>
    <Dashboard title="Posts">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="w-64">
                    <div>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <MagnifyingGlassCircleIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            </div>
                            <div v-if="search" class="bg-white">
                                <button @click="search = ''" type="button"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <XMarkIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </button>
                            </div>
                            <input type="text" v-model="search" name="email" id="email"
                                class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Search title" />

                        </div>
                    </div>
                </div>
                <div class="">
                    <a :href="route('post.create')" type="button"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                        Post</a>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <table class="min-w-full border-separate border-spacing-0">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                        #</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">
                                        Title</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">
                                        Published At</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                        Author</th>
                                    <th scope="col"
                                        class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-3 pr-4 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(post, personIdx) in filteredPosts" :key="posts.title">
                                    <td
                                        :class="[personIdx !== post.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8']">
                                        {{ post.id }}</td>
                                    <td
                                        :class="[personIdx !== post.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap hidden px-3 py-4 text-sm text-gray-500 sm:table-cell']">
                                        {{ post.title }}</td>
                                    <td
                                        :class="[personIdx !== post.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap hidden px-3 py-4 text-sm text-gray-500 lg:table-cell']">
                                        {{ post.published_at }}</td>
                                    <td
                                        :class="[personIdx !== post.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap px-3 py-4 text-sm text-gray-500']">
                                        {{ post.author }}</td>
                                    <td
                                        :class="[personIdx !== post.length - 1 ? 'border-b border-gray-200' : '', 'relative whitespace-nowrap py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-8 lg:pr-8 flex gap-2 justify-end']">
                                    <a :href="route('post.edit', post.id)">
                                        <PencilSquareIcon class="h-5 w-5 text-blue-600" aria-hidden="true" />
                                    </a>
                                    <button @click="confirmDelete(post.id)">
                                        <TrashIcon class="h-5 w-5 text-red-500" aria-hidden="true" />
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <ConfirmDeleteModal v-if="showConfirmDeleteModal" @close="closeConfirmDeleteModal" @cancel="closeConfirmDeleteModal" title="Delete Post" description="Are you sure you want to delete this post?" @confirm="deletePost" />
    </Dashboard>
</template>

<style scoped>
</style>
