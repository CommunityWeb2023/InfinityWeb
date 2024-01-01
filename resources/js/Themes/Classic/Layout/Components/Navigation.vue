<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import { PlusIcon } from '@heroicons/vue/20/solid'
import {router} from "@inertiajs/vue3";
import {UserIcon} from "@heroicons/vue/24/outline/index.js";
export default {
    name: "Navigation",
    components: {
        Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems,
        Bars3Icon, BellIcon, XMarkIcon, PlusIcon, UserIcon
    },
    data(){
        return {
            navigation: [
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
                    href: route('download.index'),
                    current: route().current('download.index'),
                    active: true,
                    dropdown: true,
                    sub: [
                        {
                            name: 'Player',
                            href: route('download.index'),
                            current: route().current('download.index'),
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
            ],
            navigationAuth: [
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
            ],
        }
    },
    methods: {
        logout() {
            router.post(route('logout'))
        }
    }
}
</script>

<template>
    <Disclosure as="nav" class="bg-gray-950/80 shadow-lg h-20 sticky top-0 z-50" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 justify-between">
                <div class="flex">
                    <div class="-ml-2 mr-2 flex items-center md:hidden">
                        <!-- Mobile menu button -->
                        <DisclosureButton class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-200 hover:text-gray-100 focus:outline-none">
                            <span class="absolute -inset-0.5" />
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon v-if="!open" class="block h-6 w-6 text-gray-200" aria-hidden="true" />
                            <XMarkIcon v-else class="block h-6 w-6 text-gray-200" aria-hidden="true" />
                        </DisclosureButton>
                    </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <div v-for="item in navigation" class="h-20 flex">
                            <a v-if="!item.dropdown" :href="item.href" :class="item.current ? 'border-blue-500 text-white' : 'border-transparent text-gray-200 hover:border-gray-300 hover:text-gray-100'" class="inline-flex items-center border-b-4 px-1 pt-1 text-sm font-medium">
                                {{ item.name }}
                            </a>
                            <div v-else class="hidden md:flex md:flex-shrink-0 md:items-center">
                                <Menu as="div" class="relative">
                                    <div>
                                        <MenuButton class="relative flex rounded-full text-sm focus:outline-none border-transparent text-gray-200 hover:border-gray-300 hover:text-gray-100">
                                            <span class="absolute -inset-1.5" />
                                            <span class="sr-only">Open user menu</span>
                                            {{ item.name }}
                                        </MenuButton>
                                    </div>
                                    <transition enter-active-class="transition ease-out duration-200" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                        <MenuItems class="absolute right-0 z-10 mt-5 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <MenuItem v-slot="{ active }" v-for="item in item.sub">
                                                <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                                    {{ item.name }}
                                                </a>
                                            </MenuItem>
                                        </MenuItems>
                                    </transition>
                                </Menu>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="hidden md:ml-4 md:flex md:flex-shrink-0 md:items-center">
                        <!-- Profile dropdown -->
                        <Menu as="div" class="relative ml-3" v-if="$page.props.auth.user">
                            <div>
                                <MenuButton class="relative flex items-center rounded-full text-sm focus:outline-none border-transparent text-gray-200 hover:border-gray-300 hover:text-gray-100">
                                    <span class="absolute -inset-1.5" />
                                    <span class="sr-only">Open user menu</span>
                                    <UserIcon class="text-gray-200 mr-2 h-4 w-4" />
                                    {{ $page.props.auth.user?.username }}
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition ease-out duration-200" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute right-0 z-10 mt-7 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <MenuItem v-slot="{ active }">
                                        <a :href="route('user.index')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a :href="route('shop.index')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Shop</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a :href="route('vote.index')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Vote</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Donate</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }" v-if="$page.props.view_dashboard">
                                        <a :href="route('dashboard')" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700 font-semibold border-b border-t border-dashed']">Dashboard</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <div @click="logout" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-red-500 cursor-pointer']">Sign out</div>
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                        <div v-else class="hidden md:ml-6 md:flex md:space-x-8 h-20">
                            <div v-for="item in navigationAuth" class="h-20 flex">
                                <a v-if="!item.dropdown" :href="item.href" :class="item.current ? 'border-blue-500 text-white' : 'border-transparent text-gray-200 hover:border-gray-300 hover:text-gray-100'" class="inline-flex items-center border-b-4 px-1 pt-1 text-sm font-medium">
                                    {{ item.name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile -->
        <DisclosurePanel class="md:hidden bg-white">
            <div class="space-y-1 pb-3 pt-2">
                <DisclosureButton as="a" v-for="item in navigation" :href="item.href" :class="item.current ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'" class="block border-l-4 py-2 pl-3 pr-4 text-base font-medium sm:pl-5 sm:pr-6">
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
                    <DisclosureButton as="a" :href="route('user.index')" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">Your Profile</DisclosureButton>
                    <DisclosureButton as="a" :href="route('shop.index')" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">Shop</DisclosureButton>
                    <DisclosureButton as="a" :href="route('vote.index')" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">Vote</DisclosureButton>
                    <DisclosureButton as="a" :href="route('vote.index')" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6">Donate</DisclosureButton>
                    <DisclosureButton v-if="$page.props.view_dashboard" as="a" :href="route('dashboard')" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 sm:px-6 border-t border-b border-dashed">Dashboard</DisclosureButton>
                    <DisclosureButton as="a" href="#" class="block px-4 py-2 text-base font-medium text-red-500 hover:bg-gray-100 hover:text-red-800 sm:px-6">Sign out</DisclosureButton>
                </div>
            </div>
            <div class="border-t border-gray-200 pb-3 pt-4" v-else>
                <DisclosureButton as="a" v-for="item in navigationAuth" :href="item.href" :class="item.current ? 'bg-blue-50 border-blue-500 text-blue-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700'" class="block border-l-4 py-2 pl-3 pr-4 text-base font-medium sm:pl-5 sm:pr-6">
                    {{ item.name }}
                </DisclosureButton>
            </div>
        </DisclosurePanel>
    </Disclosure>

</template>

<style scoped>

</style>