<script>
export default {
    name: "StandardCard",
    props: [
        'cardHeader'
    ]
}
</script>

<template>
    <div class="bg-white rounded-lg shadow-md border border-gray-50">
        <div class="border-b border-gray-300 border-dashed py-2.5 px-4">
            <h2 class="font-semibold">
                {{ cardHeader }}
            </h2>
        </div>
        <div class="p-5">
            <slot>

            </slot>
        </div>
    </div>
</template>

<style scoped>

</style>