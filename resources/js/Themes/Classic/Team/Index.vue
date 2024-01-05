<script setup>
import Classic from "@/Themes/Classic/Layout/Classic.vue";

// config options
// showOnlineStatus: true/false (per person)
const COLOREDNAMES = true; 

const hasColoredNames = (person) => {
    if (person) {
        return COLOREDNAMES ? [colors[person.role]] : 'text-gray-600';
    }
    return 'text-gray-600';
};

const Team = [
    {
        name: 'Whitney Francis',
        role: 'Administrator',
        image:
            'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80',
        description: 'things that Administrator do',
        online: false,
        showOnlineStatus: true,
    },
    {
        name: 'Courtney Henry',
        role: 'GameMaster',
        image:
            'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80',
        description: 'things that GameMaster do',
        online: true,
        showOnlineStatus: true,
    },
    {
        name: 'Kristin Watson',
        role: 'Support',
        image:
            'https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80',
        description: 'Supporter does supporting things',
        online: true,
        showOnlineStatus: false,
    },
    {
        name: 'Emily Selman',
        role: 'Developer',
        image:
            'https://images.unsplash.com/photo-1509783236416-c9ad59bae472?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80',
        description: 'Developer develops things',
        online: false,
        showOnlineStatus: true,
    },
]

const colors = {
    Administrator: 'text-cerise',
    GameMaster: 'text-coral',
    Support: 'text-mantis',
    Developer: 'text-robin-blue',
}

const onlineColors = {
    true: 'border-green-500',
    false: 'border-gray-300',
}
</script>

<template>
    <Classic title="Team">
        <div class="mt-12">
            <div class="mx-auto max-w-7xl px-6 text-center lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Meet our team</h2>
                    <p class="mt-4 text-lg leading-8 text-gray-600">We’re a dynamic group of individuals who are passionate
                        about what we do.</p>
                </div>
                <ul role="list"
                    class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <li v-for="person in Team" :key="person.name" class="rounded-2xl bg-white shadow-md border border-gray-100 px-6 py-10">
                        <img class="mx-auto h-56 w-56 rounded-full border-[6px]" :src="person.image" :class="{[onlineColors[person.online.toString()]]: person.showOnlineStatus }" alt="" />
                        <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-gray-900">{{ person.name }}</h3>
                        <p class="text-sm leading-6" :class="hasColoredNames(person)">{{ person.role }}</p>
                        <p class="mt-2 text-sm leading-6 text-gray-600">{{ person.description }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </Classic>
</template>
