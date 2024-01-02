<script>
import Dashboard from "@/Layouts/Dashboard.vue";
import { useForm } from "@inertiajs/vue3";
import { Quill, QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { ArrowPathIcon, PhotoIcon, RocketLaunchIcon } from "@heroicons/vue/24/outline/index.js";
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";
export default {
    name: "AddItem",
    components: {
        Dashboard,
        ArrowPathIcon, RocketLaunchIcon,
        QuillEditor,
        Dashboard,
        PhotoIcon, Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions, CheckIcon, ChevronUpDownIcon
    },
    props: ['item', 'categories'],
    data() {
        return {
            shopItem: useForm({
                name: this.item.szName,
                index: this.item.Index,
                description: this.item.szCommand,
                donate_points: 0,
                vote_points: 0,
                image: this.item.image_path,
                active: true,
                amount: 1,
                tradable: false,
                stackable: false,
                categories: [],
            }),
            selectedCategories: [],
        }
    },
    methods: {
        resetPost() {
            this.shopItem.reset();
            this.shopItem.description = '<p></p>';
        },
        submit() {
            this.shopItem.categories = this.selectedCategories.map((category) => category.id);
            this.shopItem.post(route('item.store'), {
                onSuccess: () => {
                },
                onFinish: () => {
                },
            });
        },
    }
}
</script>

<template>
    <Dashboard title="Add Item">

        <div class="grid grid-cols-4 grid-rows-3 gap-4 mb-5">
            <div class="col-span-2">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input type="text" v-model="shopItem.name" name="name" id="name"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        :placeholder="shopItem.name" />
                </div>
            </div>
            <div class="col-span-2 col-start-3">
                <label for="itemId" class="block text-sm font-medium leading-6 text-gray-900">Item Id</label>
                <div class="mt-2">
                    <input type="text" readonly disabled v-model="shopItem.index" name="itemId" id="itemId"
                        class="bg-gray-100 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        :placeholder="shopItem.index" />
                </div>
            </div>
            <div class="row-start-2">
                <label for="vote_points" class="block text-sm font-medium leading-6 text-gray-900">Vote Points</label>
                <div class="mt-2">
                    <input type="number" :readonly="shopItem.donate_points > 0" :disabled="shopItem.donate_points > 0"
                        v-model="shopItem.vote_points" :class="shopItem.donate_points > 0 ? 'bg-gray-100' : ''"
                        name="vote_points" id="vote_points" min="0"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        :placeholder="shopItem.vote_points" />
                </div>
            </div>
            <div class="row-start-2">
                <label for="donate_points" class="block text-sm font-medium leading-6 text-gray-900">Donate Points</label>
                <div class="mt-2">
                    <input type="number" :readonly="shopItem.vote_points > 0" :disabled="shopItem.vote_points > 0"
                        v-model="shopItem.donate_points" :class="shopItem.vote_points > 0 ? 'bg-gray-100' : ''"
                        name="donate_points" id="donate_points" min="0"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        :placeholder="shopItem.donate_points" />
                </div>
            </div>
            <div class="col-start-1 row-start-3">
                <label for="donate_points" class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                <div class="mt-2">
                    <input type="number" v-model="shopItem.amount" name="donate_points" id="donate_points" min="0"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        :placeholder="shopItem.donate_points" />
                </div>
            </div>
            <div class="col-start-2 row-start-3">
                <Listbox as="div" v-model="selectedCategories" multiple>
                    <ListboxLabel class="block text-sm font-medium leading-6 text-gray-900">Categories</ListboxLabel>
                    <div class="relative mt-2">
                        <ListboxButton
                            class="relative w-full h-9 cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <span class="block truncate"> {{ selectedCategories.map((category) => category.name).join(', ')
                            }}</span>
                            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            </span>
                        </ListboxButton>

                        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                            leave-to-class="opacity-0">
                            <ListboxOptions
                                class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                <ListboxOption as="template" v-for="category in categories" :key="category.id"
                                    :value="category" v-slot="{ active, selected }">
                                    <li
                                        :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                        <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">{{
                                            category.name }}</span>

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
            <div class="col-span-2 row-span-2 col-start-3 row-start-2">
                <div>
                    <button type="button"
                        class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        v-if="!shopItem.image">
                        <PhotoIcon class="mx-auto h-12 w-12 text-gray-400" />
                        <span class="mt-2 block text-sm font-semibold text-gray-900">Image</span>
                    </button>
                    <div
                        class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <img :src="shopItem.image" v-if="shopItem.image" alt="" class="mx-auto h-12 w-12 text-gray-400">
                    </div>
                </div>
            </div>
        </div>

        <QuillEditor theme="snow" ref="quill" toolbar="essential" v-model:content="shopItem.description" contentType="html"
            style="height: 200px" />


        <div class="flex justify-between gap-4 py-3">
            <div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <div class="relative flex items-start">
                        <div class="flex h-6 items-center">
                            <input id="tradable" v-model="shopItem.tradable" aria-describedby="tradable-description"
                                name="tradable" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600" />
                        </div>
                        <div class="ml-3 text-sm leading-6">
                            <label for="tradable" class="font-medium text-gray-900">Tradable</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex h-6 items-center">
                            <input id="stackable" v-model="shopItem.stackable" aria-describedby="stackable-description"
                                name="stackable" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600" />
                        </div>
                        <div class="ml-3 text-sm leading-6">
                            <label for="stackable" class="font-medium text-gray-900">Stackable</label>
                        </div>
                    </div>
                    <div class="relative flex items-start">
                        <div class="flex h-6 items-center">
                            <input id="active" v-model="shopItem.active" aria-describedby="active-description" name="active"
                                type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600" />
                        </div>
                        <div class="ml-3 text-sm leading-6">
                            <label for="active" class="font-medium text-gray-900">Active in Shop</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button @click="resetPost" type="button"
                    class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-light text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    <ArrowPathIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                    Reset
                </button>
                <button @click="submit" type="button"
                    class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    <RocketLaunchIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                    Add
                </button>
            </div>
        </div>

    </Dashboard>
</template>

<style scoped>
</style>
