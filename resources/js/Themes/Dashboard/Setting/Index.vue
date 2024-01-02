<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {useForm} from "@inertiajs/vue3";
import {ArrowPathIcon, RocketLaunchIcon} from "@heroicons/vue/24/outline/index.js";
import { Switch, SwitchDescription, SwitchGroup, SwitchLabel } from '@headlessui/vue'
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";

export default {
    name: "Index",
    components: {
        Dashboard,
        ArrowPathIcon, RocketLaunchIcon,
        DashboardLayout,
        Switch, SwitchDescription, SwitchGroup, SwitchLabel
    },
    props: ['themes', 'setting'],
    data() {
        return {
            settings: useForm({
                title: this.setting.title,
                slogan: this.setting.slogan,
                description: this.setting.description,
                drop_rate: this.setting.drop_rate,
                penya_rate: this.setting.penya_rate,
                exp_rate: this.setting.exp_rate,
                discord: this.setting.discord,
                facebook: this.setting.facebook,
                twitter: this.setting.twitter,
                youtube: this.setting.youtube,
                instagram: this.setting.instagram,
                twitch: this.setting.twitch,
                theme: this.setting.theme,
                language: this.setting.language,
                timezone: this.setting.timezone,
                maintenance: this.setting.maintenance,
            })
        }
    },
    methods: {
        activateTheme(theme) {
            this.settings.theme = theme;
            this.updateSettings();
        },
        updateSettings() {
            this.settings.patch(route('setting.update'), {
                preserveScroll: true,
                preserveState: true,
            });
        },
        resetSettings() {
            this.settings.reset();
        }
    }
}
</script>

<template>
    <Dashboard>
        <div class="my-10">
            <SwitchGroup as="div" class="flex items-center justify-between">
                <span class="flex flex-grow flex-col">
                  <SwitchLabel as="span" class="text-sm font-medium leading-6 text-gray-900" passive>Maintenance Mode</SwitchLabel>
                  <SwitchDescription as="span" class="text-sm text-gray-500">
                    Enable maintenance mode.
                  </SwitchDescription>
                </span>
                <Switch v-model="settings.maintenance" :class="[settings.maintenance ? 'bg-orange-500' : 'bg-gray-200', 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-offset-2']">
                    <span aria-hidden="true" :class="[settings.maintenance ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']" />
                </Switch>
            </SwitchGroup>
        </div>

        <div class="my-10">
            <div class="sm:flex sm:items-center mb-3">
                <div class="sm:flex-auto">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">
                        Server Rates
                    </h3>
                    <p class="mt-2 text-sm text-gray-700">
                        Manage your server rates.
                    </p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">

                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="drop_rate" class="block text-sm font-medium leading-6 text-gray-900">Drop</label>
                    <div class="mt-2">
                        <input
                            type="number"
                            min="0"
                            v-model="settings.drop_rate"
                            name="drop_rate"
                            id="drop_rate"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.drop_rate"/>
                        <div v-if="settings.errors.drop_rate" class="text-xs text-red-500 mt-2">
                            {{ settings.errors.drop_rate }}
                        </div>
                    </div>
                </div>
                <div>
                    <label for="penya_rate" class="block text-sm font-medium leading-6 text-gray-900">Penya</label>
                    <div class="mt-2">
                        <input
                            type="number"
                            min="0"
                            v-model="settings.penya_rate"
                            name="penya_rate"
                            id="penya_rate"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.penya_rate"/>
                        <div v-if="settings.errors.penya_rate" class="text-xs text-red-500 mt-2">
                            {{ settings.errors.penya_rate }}
                        </div>
                    </div>
                </div>
                <div>
                    <label for="exp_rate" class="block text-sm font-medium leading-6 text-gray-900">EXP</label>
                    <div class="mt-2">
                        <input
                            type="number"
                            min="0"
                            v-model="settings.exp_rate"
                            name="exp_rate"
                            id="exp_rate"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.exp_rate"/>
                        <div v-if="settings.errors.exp_rate" class="text-xs text-red-500 mt-2">
                            {{ settings.errors.exp_rate }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-10">
            <div class="sm:flex sm:items-center mb-3">
                <div class="sm:flex-auto">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">
                        Social Media
                    </h3>
                    <p class="mt-2 text-sm text-gray-700">
                        Manage your social media.
                    </p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">

                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <div class="flex justify-between">
                        <label for="facebook" class="block text-sm font-medium leading-6 text-gray-900">Facebook</label>
                        <span class="text-sm leading-6 text-gray-500" id="facebook-optional">Optional</span>
                    </div>
                    <div class="mt-2">
                        <input
                            type="text"
                            v-model="settings.facebook"
                            name="facebook"
                            id="facebook"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.facebook"
                            aria-describedby="facebook-optional" />
                    </div>
                </div>
                <div>
                    <div class="flex justify-between">
                        <label for="instagram" class="block text-sm font-medium leading-6 text-gray-900">Instagram</label>
                        <span class="text-sm leading-6 text-gray-500" id="instagram-optional">Optional</span>
                    </div>
                    <div class="mt-2">
                        <input
                            type="text"
                            v-model="settings.instagram"
                            name="instagram"
                            id="instagram"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.instagram"
                            aria-describedby="instagram-optional" />
                    </div>
                </div>
                <div>
                    <div class="flex justify-between">
                        <label for="discord" class="block text-sm font-medium leading-6 text-gray-900">Discord</label>
                        <span class="text-sm leading-6 text-gray-500" id="discord-optional">Optional</span>
                    </div>
                    <div class="mt-2">
                        <input
                            type="text"
                            v-model="settings.discord"
                            name="discord"
                            id="discord"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.discord"
                            aria-describedby="discord-optional" />
                    </div>
                </div>
                <div>
                    <div class="flex justify-between">
                        <label for="twitter" class="block text-sm font-medium leading-6 text-gray-900">Twitter</label>
                        <span class="text-sm leading-6 text-gray-500" id="twitter-optional">Optional</span>
                    </div>
                    <div class="mt-2">
                        <input
                            type="text"
                            v-model="settings.twitter"
                            name="twitter"
                            id="twitter"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.twitter"
                            aria-describedby="twitter-optional" />
                    </div>
                </div>
                <div>
                    <div class="flex justify-between">
                        <label for="twitch" class="block text-sm font-medium leading-6 text-gray-900">Twitch</label>
                        <span class="text-sm leading-6 text-gray-500" id="twitch-optional">Optional</span>
                    </div>
                    <div class="mt-2">
                        <input
                            type="text"
                            v-model="settings.twitch"
                            name="twitch"
                            id="twitch"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.twitch"
                            aria-describedby="twitch-optional" />
                    </div>
                </div>
                <div>
                    <div class="flex justify-between">
                        <label for="youtube" class="block text-sm font-medium leading-6 text-gray-900">Youtube</label>
                        <span class="text-sm leading-6 text-gray-500" id="youtube-optional">Optional</span>
                    </div>
                    <div class="mt-2">
                        <input
                            type="text"
                            v-model="settings.youtube"
                            name="youtube"
                            id="youtube"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            :placeholder="settings.youtube"
                            aria-describedby="youtube-optional" />
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-4 py-3 items-center">
            <div v-if="settings.isDirty">
                <span class="text-xs text-red-500">You have unsaved changes.</span>
            </div>
            <button :disabled="settings.processing" @click="resetSettings" type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-light text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" :class="settings.processing ? 'bg-gray-300 hover:bg-gray-300' : ''">
                <ArrowPathIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                Reset
            </button>
            <button :disabled="settings.processing" @click="updateSettings" type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" :class="settings.processing ? 'bg-gray-300 hover:bg-gray-300' : ''">
                <RocketLaunchIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                Save
            </button>
        </div>

        <div class="">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Themes</h3>
                    <p class="mt-2 text-sm text-gray-700">
                        Manage your themes.
                    </p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">

                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Author</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Version</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            <tr v-for="theme in themes" :key="theme.name">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ theme.title }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ theme.author }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ String.prototype.substring.call(theme.description, 0 , 90) }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ theme.version }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                    <button v-if="!theme?.active" @click="activateTheme(theme.name)" class="text-indigo-600 hover:text-indigo-900">Activate</button>
                                    <span v-else class="bg-green-700/70 text-white text-xs px-4 py-1.5 rounded-full cursor-default">In Use</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </Dashboard>
</template>

<style scoped>

</style>