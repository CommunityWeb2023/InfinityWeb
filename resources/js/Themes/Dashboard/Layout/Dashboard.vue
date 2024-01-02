<script>
import { Dialog, DialogPanel, Menu, MenuButton, MenuItem, MenuItems, TransitionChild, TransitionRoot, Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import {
    Bars3Icon,
    BellIcon,
    CalendarIcon,
    ChartPieIcon,
    FolderOpenIcon,
    Cog6ToothIcon,
    DocumentDuplicateIcon,
    FolderIcon,
    HomeIcon,
    UsersIcon,
    XMarkIcon,
    ChevronRightIcon,
    ArrowDownTrayIcon, BookOpenIcon, ListBulletIcon, KeyIcon, ScaleIcon, ChatBubbleLeftRightIcon, NewspaperIcon
} from '@heroicons/vue/24/outline'
import { ChevronDownIcon, MagnifyingGlassIcon } from '@heroicons/vue/20/solid'
import {Head} from "@inertiajs/vue3";
export default {
    name: "Dashboard",
    components: {
        Head,
        Dialog,
        DialogPanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,
        Bars3Icon,
        BellIcon,
        CalendarIcon,
        ChartPieIcon,
        Cog6ToothIcon,
        DocumentDuplicateIcon,
        FolderIcon,
        HomeIcon,
        UsersIcon,
        XMarkIcon,
        ChevronDownIcon,
        MagnifyingGlassIcon,  Disclosure, DisclosureButton, DisclosurePanel, ChevronRightIcon, FolderOpenIcon, ArrowDownTrayIcon
    },
    props: {
        title: {
            type: String,
            default: 'Dashboard'
        },
        fullPage: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            sidebarOpen: false,
            navigation: [
                { name: 'Dashboard', href: route('dashboard'), icon: ChartPieIcon, current: route().current('dashboard') },
                { name: 'separate' },
                { name: 'Sites', href: '#', icon: DocumentDuplicateIcon, current: false, dropDown: true, subNavigation: [
                        { name: 'Post', href: route('post.index'), icon: NewspaperIcon, current: route().current('post.*') },
                        { name: 'Downloads', href: '#', icon: ArrowDownTrayIcon, current: false },
                        { name: 'Guides', href: '#', icon: BookOpenIcon, current: false },
                        { name: 'Features', href: '#', icon: ListBulletIcon, current: false },
                        { name: 'Rules', href: '#', icon: ScaleIcon, current: false },
                        { name: 'FAQs', href: '#', icon: ChatBubbleLeftRightIcon, current: false },
                    ]
                },
                { name: 'Shop', href: '#', icon: DocumentDuplicateIcon, current: false, dropDown: true, subNavigation: [
                        { name: 'Item Database', href: route('item.index'), icon: DocumentDuplicateIcon, current: route().current('item.index') },
                    ]
                },
                { name: 'Search', href: '#', icon: DocumentDuplicateIcon, current: false, dropDown: true, subNavigation: [
                        { name: 'Web Accounts', href: route('item.index'), icon: MagnifyingGlassIcon, current: route().current('item.index') },
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
            ],
            userNavigation: [
                { name: 'Your profile', href: '#' },
                { name: 'Sign out', href: '#', click: this.logout },
            ]
        }
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        }
    },
}
</script>

<template>
    <div>
        <Head :title="title" />
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="relative z-50 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-900/80" />
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                        <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
                            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                                    <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>
                            <!-- Sidebar component, swap this element with another sidebar if you like -->
                            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4 ring-1 ring-white/10">
                                <div class="flex h-16 shrink-0 items-center justify-center">
                                    <h1 class="font-bold text-white">
                                        Infinity<span class="font-light text-gray-400">Admin</span>
                                    </h1>
                                </div>
                                <nav class="flex flex-1 flex-col">
                                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                        <li>
                                            <ul role="list" class="-mx-2 space-y-1">
                                                <li v-for="item in navigation" :key="item.name">
                                                    <a v-if="!item.dropDown && item.name !== 'separate'" :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                                        <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                                                        {{ item.name }}
                                                    </a>
                                                    <Disclosure as="div" v-else-if="item.name !== 'separate'" v-slot="{ open }">
                                                        <DisclosureButton :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold w-full']">
                                                            <FolderIcon class="h-5 w-5 shrink-0 text-gray-400" v-if="!open" aria-hidden="true" />
                                                            <FolderOpenIcon class="h-5 w-5 shrink-0 text-gray-300" v-else aria-hidden="true" />
                                                            {{ item.name }}
                                                        </DisclosureButton>
                                                        <DisclosurePanel as="ul" class="mt-1 px-2">
                                                            <li v-for="subItem in item.subNavigation" :key="subItem.name">
                                                                <DisclosureButton as="a" :href="subItem.href" :class="[subItem.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-2 rounded-md py-2 pr-2 pl-3 items-center text-sm leading-6 font-semibold']">
                                                                    <component :is="subItem.icon" class="h-5 w-5 shrink-0" aria-hidden="true" />
                                                                    {{ subItem.name }}
                                                                </DisclosureButton>
                                                            </li>
                                                        </DisclosurePanel>
                                                    </Disclosure>
                                                    <div v-else class="border border-dashed border-gray-700 my-2"></div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mt-auto">
                                            <a href="#" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
                                                <Cog6ToothIcon class="h-6 w-6 shrink-0" aria-hidden="true" />
                                                Settings
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4">
                <div class="flex h-16 shrink-0 items-center justify-center">
                    <h1 class="font-bold text-white">
                        Infinity<span class="font-light text-gray-400">Admin</span>
                    </h1>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li v-for="item in navigation" :key="item.name">
                                    <a v-if="!item.dropDown && item.name !== 'separate'" :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                        <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                    <Disclosure as="div" v-else-if="item.name !== 'separate'" v-slot="{ open }" :default-open="item.subNavigation.some(subItem => subItem.current)">
                                        <DisclosureButton :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold w-full']">
                                            <FolderIcon class="h-5 w-5 shrink-0 text-gray-400" v-if="!open" aria-hidden="true" />
                                            <FolderOpenIcon class="h-5 w-5 shrink-0 text-gray-300" v-else aria-hidden="true" />
                                            {{ item.name }}
                                        </DisclosureButton>
                                        <DisclosurePanel as="ul" class="mt-1 px-2">
                                            <li v-for="subItem in item.subNavigation" :key="subItem.name">
                                                <DisclosureButton as="a" :href="subItem.href" :class="[subItem.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-2 rounded-md py-2 pr-2 pl-3 items-center text-sm leading-6 font-semibold']">
                                                    <component :is="subItem.icon" class="h-5 w-5 shrink-0" aria-hidden="true" />
                                                    {{ subItem.name }}
                                                </DisclosureButton>
                                            </li>
                                        </DisclosurePanel>
                                    </Disclosure>
                                    <div v-else class="border border-dashed border-gray-700 my-2"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="mt-auto">
                            <a :href="route('setting.index')" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
                                <Cog6ToothIcon class="h-6 w-6 shrink-0" aria-hidden="true" />
                                Settings
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:pl-72">
            <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                </button>

                <!-- Separator -->
                <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true" />

                <div class="flex flex-1 gap-x-4 self-stretch justify-end lg:gap-x-6">
                    <div class="flex items-center justify-end gap-x-4 lg:gap-x-6">
                        <!-- Separator -->
                        <!-- Profile dropdown -->
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
                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                                    <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                                        <a :href="item.href" @click="item.click" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">{{ item.name }}</a>
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>
            </div>

            <main class="py-10">
                <div :class="fullPage ? '' : 'px-4 sm:px-6 lg:px-8'">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>

<style scoped>

</style>