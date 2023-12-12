<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PostCard from "@/Pages/Post/Components/PostCard.vue";
import ShowPostCard from "@/Pages/Post/Components/ShowPostCard.vue";

export default {
    name: "Show",
    components: {ShowPostCard, PostCard, AppLayout},
    props: ['post'],
}
</script>

<template>
    <AppLayout :has-sidebar="false">
        <ShowPostCard :post="post" />
    </AppLayout>
</template>

<style scoped>

</style>