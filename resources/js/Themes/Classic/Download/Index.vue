<script>
import Classic from "@/Themes/Classic/Layout/Classic.vue";
import { ClockIcon } from "@heroicons/vue/24/outline/index.js";

export default {
    name: "Index",
    components: {
        Classic,
        ClockIcon
    },
    data() {
        return {
            downloads: [
                { id: 1, title: 'Client #1', description: 'very long and very specific description that is very long and very specific', image: 'https://www.svgrepo.com/show/331483/mega.svg', size: '1,34 GB', uploadDate: '02/01/2024' },
                { id: 2, title: 'Client #2', description: 'very long and very specific description that is very long and very specific', image: 'https://api.iconify.design/logos:google-drive.svg', size: '1,34 GB', uploadDate: '02/01/2024' },
                { id: 3, title: 'Client #3', description: 'very long and very specific description that is very long and very specific', image: 'https://api.iconify.design/logos:dropbox.svg', size: '1,34 GB', uploadDate: '02/01/2024' },
                { id: 4, title: 'Client #3', description: 'another very long and very specific description', image: 'https://api.iconify.design/logos:microsoft-onedrive.svg', size: '1,34 GB', uploadDate: '02/01/2024' },
                { id: 5, title: 'Client #3', description: 'another very long and very specific description', image: 'https://api.iconify.design/solar:server-minimalistic-linear.svg', size: '1,34 GB', uploadDate: '02/01/2024' },
                { id: 6, title: 'Client #3', description: 'another very long and very specific description', image: 'https://api.iconify.design/solar:server-minimalistic-linear.svg', size: '1,34 GB', uploadDate: '02/01/2024' },
            ]
        }
    }
}
</script>

<template>
    <Classic title="Downloads" :hasSidebar="true">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a v-for="{ id, title, description, image, size, uploadDate } in downloads" class="col-span-1 group" :key="id"
                :href="id">
                <div
                    class="bg-white rounded-lg shadow-md group-hover:shadow-lg border border-gray-100 transition-all duration-300 relative">
                    <div class="flex flex-col gap-4 justify-center pt-4">
                        <div class="flex justify-center">
                            <div class="group-hover:opacity-50 transition-all duration-300">
                                <img :src="image" class="h-16" alt="Provider image">
                            </div>
                        </div>
                        <div class="text-center px-8">
                            <h3 class="font-semibold text-md uppercase">{{ title }}</h3>
                            <p class="text-sm text-gray-600 min-h-16">
                                {{ description }}
                            </p>
                        </div>
                        <div class="border-t border-gray-300 border-dashed py-2.5 px-4">
                            <div class="px-8 font-light text-[9px] xl:text-[11px] flex justify-between">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M4 17h16v-6H4zm13-1.5q.625 0 1.063-.437T18.5 14q0-.625-.437-1.062T17 12.5q-.625 0-1.062.438T15.5 14q0 .625.438 1.063T17 15.5M22 9h-2.825l-2-2H6.825l-2 2H2l3.425-3.425q.275-.275.638-.425T6.825 5h10.35q.4 0 .763.15t.637.425zM4 19q-.825 0-1.412-.587T2 17V9h20v8q0 .825-.587 1.413T20 19z" />
                                    </svg>
                                    <span>{{ size }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <ClockIcon class="h-4 w-4 text-gray-500" />
                                    <span>{{ uploadDate }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </Classic>
</template>

<style scoped>
</style>
