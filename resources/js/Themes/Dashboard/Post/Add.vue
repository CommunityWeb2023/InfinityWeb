<script>
import { router, useForm } from "@inertiajs/vue3";
import { Quill, QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import { ArrowPathIcon, PhotoIcon, RocketLaunchIcon } from "@heroicons/vue/24/outline/index.js";
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";

export default {
    name: "Add",
    components: {
        Dashboard,
        QuillEditor, Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions,
        CheckIcon, ChevronUpDownIcon, PhotoIcon, ArrowPathIcon, RocketLaunchIcon,
    },
    props: ['categories'],
    data() {
        return {
            newPost: useForm({
                title: '',
                content: '',
                image: [],
                category: this.categories[0],
                published_at: null,
            }),
            newImage: useForm({
                file: [],
            }),
            url: null,
            preview: null,
            uploadDocumentFeedback: "",
        }
    },
    mounted() {
    },
    methods: {
        submit() {
            this.newPost.category = this.newPost.category.id;
            this.newPost.post(route('post.store'), {
                onSuccess: () => {
                },
                onFinish: () => {
                    this.newPost.category = this.categories.find(category => category.id === this.newPost.category);
                },
            });
        },
        resetPost() {
            this.newPost.reset();
        },
        updateImage() {
            this.validateTypeAndUploadImage(this.$refs.image.files[0]);
        },
        uploadDraggedImage(event) {
            this.validateTypeAndUploadImage(event.dataTransfer.files[0]);
        },
        validateTypeAndUploadImage(file) {
            const allowedTypes = [
                "image/jpeg",
                "image/svg+xml",
                "image/png",
                "image/gif",
                "image/webp",
                "image/bmp",
                "image/tiff",
                "image/x-icon",
                "image/vnd.microsoft.icon",
                "image/avif",
                "image/apng"
            ]

            if (allowedTypes.includes(file.type)) {
                this.preview = URL.createObjectURL(file);
                this.$refs.image.file = file;
                this.newPost.image.push(file)
            }
        },
        selectNewImage() {
            this.$refs.image.click();
        },
    },
}
</script>

<template>
    <Dashboard title="Add Post">
        <form @submit.prevent="submit">
            <div class="py-4">
                <div v-if="!preview" @click="selectNewImage" @dragover.prevent
                    @drop.stop.prevent="uploadDraggedImage($event)"
                    class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <PhotoIcon class="mx-auto h-12 w-12 text-gray-400" aria-hidden="true" />

                    <span class="mt-2 block text-sm font-semibold text-gray-900">Add Image</span>
                </div>
                <div v-else @click="selectNewImage" @dragover.prevent @drop.stop.prevent="uploadDraggedImage($event)"
                    class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 h-48 overflow-x-scroll p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <img :src="preview" alt="">
                </div>
                <input type="file" accept="image/*" @change="updateImage" ref="image" class="form-control-file hidden"
                    id="my-file">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-4">
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input v-model="newPost.title" type="text" name="title" id="title"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>

                <div>
                    <Listbox as="div" v-model="newPost.category">
                        <ListboxLabel class="block text-sm font-medium leading-6 text-gray-900">Category</ListboxLabel>
                        <div class="relative mt-2">
                            <ListboxButton
                                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <span class="block truncate">{{ newPost.category.name }}</span>
                                <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                    <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                </span>
                            </ListboxButton>

                            <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                                leave-to-class="opacity-0">
                                <ListboxOptions
                                    class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                    <ListboxOption as="template" v-for="person in categories" :key="person.id"
                                        :value="person" v-slot="{ active, selected }">
                                        <li
                                            :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                            <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">{{
                                                person.name }}</span>
                                            <span v-if="selected"
                                                :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                                <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                            </span>
                                        </li>
                                    </ListboxOption>
                                </ListboxOptions>
                            </transition>
                        </div>
                    </Listbox>
                </div>
                <div>
                    <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900">Publish At</label>
                    <div class="mt-2">
                        <input v-model="newPost.published_at" type="datetime-local" name="published_at" id="published_at"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                    </div>
                </div>
            </div>

            <QuillEditor theme="snow" ref="quill" toolbar="essential" v-model:content="newPost.content" contentType="html"
                style="height: 300px" />

            <div class="flex justify-end gap-4 py-3">
                <button @click="resetPost" type="button"
                    class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-light text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    <ArrowPathIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                    Reset
                </button>
                <button @click="submit" type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    <RocketLaunchIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                    Add
                </button>
            </div>
        </form>
    </Dashboard>
</template>

<style scoped>
</style>
