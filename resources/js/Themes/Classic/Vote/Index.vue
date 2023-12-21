<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PostCard from "@/Themes/Classic/Post/Components/PostCard.vue";
import VoteCard from "@/Themes/Classic/Vote/Components/VoteCard.vue";

export default {
    name: "Index",
    components: {
        VoteCard,
        PostCard,
        AppLayout
    },
    props: ['voteSites'],
}
</script>

<template>
    <AppLayout title="Vote for us">

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4">
            <div v-for="site in voteSites" :key="site.id" >
                <VoteCard :vote="site" :key="site.id" class="group-hover:shadow-lg group-hover:ease-in-out transition-all group-hover:duration-300" />

            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>