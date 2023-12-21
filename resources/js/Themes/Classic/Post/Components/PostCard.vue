<script>
import TagComponent from "@/Components/Global/TagComponent.vue";
import {ClockIcon, FolderIcon} from "@heroicons/vue/24/outline/index.js";

export default {
    name: "PostCard",
    components: {
        TagComponent,
        FolderIcon, ClockIcon
    },
    props: ['post'],
}
</script>

<template>
    <div class="bg-white rounded-lg shadow-md">
        <div class="relative overflow-hidden">
            <img :src="post.image_path" class=" h-48 w-full object-cover group-hover:scale-125 transition ease-in-out duration-300 group-hover:opacity-75" alt="" >
        </div>
        <div class="border border-gray-50" :class="!post.image_path ? 'rounded-t-lg' : ''">
            <div class="border-b border-gray-300 border-dashed py-2.5 px-4 h-20 flex items-center">
                <h2 class="font-semibold">
                    {{ post.title }}
                </h2>
            </div>
            <div class="p-5">
                <div class="text-sm min-h-[120px]">
                    {{ String.prototype.substring.call(post.content_without_html, 0, 150) }} ...
                </div>
            </div>
            <div class="border-t border-gray-300 border-dashed py-2.5 px-4">
                <div class="font-light text-[9px] flex justify-between">
                    <div class="flex items-center gap-1">
                        <FolderIcon class="h-4 w-4 text-gray-500" />
                        {{ post.category }}
                    </div>
                    <div class="flex items-center gap-1">
                        <ClockIcon class="h-4 w-4 text-gray-500" />
                        {{ post.time_to_read }} read time
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