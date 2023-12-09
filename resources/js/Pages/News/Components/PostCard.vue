<script>
import { EyeIcon} from "@heroicons/vue/24/outline/index.js";

export default {
    name: "PostCard",
    components: {
        EyeIcon
    },
    props: [
        'post'
    ],
    data(){
        return {
            imgSrc: 'https://source.unsplash.com/featured/?fantasy,' + this.post.id,
        }
    },
}
</script>

<template>
    <div class="bg-white rounded-lg shadow-md">
        <div v-if="imgSrc" class="relative overflow-hidden">
            <div class="group-hover:block hidden absolute h-48 w-full">
                <div class="flex items-center justify-center h-48">
                    <EyeIcon class="w-10 text-white" />
                </div>
            </div>
            <img :src="imgSrc" v-if="imgSrc" class="rounded-t-lg h-48 w-full object-cover group-hover:scale-125 transition ease-in-out duration-300 group-hover:opacity-75" alt="" >
            <div class="absolute right-3 top-3" >
                <div class="text-xs py-0.5 px-1.5 rounded-full" :class="post.category.bgColor">
                    <span :class="post.category.textColor">{{ post.category.name }}</span>
                </div>
            </div>

        </div>
        <div class="border border-gray-50" :class="!imgSrc ? 'rounded-t-lg' : ''">
            <div class="border-b border-gray-300 border-dashed py-2.5 px-4">
                <h2 class="font-semibold">
                    {{ post.title }}
                </h2>
            </div>
            <div class="p-5">
                <div class="text-sm">
                    {{ String.prototype.substring.call(post.content, 0, 150) }} ...
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>