<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import Navigation from '@/Themes/Classic/Layout/Components/Navigation.vue'
import ProfileDropdown from '@/Themes/Classic/Layout/Components/ProfileDropdown.vue';
import MobileNavigation from './MobileNavigation.vue';

const navigation = [
  {
    name: 'Home',
    href: route('home'),
    current: route().current('home'),
    active: true,
    dropdown: false,
  },
  {
    name: 'Downloads',
    href: route('download.index'),
    current: route().current('download.index'),
    active: true,
    dropdown: false,
  },
  {
    name: 'Ranking',
    href: route('ranking.players'),
    current: route().current('ranking.players'),
    active: true,
    dropdown: true,
    sub: [
      {
        name: 'Player',
        href: route('ranking.players'),
        current: route().current('ranking.players'),
        active: true,
      },
      {
        name: 'Guilds',
        href: route('download.index'),
        current: route().current('download.index'),
        active: true,
      },
    ]
  },
  {
    name: 'Guides',
    href: route('guides.index'),
    current: route().current('guides.index'),
    active: true,
    dropdown: false,
  },
  {
    name: 'FAQ',
    href: route('faq.index'),
    current: route().current('faq.index'),
    active: true,
    dropdown: false,
  },
  {
    name: 'Features',
    href: route('features.index'),
    current: route().current('features.index'),
    active: true,
    dropdown: false,
  },
  {
    name: 'Team',
    href: route('team.index'),
    current: route().current('team.index'),
    active: true,
    dropdown: false,
  },
]

const navigationAuth = [
  {
    name: 'Login',
    href: route('login'),
    current: route().current('login'),
    active: true,
    dropdown: false,
  },
  {
    name: 'Register',
    href: route('register'),
    current: route().current('register'),
    active: true,
    dropdown: false,
  },
]

</script>

<template>
  <Disclosure as="nav" class="bg-gray-950/80 shadow-lg h-20 sticky top-0 z-50" v-slot="{ open }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-20 justify-between">
        <div class="flex">
          <div class="-ml-2 mr-2 flex items-center md:hidden">
            <!-- Mobile menu button -->
            <DisclosureButton
              class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-200 hover:text-gray-100 focus:outline-none">
              <span class="absolute -inset-0.5" />
              <span class="sr-only">Open main menu</span>
              <Bars3Icon v-if="!open" class="block h-6 w-6 text-gray-200" aria-hidden="true" />
              <XMarkIcon v-else class="block h-6 w-6 text-gray-200" aria-hidden="true" />
            </DisclosureButton>
          </div>
          <!-- Navigation -->
          <div class="hidden md:ml-6 md:flex md:space-x-8">
            <!-- vue 3.4 new v-bind short Syntax -->
            <Navigation :navigation />
          </div>
        </div>
        <div class="hidden md:ml-4 md:flex md:flex-shrink-0 md:items-center">
          <!-- vue 3.4 new v-bind short Syntax -->
          <ProfileDropdown :navigationAuth />
        </div>
      </div>
    </div>
    <!-- mobile -->
    <MobileNavigation :navigation :navigationAuth />
  </Disclosure>
</template>

<style scoped>
</style>
