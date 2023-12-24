<script>
import {FingerPrintIcon} from "@heroicons/vue/24/outline/index.js";

export default {
    name: "CookieConsentButton",
    components: {
        FingerPrintIcon
    }
}
</script>

<template>
    <div class="w-12 h-12 fixed bottom-5 right-5 rounded-full bg-gray-900 flex items-center justify-center shadow-lg hover:shadow-2xl hover:bg-gray-700 transition-all duration-300">
        <button type="button" data-cc="show-preferencesModal">
            <FingerPrintIcon class="h-8 w-8 text-white"/>
        </button>
    </div>
</template>

<style scoped>

</style>