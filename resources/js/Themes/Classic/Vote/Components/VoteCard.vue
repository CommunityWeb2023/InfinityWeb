<script>
import TagComponent from "@/Components/Global/TagComponent.vue";
import {CircleStackIcon, ClockIcon} from "@heroicons/vue/24/outline/index.js";
import {usePage} from "@inertiajs/vue3";

export default {
    name: "VoteCard",
    components: {
        TagComponent,
        CircleStackIcon, ClockIcon
    },
    props: ['vote'],
    computed: {
        voteUrl() {
            const url = this.vote.url;
            if (this.$page.props.maintenance) {
                return '#';
            }
            if (this.vote.need_username) {
                return url + '&' + this.vote.url_parameter + '=' + usePage().props.auth.user.username + ',' + this.vote.id;
            } else {
                return url;
            }


        }
    }
}
</script>

<template>
    <div >
        <a :href="voteUrl" class="group" :target="$page.props.maintenance ? '' : '_blank'" :class="$page.props.maintenance ? 'cursor-not-allowed' : ''">
            <div class="bg-white rounded-lg shadow-md">
                <div class="relative overflow-hidden">
                    <img :src="vote.image" class=" h-24 w-full object-cover group-hover:scale-125 transition ease-in-out duration-300 group-hover:opacity-75" alt="" >
                </div>
                <div class="border border-gray-50" :class="!vote.image ? 'rounded-t-lg' : ''">
                    <div class="border-b border-gray-300 border-dashed py-2.5 px-4">
                        <h2 class="font-semibold text-center">
                            {{ vote.site }}
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="text-sm">
                            {{ vote.description }}
                        </div>
                    </div>
                    <div class="border-t border-gray-300 border-dashed py-2.5 px-4">
                        <div class="font-light text-xs flex justify-center">
                            <div class="flex items-center gap-1">
                                <CircleStackIcon class="h-4 w-4 text-orange-500" />
                                Points: {{ vote.votepoints }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</template>

<style scoped>

</style>