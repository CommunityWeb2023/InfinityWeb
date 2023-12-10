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


        <ShowPostCard :post="post" class="group-hover:shadow-lg group-hover:ease-in-out group-hover:transition-all group-hover:duration-300" />
    </AppLayout>
</template>

<style scoped>

</style>