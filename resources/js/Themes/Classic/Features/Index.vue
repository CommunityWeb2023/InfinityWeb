<script setup>
import Classic from "@/Themes/Classic/Layout/Classic.vue";

const categorys = [
  {
    id: 1,
    name: 'QoL',
    color: 'bg-cerise'
  },
  {
    id: 2,
    name: 'Gameplay',
    color: 'bg-coral'
  },
  {
    id: 3,
    name: 'Economy',
    color: 'bg-mantis'
  },
  {
    id: 4,
    name: 'PvP',
    color: 'bg-robin-blue'
  },
  {
    id: 5,
    name: 'PvE',
    color: 'bg-cordovan'
  },
  {
    id: 6,
    name: 'Misc',
    color: 'bg-acri-magenta'
  },
]

// function to get the color of the category
function getCategoryColor(category) {
  return categorys.find((cat) => cat.name === category).color
}

const posts = [
  {
    id: 1,
    title: 'Some meaningful Feature',
    description:
      'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
    imageUrl:
      'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80',
    categorys: ['QoL', 'Gameplay']
  },
  {
    id: 2,
    title: 'Some other meaningful Feature',
    description:
      'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
    imageUrl: 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80',
    categorys: ['PvE', 'PvP']
  },
  {
    id: 3,
    title: 'Some more meaningful Feature',
    description:
      'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
    imageUrl: 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80',
    categorys: ['Economy', 'Misc']
  },
  {
    id: 4,
    title: 'The most significant Feature',
    description:
      'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
    imageUrl: 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80',
    categorys: ['QoL', 'Gameplay']
  },
  {
    id: 5,
    title: 'The even significanter Feature',
    description:
      'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
    imageUrl: 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80',
    categorys: ['Economy', 'Misc']
  },
]
</script>

<template>
  <Classic title="Features" :has-sidebar="false">
    <div class="mt-12">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Features</h2>
          <p class="mt-2 text-lg leading-8 text-gray-600">Have a look at our great and unique Features</p>
        </div>
        <div
          class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
          <article v-for="post in posts" :key="post.id"
            class="rounded-2xl bg-white shadow-md border border-gray-100">
            <img :src="post.imageUrl" alt=""
              class="aspect-[16/9] rounded-t-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]" />
            <div class="px-6 py-10">
              <div>
                <h3 class="text-xl font-semibold leading-4 text-gray-900">
                  {{ post.title }}
                </h3>
                <p class="mt-5 text-base leading-6 text-gray-600">{{ post.description }}</p>
              </div>
              <div class="relative mt-5 flex items-center gap-x-4">
                <span v-for="category in post.categorys" :key="category"
                  class="cursor-default rounded-full px-3 py-1.5 text-xs font-medium text-black"
                  :class="getCategoryColor(category)">
                  {{ category }}
                </span>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </Classic>
</template>
