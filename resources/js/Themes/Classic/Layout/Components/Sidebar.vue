<script>
export default {
    name: "Sidebar"
}
</script>

<template>
    <div class="bg-white rounded-lg shadow-md border border-gray-50">
        <div class="border-b border-gray-300 border-dashed py-2.5 px-4">
            <h2 class="font-semibold">
                Information
            </h2>
        </div>
        <div class="p-5 text-xs">
            <div class="divide divide-y-1">
                <div class="flex items-center justify-between px-2 py-2">
                    <div>Peak</div>
                    <div>0</div>
                </div>
                <div class="flex items-center justify-between px-2 py-2">
                    <div>Online</div>
                    <div>0</div>
                </div>
                <div class="flex items-center justify-between px-2 py-2">
                    <div>Status</div>
                    <div><span class="text-red-500">Offline</span></div>
                </div>
            </div>

            <span class="p-2"></span>

            <div class="divide divide-y-1">
                <div class="flex items-center justify-between px-2 py-2">
                    <div>EXP</div>
                    <div>{{ $page.props.exp }}x</div>
                </div>
                <div class="flex items-center justify-between px-2 py-2">
                    <div>PENYA</div>
                    <div>{{ $page.props.penya }}x</div>
                </div>
                <div class="flex items-center justify-between px-2 py-2">
                    <div>DROP</div>
                    <div>{{ $page.props.drop }}x</div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>