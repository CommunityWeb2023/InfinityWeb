<script>
import Classic from "@/Themes/Classic/Layout/Classic.vue";
import Profile from "@/Themes/Classic/Profile/Components/Profile.vue";

export default {
    name: "Index",
    components: {Profile, Classic},
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

        <Profile />
    </Classic>
</template>

<style scoped>

</style>