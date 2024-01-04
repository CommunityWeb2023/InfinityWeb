<script>
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";
import {LockClosedIcon, CircleStackIcon, PencilSquareIcon} from "@heroicons/vue/24/outline/index.js";
import StatsBadge from "@/Themes/Dashboard/Overview/StatsBadge.vue";

export default {
    name: "Show",
    components: {
        StatsBadge,
        Dashboard, LockClosedIcon, CircleStackIcon, PencilSquareIcon
    },
    props: ['user'],
    methods: {
        convertDateStingToHumanReadable(dateString) {
            // 2021-09-19T15:00:00.000000Z to 19.09.2021 15:00
            if(!dateString) return 'Never';
            const date = new Date(dateString);
            return date.toLocaleDateString('de-DE', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    }
}
</script>

<template>
    <Dashboard :title="'Show Account: ' + user.username">

        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl">Account, {{ user.username }}</h2>
            </div>
            <div>
                <a :href="route('search.user.index')" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    Back
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <div class="mt-6">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Username</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ user.username }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">First Role</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 capitalize">{{ user.first_role }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ user.email }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Votepoints</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ user.votepoints }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Donatepoints</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ user.donatepoints }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div>
                <div class="mt-6">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Created at</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ user.created_at }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Last Login</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ user?.last_login_at }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Last Login IP</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ user?.last_login_ip }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Banned </dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                <span v-if="user.isBanned">Banned</span>
                                <span v-else class="text-green-700">active</span>
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-full sm:mt-0 gap-4">
                               <div class="flex items-center gap-3">
                                   <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                       <LockClosedIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                                       Ban User
                                   </button>

                                   <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                       <CircleStackIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                                       Add / Remove Points
                                   </button>
                                   <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                       <PencilSquareIcon class="-ml-0.5 h-5 w-5" aria-hidden="true" />
                                       Edit User
                                   </button>
                               </div>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="my-3">
            <!-- Todays Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-5 gap-4 lg:grid-cols-5">
                <div class="col-span-2 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Logins
                        </h2>
                    </div>
                    <div class="px-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">
                        <div class="flow-root">
                            <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full align-middle">
                                    <table class="min-w-full border-separate border-spacing-0">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">IP</th>
                                            <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">Login at</th>
                                            <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">Logout at</th>
                                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">User Agent</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(login, index) in user.authentications" :key="login.id">
                                            <td :class="[index !== login.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8']">{{ login.ip_address }}</td>
                                            <td :class="[index !== login.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap hidden px-3 py-4 text-sm text-gray-500 sm:table-cell']">{{ convertDateStingToHumanReadable(login.login_at) }}</td>
                                            <td :class="[index !== login.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap hidden px-3 py-4 text-sm text-gray-500 lg:table-cell']">{{ convertDateStingToHumanReadable(login.logout_at) }}</td>
                                            <td :class="[index !== login.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap px-3 py-4 text-sm text-gray-500']">{{ login.user_agent }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 bg-white border rounded-lg">
                    <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                        <h2 class="font-semibold text-sm">
                            Accounts
                        </h2>
                    </div>
                    <div class="px-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">
                        <div class="flow-root">
                            <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full align-middle">
                                    <table class="min-w-full border-separate border-spacing-0">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Name</th>
                                            <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">Reg Date</th>
                                            <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">Auth</th>
                                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">Char Count</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(account, index) in user.accounts" :key="account.account">
                                            <td :class="[index !== account.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8']">{{ account.account }}</td>
                                            <td :class="[index !== account.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap hidden px-3 py-4 text-sm text-gray-500 sm:table-cell']">{{ account.account_details.regdate }}</td>
                                            <td :class="[index !== account.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap hidden px-3 py-4 text-sm text-gray-500 lg:table-cell']">{{ account.account_details.m_chLoginAuthority }}</td>
                                            <td :class="[index !== account.length - 1 ? 'border-b border-gray-200' : '', 'whitespace-nowrap px-3 py-4 text-sm text-gray-500']"><StatsBadge>{{ account.characters?.length }}</StatsBadge></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Dashboard>
</template>

<style scoped>

</style>