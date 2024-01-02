<script>
import {usePage} from "@inertiajs/vue3";
import Dashboard from "@/Themes/Dashboard/Layout/Dashboard.vue";

export default {
    name: "Index",
    methods: {usePage},
    components: {Dashboard}
}
</script>

<template>
    <Dashboard :title="'Welcome, ' + usePage().props.auth.user.username">

    </Dashboard>
</template>

<style scoped>
</style>
