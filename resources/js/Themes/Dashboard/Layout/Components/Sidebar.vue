<script lang="ts" setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { FolderOpenIcon, Cog6ToothIcon, FolderIcon } from '@heroicons/vue/24/outline'

interface NavigationItem {
  name: string;
  href: string;
  icon: string;
  current: boolean;
  dropDown: boolean;
  subNavigation?: NavigationItem[];
}

defineProps({
  navigation: {
    type: Array as () => NavigationItem[],
    required: true,
  },
})
</script>

<template>
  <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
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
                <a v-if="!item.dropDown && item.name !== 'separate'" :href="item.href"
                  :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                  <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                  {{ item.name }}
                </a>
                <Disclosure as="div" v-else-if="item.name !== 'separate'" v-slot="{ open }"
                  :default-open="item.subNavigation.some(subItem => subItem.current)">
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
          <a :href="route('setting.index')"
            class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
            <Cog6ToothIcon class="h-6 w-6 shrink-0" aria-hidden="true" />
            Settings
          </a>
        </li>
        </ul>
      </nav>
    </div>
  </div>
</template>
