<script>
export default {
    name: "Footer"
}
</script>

<template>
    <footer class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center space-x-6 md:order-2">
                <!-- Social Media Buttons -->
            </div>
            <div class="mt-8 md:order-1 md:mt-0">
                <p class="text-center text-xs leading-5 text-gray-200">&copy; {{ new Date().getFullYear() }} <span class="font-bold">{{ $page.props.server_name }}</span>. All rights reserved.</p>
            </div>
        </div>
    </footer>
</template>

<style scoped>

</style>