<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import {Head, router, usePage} from "@inertiajs/vue3";

const user = {
    name: 'Tom Cook',
    email: 'tom@example.com',
    imageUrl: usePage().props?.auth?.user.profile_photo_url,
}
const navigation = [
    { name: 'Search', href: '#', current: false },
    { name: 'Tickets', href: '#', current: false },
    { name: 'Donates', href: '#', current: false },
    { name: 'Payments', href: '#', current: false },
    { name: 'Vote', href: '#', current: false },
    { name: 'Settings', href: route('setting.index'), current: route().current('setting*') },
    { name: 'Website', href: route('home'), target: '_blank', current: false },
]

const pages = [
    { name: 'Posts', href: route('post.index'), current: true },
    { name: 'Downloads', href: '#', current: false },
    { name: 'Guides', href: '#', current: false },
    { name: 'FAQs', href: '#', current: false },
]

const shopNavigation = [
    { name: 'Item Database', href: route('item.index'), current: true },
    { name: 'Shop Items', href: '#', current: false },
    { name: 'Shop Category', href: '#', current: false },
]

let logout = () => {
    router.post(route('logout'), {
    }, {
        preserveState: false,
    });
}
const userNavigation = [
    { name: 'Your Profile', href: '#' },
    { name: 'Settings', href: '#' },
    { name: 'Sign out', href: '#', click: logout },
]
export default {
    name: "DashboardLayout",
    methods: {
        usePage,
        logout(){
            router.post(route('logout'), {
            }, {
                preserveState: false,
            });
        },
    },
    props: ['title'],
    components: {
        Head,
        Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems,
        Bars3Icon, BellIcon, XMarkIcon
    },
    data() {
        return {
            user,
            navigation,
            userNavigation,
            pages,
            shopNavigation
        }
    },
}
</script>

<template>
    <Head :title="title" />
    <div class="min-h-full">
        <div class="bg-gray-800 pb-32">
            <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="border-b border-gray-700">
                        <div class="flex h-16 items-center justify-between px-4 sm:px-0">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" />
                                </div>
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <a :href="route('dashboard')" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" :class="route().current('dashboard') ? 'bg-gray-900 text-white' : ''">Dashboard</a>
                                        <Menu as="div" class="relative ml-3">
                                            <div>
                                                <MenuButton class="relative text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                                    <span class="block text-sm">Pages</span>
                                                </MenuButton>
                                            </div>
                                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                                <MenuItems class="absolute left-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                    <MenuItem v-for="item in pages" :key="item.name" v-slot="{ active }">
                                                        <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                                                    </MenuItem>
                                                </MenuItems>
                                            </transition>
                                        </Menu>
                                        <Menu as="div" class="relative ml-3">
                                            <div>
                                                <MenuButton class="relative text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                                    <span class="block text-sm">Shop</span>
                                                </MenuButton>
                                            </div>
                                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                                <MenuItems class="absolute left-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                    <MenuItem v-for="item in shopNavigation" :key="item.name" v-slot="{ active }">
                                                        <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                                                    </MenuItem>
                                                </MenuItems>
                                            </transition>
                                        </Menu>
                                        <a v-for="item in navigation" :key="item.name" :href="item.href"  :target="item.target" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-4 flex items-center md:ml-6">
                                    <!-- Profile dropdown -->
                                    <Menu as="div" class="relative ml-3">
                                        <div>
                                            <MenuButton class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                                <span class="absolute -inset-1.5" />
                                                <span class="sr-only">Open user menu</span>
                                                <img class="h-8 w-8 rounded-full" :src="usePage().props?.auth?.user.profile_photo_url" alt="" />
                                            </MenuButton>
                                        </div>
                                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                            <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                                                    <a :href="item.href" @click="item.click" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                                                </MenuItem>
                                            </MenuItems>
                                        </transition>
                                    </Menu>
                                </div>
                            </div>
                            <div class="-mr-2 flex md:hidden">
                                <!-- Mobile menu button -->
                                <DisclosureButton class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="absolute -inset-0.5" />
                                    <span class="sr-only">Open main menu</span>
                                    <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                                    <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
                                </DisclosureButton>
                            </div>
                        </div>
                    </div>
                </div>

                <DisclosurePanel class="border-b border-gray-700 md:hidden">
                    <div class="space-y-1 px-2 py-3 sm:px-3">
                        <DisclosureButton v-for="item in pages" :key="item.name" as="a" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block rounded-md px-3 py-2 text-base font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
                        <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block rounded-md px-3 py-2 text-base font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
                    </div>
                    <div class="border-t border-gray-700 pb-3 pt-4">
                        <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" :src="usePage().props?.auth?.user.profile_photo_url" alt="" />
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium leading-none text-white">{{ usePage().props?.auth?.user.username }}</div>
                                <div class="text-sm font-medium leading-none text-gray-400">{{ usePage().props?.auth?.user.email }}</div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-1 px-2">
                            <DisclosureButton v-for="item in userNavigation"  @click="item.click" :key="item.name" as="a" :href="item.href" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">{{ item.name }}</DisclosureButton>
                        </div>
                    </div>
                </DisclosurePanel>
            </Disclosure>
            <header class="py-10">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-white">
                        {{ title }}
                    </h1>
                </div>
            </header>
        </div>

        <main class="-mt-32">
            <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-white px-5 py-6 shadow sm:px-6">
                    <slot />
                </div>
            </div>
        </main>
    </div>
</template>

<style scoped>

</style>