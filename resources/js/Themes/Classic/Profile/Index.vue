<script>
import Classic from "@/Themes/Classic/Layout/Classic.vue";
import Profile from "@/Themes/Classic/Profile/Components/Profile.vue";
import LogoutOtherBrowserSessionsForm from "@/Themes/Classic/Profile/Components/LogoutOtherBrowserSessionsForm.vue";
import TwoFactorAuthenticationForm from "@/Themes/Classic/Profile/Components/TwoFactorAuthenticationForm.vue";
import UpdatePasswordForm from "@/Themes/Classic/Profile/Components/UpdatePasswordForm.vue";

export default {
    name: "Index",
    components: {UpdatePasswordForm, TwoFactorAuthenticationForm, LogoutOtherBrowserSessionsForm, Profile, Classic},
    props:{
        confirmsTwoFactorAuthentication: {
            type: Boolean,
            default: false
        },
        sessions: {
            type: Array,
            default: () => []
        },
    }
}
</script>

<template>
    <Classic title="Profile" :hasSidebar="true">

       <div class="space-y-10">
           <Profile />

           <UpdatePasswordForm class="mt-10 sm:mt-0" />

           <LogoutOtherBrowserSessionsForm :sessions="sessions" v-if="sessions.length > 0" />

           <TwoFactorAuthenticationForm
               :requires-confirmation="confirmsTwoFactorAuthentication"
               class="mt-10 sm:mt-0"
           />
       </div>

    </Classic>
</template>

<style scoped>

</style>