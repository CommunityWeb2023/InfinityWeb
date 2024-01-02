<script>
import Classic from "@/Themes/Classic/Layout/Classic.vue";

export default {
    name: "Index",
    components: { Classic },
    data() {
        return {
            faqs: [
                {
                    id: 1,
                    question: "What's the best thing about Switzerland?",
                    answer:
                        "I don't know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 2,
                    question: "What do you call someone with no body and no nose?",
                    answer: "Nobody knows. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 3,
                    question: "Why do you never see elephants hiding in trees?",
                    answer: "Because they're so good at it. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 4,
                    question: "What do you call a deer with no eyes?",
                    answer: "No idea. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 5,
                    question: "Why can't you hear a pterodactyl go to the bathroom?",
                    answer: "Because the pee is silent. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 6,
                    question: "Why did the invisible man turn down the job offer?",
                    answer: "He couldn't see himself doing it. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 7,
                    question: "Why did the scarecrow win an award?",
                    answer: "Because he was outstanding in his field. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 8,
                    question: "What do you call a cow with two legs?",
                    answer: "Lean beef. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 9,
                    question: "What do you call a cow with no legs?",
                    answer: "Ground beef. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
                {
                    id: 10,
                    question: "Why did the cookie cry?",
                    answer: "Because his father was a wafer so long. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.",
                },
            ]
        }
    }
}
</script>

<template>
    <Classic title="FAQ" :has-sidebar="false">
        <div class="bg-white">
            <div class="mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:px-8">
                <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Frequently asked questions</h2>
                <p class="mt-6 max-w-2xl text-base leading-7 text-gray-600">Have a different question and can’t find the
                    answer you’re looking for? Reach out to our support team by <a href="#"
                        class="font-semibold text-indigo-600 hover:text-indigo-500">sending us an email</a> and we’ll get
                    back to you as soon as we can.</p>
                <div class="mt-20">
                    <dl class="space-y-16 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-16 sm:space-y-0 lg:gap-x-10">
                        <div v-for="faq in faqs" :key="faq.id">
                            <dt class="text-base font-semibold leading-7 text-gray-900">{{ faq.question }}</dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">{{ faq.answer }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </Classic>
</template>

<style scoped>
</style>
