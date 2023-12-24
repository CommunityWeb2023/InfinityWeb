<script>

import PostCard from "@/Themes/Classic/Post/Components/PostCard.vue";
import ShowPostCard from "@/Themes/Classic/Post/Components/ShowPostCard.vue";
import Classic from "@/Themes/Classic/Layout/Classic.vue";

export default {
    name: "Show",
    components: {Classic, ShowPostCard, PostCard},
    props: ['post'],
}
</script>

<template>
    <Classic :title="post.title" :has-sidebar="false">
        <ShowPostCard :post="post" />
    </Classic>
</template>

<style scoped>

</style>