<script>
import {ExclamationTriangleIcon} from "@heroicons/vue/24/outline/index.js";
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from "@headlessui/vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "CreateAccountModal",
    components: {
        Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot, ExclamationTriangleIcon
    },
    data() {
        return {
            open: true,
            newAccount: useForm({
                account: '',
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        createAccount() {
            this.newAccount.post(route('user.create.account'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$emit('close');
                }
            });
        }
    },
    emits: ['close'],
}
</script>

<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="$emit('close')">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                            <div class="">
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">
                                        Create Account
                                    </DialogTitle>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500 mb-4">
                                            Are you sure you want to create an account?
                                        </p>

                                        <div class="mb-2">
                                            <label for="account" class="block text-sm font-medium w-full leading-6 text-gray-900">Account Name</label>
                                            <div class="mt-2">
                                                <input type="text" v-model="newAccount.account" name="account" id="account" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" autocomplete="false" autofocus="autofocus"/>
                                                <div v-show="newAccount.errors.account" class="mt-1 text-xs text-red-500">
                                                    {{ newAccount.errors.account }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                            <div class="mt-2">
                                                <input type="password" v-model="newAccount.password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                <div v-show="newAccount.errors.password" class="mt-1 text-xs text-red-500">
                                                    {{ newAccount.errors.password }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                                            <div class="mt-2">
                                                <input type="password" v-model="newAccount.password_confirmation" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                                <div v-show="newAccount.errors.password_confirmation" class="mt-1 text-xs text-red-500">
                                                    {{ newAccount.errors.password_confirmation }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-between mt-5">
                                        <button type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-light text-white shadow-sm hover:bg-blue-500 sm:w-auto" @click="createAccount">Yes, create</button>
                                        <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-light text-white shadow-sm hover:bg-red-500 sm:w-auto" @click="$emit('close')" >Cancel</button>
                                    </div>
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