<script lang="ts" setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { UserIcon } from "@heroicons/vue/24/outline/index.js";
import { router } from "@inertiajs/vue3";

interface NavigationItem {
  name: string;
  href: string;
  current: boolean;
  active: boolean;
  dropdown: boolean;
}

defineProps({
  navigationAuth: {
    type: Array as () => NavigationItem[],
    required: true,
  },
})

function logout() {
  router.post(route('logout'))
}
</script>

<template>
  <!-- logged in -->
  <Menu as="div" class="relative ml-3" v-if="$page.props.auth.user">
    <MenuButton
      class="relative flex items-center rounded-full text-sm focus:outline-none border-transparent text-gray-200 hover:border-gray-300 hover:text-gray-100">
      <span class="absolute -inset-1.5" />
      <span class="sr-only">Open user menu</span>
      <UserIcon class="text-gray-200 mr-2 h-4 w-4" />
      {{ $page.props.auth.user?.username }}
    </MenuButton>
    <transition enter-active-class="transition ease-out duration-200" enter-from-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75"
      leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
      <MenuItems
        class="absolute right-0 z-10 mt-7 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
        <MenuItem v-slot="{ active }">
        <a :href="route('user.index')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
          Your Profile
        </a>
        </MenuItem>
        <MenuItem v-slot="{ active }">
        <a :href="route('shop.index')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
          Shop
        </a>
        </MenuItem>
        <MenuItem v-slot="{ active }">
        <a :href="route('vote.index')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
          Vote
        </a>
        </MenuItem>
        <MenuItem v-slot="{ active }">
        <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
          Donate
        </a>
        </MenuItem>
        <MenuItem v-slot="{ active }" v-if="$page.props.view_dashboard">
        <a :href="route('dashboard')"
          :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700 font-semibold border-b border-t border-dashed']">
          Dashboard
        </a>
        </MenuItem>
        <MenuItem v-slot="{ active }">
        <div @click="logout"
          :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 hover:text-red-800 cursor-pointer']">
          Sign out
        </div>
        </MenuItem>
      </MenuItems>
    </transition>
  </Menu>
  <!-- logged out -->
  <div v-else class="hidden md:ml-6 md:flex md:space-x-8 h-20">
    <div v-for="item in navigationAuth" class="h-20 flex">
      <a v-if="!item.dropdown" :href="item.href"
        :class="item.current ? 'border-blue-500 text-white' : 'border-transparent text-gray-200 hover:border-gray-300 hover:text-gray-100'"
        class="inline-flex items-center border-b-4 px-1 pt-1 text-sm font-medium">
        {{ item.name }}
      </a>
    </div>
  </div>
</template>
