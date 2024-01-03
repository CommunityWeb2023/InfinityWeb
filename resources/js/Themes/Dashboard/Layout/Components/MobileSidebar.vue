<script lang="ts" setup>
import { Dialog, DialogPanel, TransitionChild, TransitionRoot, Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { FolderOpenIcon, Cog6ToothIcon, GlobeAltIcon, FolderIcon, XMarkIcon, } from '@heroicons/vue/24/outline'

interface NavigationItem {
  name: string;
  href: string;
  icon: string;
  current: boolean;
  dropDown: boolean;
  subNavigation?: NavigationItem[];
}

const sidebarOpen = defineModel({ type: Boolean, default: false });

defineProps({
  navigation: {
    type: Array as () => NavigationItem[],
    required: true,
  },
})

</script>

<template>
  <TransitionRoot as="template" :show="sidebarOpen">
    <Dialog as="div" class="relative z-50 lg:hidden" @close="sidebarOpen = false">
      <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0"
        enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100"
        leave-to="opacity-0">
        <div class="fixed inset-0 bg-gray-900/80" />
      </TransitionChild>

      <div class="fixed inset-0 flex">
        <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
          enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform"
          leave-from="translate-x-0" leave-to="-translate-x-full">
          <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
              leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
              <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                  <span class="sr-only">Close sidebar</span>
                  <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                </button>
              </div>
            </TransitionChild>
            <!-- Mobile Sidebar component -->
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
                        <a v-if="!item.dropDown && item.name !== 'separate'" :href="item.href"
                          :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                          <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                          {{ item.name }}
                        </a>
                        <Disclosure as="div" v-else-if="item.name !== 'separate'" v-slot="{ open }">
                          <DisclosureButton
                            :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold w-full']">
                            <FolderIcon class="h-5 w-5 shrink-0 text-gray-400" v-if="!open" aria-hidden="true" />
                            <FolderOpenIcon class="h-5 w-5 shrink-0 text-gray-300" v-else aria-hidden="true" />
                            {{ item.name }}
                          </DisclosureButton>
                          <DisclosurePanel as="ul" class="mt-1 px-2">
                      <li v-for="subItem in item.subNavigation" :key="subItem.name">
                        <DisclosureButton as="a" :href="subItem.href"
                          :class="[subItem.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-2 rounded-md py-2 pr-2 pl-3 items-center text-sm leading-6 font-semibold']">
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
                  <a :href="route('home')"
                    class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
                    <GlobeAltIcon class="h-6 w-6 shrink-0" aria-hidden="true" />
                    Website
                  </a>
                  <a :href="route('setting.index')"
                    class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
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
</template>
