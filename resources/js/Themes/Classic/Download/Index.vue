<script>
import Classic from "@/Themes/Classic/Layout/Classic.vue";

export default {
    name: "Index",
    components: {
        Classic
    }
}
</script>

<template>
    <Classic title="Downloads" :hasSidebar="true">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a v-for="download in 10" class="col-span-1 group" :key="download" :href="download">
                <div class="p-4 bg-white rounded-lg shadow-md group-hover:shadow-lg border border-gray-100 transition-all duration-300 relative">
                    <div class="flex flex-col items-center justify-center">
                        <div class="group-hover:opacity-50 transition-all duration-300">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/MEGA_logo.png/1599px-MEGA_logo.png?20180330081727" class="h-24 w-auto" alt="">
                        </div>
                        <div class="text-center">
                            <h3 class="font-semibold text-md uppercase">Download #{{ download }}</h3>
                            <p class="text-xs">Size: 1,34 GB</p>
                            <p class="text-sm text-gray-600 h-12 overflow-x-scroll">
                                Lorem ipsum dolor si
                            </p>
                        </div>
                    </div>

                </div>
            </a>
        </div>
    </Classic>
</template>

<style scoped>

</style>