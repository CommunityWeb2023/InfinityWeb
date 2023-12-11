<script>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import {usePage} from "@inertiajs/vue3";

export default {
    name: "Index",
    methods: {usePage},
    components: {DashboardLayout}
}
</script>

<template>
    <DashboardLayout :title="'Welcome, ' + usePage().props.auth.user.username">

    </DashboardLayout>
</template>

<style scoped>

</style>