<script>
import Dashboard from "@/Layouts/Dashboard.vue";
import { usePage } from "@inertiajs/vue3";

export default {
    name: "Index",
    methods: { usePage },
    components: { Dashboard }
}
</script>

<template>
    <Dashboard :title="'Welcome, ' + usePage().props.auth.user.username">

    </Dashboard>
</template>

<style scoped>
</style>
