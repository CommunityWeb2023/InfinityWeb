<script>

import {Head} from "@inertiajs/vue3";
import Navigation from "@/Themes/Classic/Layout/Components/Navigation.vue";
import Splashloader from "@/Themes/Classic/Layout/Components/Splashloader.vue";
import Footer from "@/Themes/Classic/Layout/Components/Footer.vue";
import Sidebar from "@/Themes/Classic/Layout/Components/Sidebar.vue";
import CookieConsentButton from "@/Themes/Classic/Layout/Components/CookieConsentButton.vue";
import {XMarkIcon} from "@heroicons/vue/24/outline";

export default {
    name: "Classic",
    components: {
        CookieConsentButton,
        Splashloader,
        Sidebar,
        Navigation,
        Head,
        Footer, XMarkIcon
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
    },
    data() {
        return {
            splashloader: true
        }
    },
    mounted() {
        setTimeout(() => {
            this.splashloader = false;
        }, 500);
    }
}
</script>

<template>
    <Splashloader v-if="splashloader" />
    <Head :title="title" />
    <div class="bg-[url('/storage/images/flyff-example.jpeg')] bg-top bg-no-repeat">
        <Navigation />


        <!-- Header -->
        <div class="mx-auto max-w-2xl py-32 sm:py-32 lg:py-56">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-white sm:text-5xl lg:text-6xl flex items-center justify-center">
                    <!-- Hero headline -->
                    <img src="/storage/images/CommunityWebLogo.png" alt="" class="h-52 w-52">
                </h1>
            </div>
        </div>


        <!-- Content -->
        <main class="container mx-auto max-w-7xl min-h-screen px-4 xl:px-0">
            <div class="" :class="!hasSidebar ? 'w-full' : 'grid grid-cols-1 grid-rows-5 gap-4 md:grid-cols-2 lg:grid-cols-7'">
                <div :class="!hasSidebar ? '' : 'col-span-5 row-span-5'">
                    <slot/>
                </div>
                <div class="col-span-full md:col-span-full lg:col-span-2 xl:row-span-5 lg:col-start-6" v-if="hasSidebar">
                    <Sidebar/>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <Footer />

    <CookieConsentButton />

    <div class="pointer-events-none fixed inset-x-0 bottom-0 sm:flex sm:justify-center sm:px-6 sm:pb-5 lg:px-8" v-if="$page.props.maintenance">
        <div class="pointer-events-auto flex items-center justify-between gap-x-6 bg-red-900 px-6 py-2.5 sm:rounded-xl sm:py-3 sm:pl-4 sm:pr-3.5 shadow-lg">
            <p class="text-sm leading-6 text-white">
                <span class="font-semibold">Maintenance mode</span> is currently activated on this website. Therefore, the website may not be available or only to a limited extent.
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>