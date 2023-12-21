<script>
import {Head} from "@inertiajs/vue3";
import PostCard from "@/Themes/Classic/Post/Components/PostCard.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
    name: "All",
    components: {AppLayout, PostCard, Head},
    props: ['posts'],
}
</script>

<template>
    <AppLayout :has-sidebar="false">
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 xl:grid-cols-5 gap-4">
            <div v-for="post in posts" :key="post.id" >
                <a :href="route('post.show', post.id)" class="group">
                    <PostCard :post="post" :key="post.id" class="group-hover:shadow-lg group-hover:ease-in-out transition-all group-hover:duration-300" />
                </a>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>