<script lang="ts" setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/24/outline'
import { router } from '@inertiajs/vue3';

const logout = () => {
  router.post(route('logout'), {
  }, {
    preserveState: false,
  });
}

const userNavigation = [
  { name: 'Your profile', href: '#' },
  { name: 'Sign out', href: '#', click: logout },
]
</script>

<template>
  <div class="flex flex-1 justify-end">
    <Menu as="div" class="relative">
      <MenuButton class="-m-1.5 flex items-center p-1.5">
        <span class="sr-only">Open user menu</span>
        <img class="h-8 w-8 rounded-full bg-gray-50" :src="$page.props.auth.user.profile_photo_url" alt="" />
        <span class="hidden lg:flex lg:items-center">
          <span class="ml-4 text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">
            {{ $page.props.auth.user.username }}
          </span>
          <ChevronDownIcon class="ml-2 h-5 w-5 text-gray-400" aria-hidden="true" />
        </span>
      </MenuButton>
      <!-- Profile dropdown -->
      <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75"
        leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
        <MenuItems
          class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
          <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
          <a v-if="item.name === 'Sign out'" :href="item.href" @click="item.click"
            :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 hover:text-red-800']">
            {{ item.name }}
          </a>
          <a v-else :href="item.href" @click="item.click"
            :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-900']">
            {{ item.name }}
          </a>
          </MenuItem>
        </MenuItems>
      </transition>
    </Menu>
  </div>
</template>
