<script lang="ts" setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'

interface NavigationItem {
  name: string;
  href: string;
  current: boolean;
  active: boolean;
  dropdown: boolean;
  sub?: NavigationItem[];
}

defineProps({
  navigation: {
    type: Array as () => NavigationItem[],
    required: true,
  },
})

</script>

<template>
  <div v-for="item in navigation" class="h-20 flex">
    <a v-if="!item.dropdown" :href="item.href"
      :class="item.current ? 'border-blue-500 text-white' : 'border-transparent text-gray-200 hover:border-gray-300 hover:text-gray-100'"
      class="inline-flex items-center border-b-4 px-1 pt-1 text-sm font-medium">
      {{ item.name }}
    </a>
    <div v-else class="hidden md:flex md:flex-shrink-0 md:items-center">
      <Menu as="div" class="relative">
        <div>
          <MenuButton
            class="relative flex rounded-full text-sm focus:outline-none border-transparent text-gray-200 hover:border-gray-300 hover:text-gray-100">
            <span class="absolute -inset-1.5" />
            <span class="sr-only">Open user menu</span>
            {{ item.name }}
          </MenuButton>
        </div>
        <transition enter-active-class="transition ease-out duration-200" enter-from-class="transform opacity-0 scale-95"
          enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75"
          leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
          <MenuItems
            class="absolute right-0 z-10 mt-5 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <MenuItem v-slot="{ active }" v-for="{ name, href } in item.sub">
            <a :href="href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
              {{ name }}
            </a>
            </MenuItem>
          </MenuItems>
        </transition>
      </Menu>
    </div>
  </div>
</template>
