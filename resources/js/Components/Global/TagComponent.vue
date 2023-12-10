<script>
export default {
    name: "TagComponent",
    props: ['bgColor', 'color', 'text'],
    components: {
    },
    computed: {
        backgroundColor() {
            return `${this.bgColor}`;
        }
    },
}
</script>

<template>
    <div :class="backgroundColor" class="rounded-full">
        <div class="text-xs py-0.5 px-1.5 rounded-full">
            <span :class="color">{{ text }}</span>
        </div>
    </div>

</template>

<style scoped>

</style>