<script>
import Classic from "@/Themes/Classic/Layout/Classic.vue";
import Profile from "@/Themes/Classic/Profile/Components/Profile.vue";
import LogoutOtherBrowserSessionsForm from "@/Themes/Classic/Profile/Components/LogoutOtherBrowserSessionsForm.vue";
import TwoFactorAuthenticationForm from "@/Themes/Classic/Profile/Components/TwoFactorAuthenticationForm.vue";
import UpdatePasswordForm from "@/Themes/Classic/Profile/Components/UpdatePasswordForm.vue";
import {BanknotesIcon, CircleStackIcon, PlusCircleIcon} from "@heroicons/vue/24/outline/index.js";
import CreateAccountModal from "@/Themes/Classic/Profile/Components/CreateAccountModal.vue";

export default {
    name: "Index",
    components: {
        CreateAccountModal,
        CircleStackIcon,
        BanknotesIcon,
        UpdatePasswordForm, TwoFactorAuthenticationForm, LogoutOtherBrowserSessionsForm, Profile, Classic,
        PlusCircleIcon
    },
    props:{
        confirmsTwoFactorAuthentication: {
            type: Boolean,
            default: false
        },
        sessions: {
            type: Array,
            default: () => []
        },
        accounts: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            showCreateAccountModal: false,
        }
    },
}
</script>

<template>
    <Classic title="Profile" :hasSidebar="true">

        <div class="my-10">
            <div class="bg-white rounded-lg p-4 shadow-md">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <img class="inline-block h-24 w-24 object-cover rounded-full" :src="$page.props.auth.user.profile_photo_url" alt="" />
                        <div>
                            <h2 class="font-semibold text-xl">{{ $page.props.auth.user.username }}</h2>
                            <p>
                                {{ $page.props.auth.user.email }}
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between gap-4">
                            <div class="drop-shadow-md border rounded-lg p-3 flex items-center justify-center w-24 text-xs gap-2">
                                <CircleStackIcon class="h-4 w-4" />
                                {{ this.$page.props.auth.user.votepoints }}
                            </div>
                            <div class="drop-shadow-md border rounded-lg p-3 flex items-center justify-center w-24 text-xs gap-2">
                                <BanknotesIcon class="h-4 w-4" />
                                {{ this.$page.props.auth.user.donatepoints }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" items-center justify-end gap-4 hidden">
                    <button  type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        Create Account
                    </button>
                    <button type="button" class="rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        Add existing Account
                    </button>
                </div>
            </div>
        </div>

        <div class="my-10">
            <div class="bg-white rounded-lg p-4 shadow-md">
                <h2 class="text-xl font-semibold">Accounts</h2>

                <div class="my-5 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    <div class="border border-gray-300 p-4 rounded-lg h-44 overflow-x-scroll text-xs" v-for="account in accounts">
                        <div class="flex justify-between items-center border-b border-dashed pb-2 font-semibold mb-2">
                            <div class="capitalize text-sm">{{ account.account }}</div>
                            <div class="rounded-full !text-xs h-5 w-5 flex items-center justify-center bg-blue-500 text-white">
                                {{ account.characters.length }}
                            </div>
                        </div>
                        <div class="flex justify-between items-center" v-for="character in account.characters">
                            <div class="capitalize text-sm">{{ character.m_szName }}</div>
                            <div class="">
                                lvl. {{ character.m_nLevel }}
                            </div>
                        </div>

                    </div>
                    <button @click="showCreateAccountModal = true" type="button" class="h-44 relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <PlusCircleIcon class="mx-auto h-12 w-12 text-gray-400" />
                        <span class="mt-2 block text-sm font-semibold text-gray-900">
                            Create Account
                        </span>
                    </button>
                </div>
            </div>
        </div>

       <div class="space-y-10">
           <Profile />

           <UpdatePasswordForm class="mt-10 sm:mt-0" v-if="!$page.props.maintenance" />

           <LogoutOtherBrowserSessionsForm :sessions="sessions" v-if="sessions.length > 0 && !$page.props.maintenance" />

           <TwoFactorAuthenticationForm
               :requires-confirmation="confirmsTwoFactorAuthentication" v-if="!$page.props.maintenance"
               class="mt-10 sm:mt-0"
           />
       </div>


        <CreateAccountModal v-if="showCreateAccountModal" @close="showCreateAccountModal = false" />

    </Classic>
</template>

<style scoped>

</style>