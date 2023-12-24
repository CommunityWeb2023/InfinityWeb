<script setup>
import SectionTitle from './SectionTitle.vue';
</script>

<template>
    <div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
                <slot name="content" />
            </div>
        </div>
    </div>
</template>
