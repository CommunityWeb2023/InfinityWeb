<script>
import {BanknotesIcon, CircleStackIcon} from "@heroicons/vue/24/outline/index.js";
import {router} from "@inertiajs/vue3";

export default {
    name: "ItemCard",
    components: {CircleStackIcon, BanknotesIcon},
    props: ['item'],
    data() {
        return {
        }
    },
    methods: {
        addToCart() {
            router.post(route('shop.add.item.to.cart'), {
                shop_item_id: this.item.id,
                quantity: 1,
            }, {
                preserveScroll: true,
                preserveState: true,
            })
        }
    },
}
</script>

<template>
    <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 border-b border-dashed">
            <img :src="item?.image" :alt="item?.image" class="w-8 h-8 mx-auto" />
        </div>
        <div class="text-sm py-3 px-2.5 border-b border-dashed">
            {{ item?.name }}
        </div>
        <div class="text-sm py-3 px-2.5 h-32 overflow-x-scroll" v-html="item?.description"></div>
        <div class="text-[10px] py-3 px-2.5 border-t border-dashed flex items-center justify-between">
            <div>
                {{ item?.amount }}x
            </div>
            <div v-if="item?.vote_points > 0" class="flex items-center gap-2">
                <CircleStackIcon class="h-4 w-4" />
                {{ item?.vote_points }}
            </div>
            <div v-if="item?.donate_points > 0" class="flex items-center gap-2">
                <BanknotesIcon class="h-4 w-4" />
                {{ item?.donate_points }}
            </div>
            <div>
                <button @click="addToCart" type="button" class="rounded bg-blue-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>