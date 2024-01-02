<script lang="ts" setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { usePage } from "@inertiajs/vue3";

defineProps<{
  userNavigation: { name: string; href: string; current: boolean; target: string; click: () => void }[];
}>();
</script>

<template>
  <div class="hidden md:block">
    <div class="ml-4 flex items-center md:ml-6">
      <!-- Profile dropdown -->
      <Menu as="div" class="relative ml-3">
        <div>
          <MenuButton
            class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5" />
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" :src="usePage().props?.auth?.user.profile_photo_url" alt="" />
          </MenuButton>
        </div>
        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95"
          enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75"
          leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
          <MenuItems
            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
            <a :href="item.href" @click="item.click"
              :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{
                item.name }}</a>
            </MenuItem>
          </MenuItems>
        </transition>
      </Menu>
    </div>
  </div>
</template>
