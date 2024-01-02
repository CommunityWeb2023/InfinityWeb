<script lang="ts" setup>
import { DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { router } from "@inertiajs/vue3";

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
  <DisclosurePanel class="md:hidden bg-white">
    <div class="space-y-1 pb-3 pt-2">
      <DisclosureButton as="a" v-for="item in navigation" :href="item.href"
        :class="item.current ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'"
        class="block border-l-4 py-2 pl-3 pr-4 text-base font-medium sm:pl-5 sm:pr-6">
        {{ item.name }}
      </DisclosureButton>
      <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
    </div>
    <div class="border-t border-gray-200 pb-3 pt-4" v-if="$page.props.auth.user">
      <div class="flex items-center px-4 sm:px-6">
        <div class="">
          <div class="text-base font-medium text-gray-800">
            {{ $page.props.auth.user?.username }}
          </div>
        </div>
      </div>
      <div class="mt-3 space-y-1">
        <a :href="route('user.index')"
          class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">
          Your Profile
        </a>
        <a :href="route('shop.index')"
          class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">
          Shop
        </a>
        <a :href="route('vote.index')"
          class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">
          Vote
        </a>
        <a :href="route('vote.index')"
          class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">
          Donate
        </a>
        <a v-if="$page.props.view_dashboard" :href="route('dashboard')"
          class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6 border-t border-b border-dashed">
          Dashboard
        </a>
        <div @click="logout"
          class="block px-4 py-2 text-base text-red-500 hover:bg-gray-100 hover:text-red-800 cursor-pointer sm:px-6">
          Sign out
        </div>

      </div>
    </div>
    <div class="border-t border-gray-200 pb-3 pt-4" v-else>
      <DisclosureButton as="a" v-for="item in navigationAuth" :href="item.href"
        :class="item.current ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'"
        class="block border-l-4 py-2 pl-3 pr-4 text-base font-medium sm:pl-5 sm:pr-6">
        {{ item.name }}
      </DisclosureButton>
    </div>
  </DisclosurePanel>
</template>
