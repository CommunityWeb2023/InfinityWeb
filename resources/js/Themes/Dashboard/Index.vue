<script>
import {usePage} from "@inertiajs/vue3";
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";

export default {
    name: "Index",
    methods: {usePage},
    components: {
        Dashboard
    },
    props: ['users_today', 'users_avg', 'users_yesterday'],
    data(){
        return {
            stats: [
                { name: 'Online', value: '0', change: '0%', changeType: 'neutral' },
                { name: 'Peak', value: '0', change: '0%', changeType: 'neutral' },
                { name: 'Web Accounts', value: this.users_today?.length, change: this.users_avg + '%', changeType: this.users_avg === 0 ? 'neutral' : this.users_avg > 0 ? 'positive' : 'negative' },
                { name: 'Accounts', value: '10', change: '0%', changeType: 'neutral' },
                { name: 'Characters', value: '10', change: '0%', changeType: 'neutral' },
            ]
        }
    }
}
</script>

<template>
    <Dashboard :title="'Welcome, ' + usePage().props.auth.user.username" :full-page="true">
        <dl class="mx-auto grid grid-cols-1 gap-px sm:grid-cols-2 lg:grid-cols-5 border-y border-dashed -mt-10 bg-gray-900">
            <div v-for="stat in stats" :key="stat.name" class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 text-white px-4 py-10 sm:px-6 xl:px-8">
                <dt class="text-sm font-medium leading-6 text-gray-500">{{ stat.name }}</dt>
                <dd :class="[stat.changeType === 'negative' ? 'text-rose-600' : 'text-green-500', 'text-xs font-medium']">
                    <span v-if="stat.changeType === 'negative'">-</span>
                    <span v-else-if="stat.changeType === 'neutral'">+/-</span>
                    <span v-else>+</span>
                    {{ stat.change }}
                </dd>
                <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight">{{ stat.value }}</dd>
            </div>
        </dl>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 my-5">
            <div class="mx-auto grid grid-cols-1 sm:grid-cols-3 gap-4 lg:grid-cols-3">
                <div class="col-span-2 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Web Accounts today
                        </h2>
                        <div>
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                {{ users_today.length }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">
                        <div class="flex items-center justify-between py-2" v-for="user in users_today">
                            <div>
                                <div class="text-sm font-medium text-gray-900 flex items-center gap-2">
                                    {{ user.username }}
                                    <span class="capitalize inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                        {{ user.first_role }}
                                    </span>
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ user.email }}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">
                                    vP: {{ user.votepoints }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    dP: {{ user.donatepoints }}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">
                                    {{ user.created_at }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ user.last_login_ip }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Accounts today
                        </h2>
                        <div>
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                0
                            </span>
                        </div>
                    </div>
                    <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

                    </div>
                </div>
                <div class="col-span-1 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Characters today
                        </h2>
                        <div>
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                0
                            </span>
                        </div>
                    </div>
                    <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

                    </div>
                </div>
                <div class="col-span-1 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Votes today
                        </h2>
                        <div>
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                0
                            </span>
                        </div>
                    </div>
                    <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

                    </div>
                </div>
                <div class="col-span-1 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Donations today
                        </h2>
                        <div>
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                0
                            </span>
                        </div>
                    </div>
                    <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

                    </div>
                </div>
                <div class="col-span-1 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Send Donate Points Log
                        </h2>
                        <div>
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                0
                            </span>
                        </div>
                    </div>
                    <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

                    </div>
                </div>
                <div class="col-span-2 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Trade Logs Today
                        </h2>
                        <div>
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                0
                            </span>
                        </div>
                    </div>
                    <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

                    </div>
                </div>
            </div>
        </div>


    </Dashboard>
</template>

<style scoped>
</style>
