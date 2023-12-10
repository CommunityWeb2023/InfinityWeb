<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
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

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-4">
                <div v-for="post in posts" :key="post.id" >
                    <a href="" class="group">
                        <PostCard :post="post" :key="post.id" class="group-hover:shadow-lg group-hover:ease-in-out group-hover:transition-all group-hover:duration-300" />
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
