<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import StandardCard from "@/Components/StandardCard.vue";
import Sidebar from "@/Layouts/Components/Sidebar.vue";
import PostCard from "@/Pages/News/Components/PostCard.vue";

defineProps({
    posts: Array,
});


</script>

<template>
    <AppLayout :has-sidebar="true">
        <template #main>
            <Head title="Welcome" />

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-4  place-items-center">
                <div v-for="post in posts" class="col-start-auto ">
                    <a href="" class="group">
                        <PostCard :post="post" class="group-hover:shadow-lg ease-in-out transition-all duration-300" />
                    </a>
                </div>
            </div>

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
