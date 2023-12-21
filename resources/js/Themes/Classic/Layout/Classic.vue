<script>

import {Head} from "@inertiajs/vue3";
import Navigation from "@/Themes/Classic/Layout/Components/Navigation.vue";
import Sidebar from "@/Layouts/Components/Sidebar.vue";

export default {
    name: "Classic",
    components: {
        Sidebar,
        Navigation,
        Head
    },
    props: {
        title: {
            type: String,
            required: true
        },
        hasSidebar: {
            type: Boolean,
            default: false
        }
    }
}
</script>

<template>
    <Head :title="title" />

    <!-- navigation -->
    <Navigation />


    <!-- Header -->



    <!-- Content -->
    <main class="container mx-auto max-w-7xl min-h-screen px-4 xl:px-0">
        <div class="" :class="!hasSidebar ? 'w-full' : 'grid grid-cols-1 grid-rows-5 gap-4 md:grid-cols-2 lg:grid-cols-7'">
            <div :class="!hasSidebar ? '' : 'col-span-5 row-span-5'">
                <slot/>
            </div>
            <div class="col-span-full md:col-span-full lg:col-span-2 xl:row-span-5 lg:col-start-6" v-if="hasSidebar">
                <Sidebar />
            </div>
        </div>
    </main>


    <!-- Footer -->

</template>

<style scoped>

</style>