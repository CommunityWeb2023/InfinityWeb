<script>
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";
import StatsBadge from "@/Themes/Dashboard/Overview/StatsBadge.vue";
import {UserIcon, MagnifyingGlassIcon} from "@heroicons/vue/24/outline";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "Index",
    components: {
        Dashboard,
        UserIcon, MagnifyingGlassIcon, StatsBadge
    },
    props: ['users'],
    data() {
        return {
            search: ''
        }
    },
    computed: {
        filteredUsers() {
            if (!this.search.trim()) {
                return this.users;
            }

            let filtered = {};
            Object.entries(this.users).forEach(([key, value]) => {
                // Überprüfen, ob 'accounts' existiert und ein Array ist
                if (value.accounts && Array.isArray(value.accounts)) {
                    const matchingAccounts = value.accounts.filter(account =>
                        account.username.toLowerCase().includes(this.search.toLowerCase())
                    );

                    if (matchingAccounts.length > 0) {
                        filtered[key] = {...value, accounts: matchingAccounts};
                    }
                }
            });

            return filtered;
        }
    },
}

</script>

<template>
    <Dashboard title="Search User">

        <div class="flex items-center justify-end mb-4">
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <MagnifyingGlassIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                </div>
                <input type="text" v-model="search" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Username" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 xl:grid-cols-5 gap-4">
            <div v-for="(userData, userKey) in filteredUsers" :key="userKey" class="rounded-lg border border-dashed">
                <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
                    <h2 class="font-semibold text-sm">
                        {{ userKey }}
                    </h2>
                    <StatsBadge>
                        {{ userData.accounts?.length ?? 0 }}
                    </StatsBadge>
                </div>
                <div class="p-3 h-44 overflow-x-scroll divide-y divide-gray-300 divide-dashed">
                    <div v-for="account in userData.accounts" :key="account.id" class="text-xs py-2">
                        <a :href="route('search.user.show', account.id)" class="text-blue-500 flex items-center gap-2">
                            <UserIcon class="h-4 w-4" />
                            {{ account.username }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </Dashboard>
</template>

<style scoped>

</style>