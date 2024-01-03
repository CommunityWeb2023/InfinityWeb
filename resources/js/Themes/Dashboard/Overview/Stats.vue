<script lang="ts" setup>
defineProps({
  stats: {
    type: Array as () => {
      name: string;
      value: string;
      change: string;
      changeType: string;
    }[],
    required: true,
  },
})
</script>

<template>
  <dl class="mx-auto grid grid-cols-1 gap-px sm:grid-cols-2 lg:grid-cols-5 -mt-10 bg-gray-900">
    <div v-for="stat in stats" :key="stat.name"
      class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 text-white px-4 py-10 sm:px-6 xl:px-8">
      <dt class="text-sm font-medium leading-6 text-gray-500">{{ stat.name }}</dt>
      <dd :class="[stat.changeType === 'negative' ? 'text-rose-600' : 'text-green-500', 'text-xs font-medium']">
        <span v-if="stat.changeType === 'negative'">-</span>
        <span v-else-if="stat.changeType === 'neutral'">+/-</span>
        <span v-else>+</span>
        {{ stat.change }}
      </dd>
      <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight">{{ stat.value }}</dd>
    </div>
  </dl>
</template>
