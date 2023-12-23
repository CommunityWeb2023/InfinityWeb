<script>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ShieldExclamationIcon } from '@heroicons/vue/24/outline'
export default {
    name: "DemoLogin",
    components: {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot, ShieldExclamationIcon},
    data() {
        return {
            open: true
        }
    },
    emits: ['loginAs'],
}
</script>

<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                            <div>
                                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-orange-100">
                                    <ShieldExclamationIcon class="h-6 w-6 text-orange-600" aria-hidden="true" />
                                </div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">Welcome to our website</DialogTitle>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Demo mode is currently activated on this website. Therefore we offer the possibility to log in directly with a previous user to test the different views.
                                            If you do not want to do this, simply click outside this window
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-6">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                    <button @click="$emit('loginAs', 'admin')" type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                        Admin
                                    </button>
                                    <button @click="$emit('loginAs', 'gamemaster')" type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                        Gamemaster
                                    </button>
                                    <button @click="$emit('loginAs', 'support')" type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                        Support
                                    </button>
                                    <button @click="$emit('loginAs', 'user')" type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                        User
                                    </button>
                                </div>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<style scoped>

</style>