<script>
import {XCircleIcon} from "@heroicons/vue/24/outline/index.js";
import {router} from "@inertiajs/vue3";

export default {
    name: "CartItem",
    components: {XCircleIcon},
    props: ['item'],
    methods: {
        removeFromCart() {
            router.delete(route('shop.remove.item.from.cart', this.item.id),{
                preserveScroll: true,
                preserveState: true,
            })
        }
    }
}
</script>

<template>
    <div class="flex items-center justify-between gap-2 group">
        <div class="flex items-center gap-2">
            <div>
                <img :src="item.shop_item.image" :alt="item.shop_item.image" class="w-5 h-5 mx-auto" />
            </div>
            <div class="text-xs">
                {{ item.shop_item.name }}
            </div>
        </div>
        <div class="flex items-center gap-2">
            <div class="text-xs">
                {{ item.quantity }}x
            </div>
            <div>
                <XCircleIcon @click="removeFromCart" class="h-4 w-4 hidden group-hover:block group-hover:text-red-600 cursor-pointer"  />
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>