<script setup>
import {
  Bars3Icon, CalendarIcon, ChartPieIcon, DocumentDuplicateIcon, FolderIcon, ArrowDownTrayIcon, BookOpenIcon, ListBulletIcon, ScaleIcon, ChatBubbleLeftRightIcon, NewspaperIcon
} from '@heroicons/vue/24/outline'
import { MagnifyingGlassIcon } from '@heroicons/vue/20/solid'
import { Head } from "@inertiajs/vue3";
import MobileSidebar from "@/Themes/Dashboard/Layout/Components/MobileSidebar.vue";
import Sidebar from "@/Themes/Dashboard/Layout/Components/Sidebar.vue";
import Profile from "@/Themes/Dashboard/Layout/Components/Profile.vue";
import { ref } from 'vue'

defineProps({
  title: {
    type: String,
    default: 'Dashboard'
  },
  fullPage: {
    type: Boolean,
    default: false
  }
})

const sidebarOpen = ref(false);

const navigation = [
  { name: 'Dashboard', href: route('dashboard'), icon: ChartPieIcon, current: route().current('dashboard') },
  { name: 'separate' },
  {
    name: 'Sites', href: '#', icon: DocumentDuplicateIcon, current: false, dropDown: true, subNavigation:
      [
        { name: 'Post', href: route('post.index'), icon: NewspaperIcon, current: route().current('post.*') },
        { name: 'Downloads', href: '#', icon: ArrowDownTrayIcon, current: false },
        { name: 'Guides', href: '#', icon: BookOpenIcon, current: false },
        { name: 'Features', href: '#', icon: ListBulletIcon, current: false },
        { name: 'Rules', href: '#', icon: ScaleIcon, current: false },
        { name: 'FAQs', href: '#', icon: ChatBubbleLeftRightIcon, current: false },
      ]
  },
  {
    name: 'Shop', href: '#', icon: DocumentDuplicateIcon, current: false, dropDown: true, subNavigation:
      [
        { name: 'Item Database', href: route('item.index'), icon: DocumentDuplicateIcon, current: route().current('item.index') },
      ]
  },
  {
    name: 'Search', href: '#', icon: DocumentDuplicateIcon, current: false, dropDown: true, subNavigation:
      [
        { name: 'Web Accounts', href: route('search.user.index'), icon: MagnifyingGlassIcon, current: route().current('search.user.*') },
        { name: 'Accounts', href: route('item.index'), icon: MagnifyingGlassIcon, current: route().current('item.index') },
        { name: 'Characters', href: route('item.index'), icon: MagnifyingGlassIcon, current: route().current('item.index') },
        { name: 'Guilds', href: route('item.index'), icon: MagnifyingGlassIcon, current: route().current('item.index') },
      ]
  },
  { name: 'separate' },
  { name: 'Projects', href: '#', icon: FolderIcon, current: false },
  { name: 'Calendar', href: '#', icon: CalendarIcon, current: false },
  { name: 'Documents', href: '#', icon: DocumentDuplicateIcon, current: false },
  { name: 'Reports', href: '#', icon: ChartPieIcon, current: false },
]

</script>

<template>
  <div>

    <Head :title="title" />
    <MobileSidebar v-model="sidebarOpen" :navigation="navigation" />

    <!-- Static sidebar for desktop -->
    <Sidebar :navigation="navigation" />

    <div class="lg:pl-72">
      <!-- Sticky Header -->
      <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">

        <!-- Mobile Sidebar toggle -->
        <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
          <span class="sr-only">Open sidebar</span>
          <Bars3Icon class="h-6 w-6" aria-hidden="true" />
        </button>

        <Profile />
      </div>

      <main class="py-10">
        <div :class="fullPage ? '' : 'px-4 sm:px-6 lg:px-8'">
          <slot />
        </div>
      </main>

    </div>
  </div>
</template>
