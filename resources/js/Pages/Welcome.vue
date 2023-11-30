<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import StandardCard from "@/Components/StandardCard.vue";
import Sidebar from "@/Layouts/Components/Sidebar.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,

});


</script>

<template>
    <AppLayout :has-sidebar="true">
        <template #main>
            <StandardCard card-header="News">
                Willkommen
            </StandardCard>
        </template>

        <template #sidebar>
            <Sidebar />
        </template>
    </AppLayout>
</template>

<style>
    h1 {
        text-shadow: 0 0 0 rgba(0, 0, 0, 0.5);
    }
</style>
