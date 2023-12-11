<script>
import TagComponent from "@/Components/Global/TagComponent.vue";
import {ChevronDoubleLeftIcon, ClockIcon, FolderIcon} from "@heroicons/vue/24/outline/index.js";

export default {
    name: "ShowPostCard",
    components: {
        TagComponent,
        FolderIcon, ClockIcon, ChevronDoubleLeftIcon
    },
    props: ['post'],
}
</script>

<template>
    <div class="mb-4">
        <a :href="route('home')" class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
            <ChevronDoubleLeftIcon class="-ml-0.5 h-3 w-3" aria-hidden="true" />
            Back
        </a>
    </div>
    <div class="bg-white rounded-lg shadow-md">
        <div class="relative overflow-hidden">
            <img :src="post.image_path" class="rounded-t-lg h-48 w-full object-cover group-hover:scale-125 group-hover:transition group-hover:ease-in-out group-hover:duration-300 group-hover:opacity-75" alt="" >
        </div>
        <div class="border border-gray-50" :class="!post.image_path ? 'rounded-t-lg' : ''">
            <div class="border-b border-gray-300 border-dashed py-2.5 px-4">
                <h2 class="font-semibold">
                    {{ post.title }}
                </h2>
            </div>
            <div class="p-5">
                <div class="text-sm" v-html="post.content">
                </div>
            </div>
            <div class="border-t border-gray-300 border-dashed py-2.5 px-4">
                <div class="font-light text-xs flex justify-between">
                    <div class="flex items-center gap-1">
                        <FolderIcon class="h-4 w-4 text-gray-500" />
                        {{ post.category }}
                    </div>
                    <div class="flex items-center gap-1">
                        <img class="h-4 w-4 text-gray-500 rounded-full object-cover" :src="post.author_image" />
                        {{ post.author }}
                    </div>
                    <div class="flex items-center gap-1">
                        <ClockIcon class="h-4 w-4 text-gray-500" />
                        {{ post.published_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>