<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PostCard from "@/Themes/Classic/Post/Components/PostCard.vue";
import { ArrowLongRightIcon } from "@heroicons/vue/24/outline/index.js";
import Classic from "@/Themes/Classic/Layout/Classic.vue";

defineProps({
    posts: Array,
});


</script>

<template>
    <Classic :has-sidebar="true" title="Welcome">


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <div v-for="post in posts" :key="post.id" >
                <a :href="route('post.show', post.id)" class="group">
                    <PostCard :post="post" :key="post.id" class="group-hover:shadow-lg group-hover:ease-in-out transition-all group-hover:duration-300" />
                </a>
            </div>
        </div>
        <div class="flex items-center justify-end mt-5 underline-offset-1 underline text-blue-500 gap-1 hover:text-blue-800 transition-all duration-300">
            <a :href="route('post.all')" class="text-xs">
                Show all News
            </a>
            <ArrowLongRightIcon class="h-3 w-3" />
        </div>
    </Classic>
</template>

<style>

</style>
