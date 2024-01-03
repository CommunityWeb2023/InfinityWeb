<script>
import {usePage} from "@inertiajs/vue3";
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";
import Stats from "@/Themes/Dashboard/Overview/Stats.vue";
import StatsToday from "@/Themes/Dashboard/Overview/StatsToday.vue";

export default {
    name: "Index",
    methods: {usePage},
    components: {
        Dashboard,
        Stats,
        StatsToday
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
        <Stats :stats="stats" />

        <StatsToday :users_today="users_today" />
        <!-- Stats avg -->
        <!-- Stats yesterday -->
        <!-- Stats last week -->
        <!-- Stats last month -->

    </Dashboard>
</template>

<style scoped>
</style>
