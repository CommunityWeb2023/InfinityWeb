<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
        required: false,
        default: true,
    },
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const loginAs = (type) => {
    switch (type) {
        case 'admin':
            form.email = 'admin@community-web.eu';
            form.password = 'Password1234!?';
            break;
        case 'gamemaster':
            form.email = 'gamemaster@community-web.eu';
            form.password = 'Password1234!?';
            break;
        case 'support':
            form.email = 'support@community-web.eu';
            form.password = 'Password1234!?';
            break;
        case 'user':
            form.email = 'user@community-web.eu';
            form.password = 'Password1234!?';
            break;
    }
    submit();
}
</script>

<template>
   <AppLayout :has-sidebar="false">
       <Head title="Log in" />

       <AuthenticationCard>
           <template #logo>
               <AuthenticationCardLogo />
           </template>

           <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
               {{ status }}
           </div>

           <form @submit.prevent="submit">

               <div v-if="$page.props.isDemo" class="mb-3">
                   <h3 class="font-light mb-2">Login as:</h3>
                   <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                       <button @click="loginAs('admin')" type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                           Admin
                       </button>
                       <button @click="loginAs('gamemaster')" type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                           Gamemaster
                       </button>
                       <button @click="loginAs('support')" type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                           Support
                       </button>
                       <button @click="loginAs('user')" type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-light text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                           User
                       </button>
                   </div>
               </div>

               <div>
                   <InputLabel for="email" value="Email" />
                   <TextInput
                       id="email"
                       v-model="form.email"
                       type="email"
                       class="mt-1 block w-full"
                       required
                       autofocus
                       autocomplete="username"
                   />
                   <InputError class="mt-2" :message="form.errors.email" />
               </div>

               <div class="mt-4">
                   <InputLabel for="password" value="Password" />
                   <TextInput
                       id="password"
                       v-model="form.password"
                       type="password"
                       class="mt-1 block w-full"
                       required
                       autocomplete="current-password"
                   />
                   <InputError class="mt-2" :message="form.errors.password" />
               </div>

               <div class="block mt-4">
                   <label class="flex items-center">
                       <Checkbox v-model:checked="form.remember" name="remember" />
                       <span class="ms-2 text-sm text-gray-600">Remember me</span>
                   </label>
               </div>

               <div class="flex items-center justify-end mt-4">
                   <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                       Forgot your password?
                   </Link>

                   <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                       Log in
                   </PrimaryButton>
               </div>
           </form>
       </AuthenticationCard>
   </AppLayout>
</template>
