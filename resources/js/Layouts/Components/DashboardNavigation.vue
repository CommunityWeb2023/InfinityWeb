<script lang="ts" setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'

defineProps<{
  navigation: { name: string; href: string; current: boolean; target: string }[];
  pages: { name: string; href: string; current: boolean; target: string }[];
  shopNavigation: { name: string; href: string; current: boolean; target: string }[];
}>();
</script>

<template>
  <div class="hidden md:block">
    <div class="ml-10 flex items-baseline space-x-4">
      <a :href="route('dashboard')"
        class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
        :class="route().current('dashboard') ? 'bg-gray-900 text-white' : ''">Dashboard</a>
      <!-- Pages -->
      <Menu as="div" class="relative ml-3">
        <div>
          <MenuButton
            class="relative text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
            <span class="block text-sm">Pages</span>
          </MenuButton>
        </div>
        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95"
          enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75"
          leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
          <MenuItems
            class="absolute left-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <MenuItem v-for="item in pages" :key="item.name" v-slot="{ active }">
            <a :href="item.href"
              :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
            </MenuItem>
          </MenuItems>
        </transition>
      </Menu>
      <!-- Shop -->
      <Menu as="div" class="relative ml-3">
        <div>
          <MenuButton
            class="relative text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
            <span class="block text-sm">Shop</span>
          </MenuButton>
        </div>
        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95"
          enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75"
          leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
          <MenuItems
            class="absolute left-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <MenuItem v-for="item in shopNavigation" :key="item.name" v-slot="{ active }">
            <a :href="item.href"
              :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
            </MenuItem>
          </MenuItems>
        </transition>
      </Menu>
      <!-- remaining Navigation -->
      <a v-for="item in navigation" :key="item.name" :href="item.href" :target="item.target"
        :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-sm font-medium']"
        :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a>
    </div>
  </div>
</template>
