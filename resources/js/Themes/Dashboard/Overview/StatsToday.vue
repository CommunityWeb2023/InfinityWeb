<script lang="ts" setup>
import StatsBadge from "@/Themes/Dashboard/Overview/StatsBadge.vue";

// should probably be outsourced to their own components
defineProps({
  users_today: {
    type: Array as () => any[],
    required: false,
  },
  accounts_today: {
    type: Array as () => any[],
    required: false,
  },
  characters_today: {
    type: Array as () => any[],
    required: false,
  },
  votes_today: {
    type: Array as () => any[],
    required: false,
  },
  donations_today: {
    type: Array as () => any[],
    required: false,
  },
  send_donate_points_log_today: {
    type: Array as () => any[],
    required: false,
  },
  trade_logs_today: {
    type: Array as () => any[],
    required: false,
  },
})
</script>

<template>
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 my-5">
    <!-- Todays Stats -->
    <div class="mx-auto grid grid-cols-1 sm:grid-cols-3 gap-4 lg:grid-cols-3">
      <div class="col-span-2 bg-white border rounded-lg">
        <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
          <h2 class="font-semibold text-sm">
            Web Accounts today
          </h2>
          <StatsBadge>
            {{ users_today.length }}
          </StatsBadge>
        </div>
        <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">
          <div class="flex items-center justify-between py-2" v-for="user in users_today">
            <div>
              <div class="text-sm font-medium text-gray-900 flex items-center gap-2">
                {{ user.username }}
                <span
                  class="capitalize inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                  {{ user.first_role }}
                </span>
              </div>
              <div class="text-sm text-gray-500">
                {{ user.email }}
              </div>
            </div>
            <div>
              <div class="text-sm font-medium text-gray-900">
                vP: {{ user.votepoints }}
              </div>
              <div class="text-sm text-gray-500">
                dP: {{ user.donatepoints }}
              </div>
            </div>
            <div>
              <div class="text-sm font-medium text-gray-900">
                {{ user.created_at }}
              </div>
              <div class="text-sm text-gray-500">
                {{ user.last_login_ip }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-span-1 bg-white border rounded-lg">
        <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
          <h2 class="font-semibold text-sm">
            Accounts today
          </h2>
          <StatsBadge>
            0
          </StatsBadge>
        </div>
        <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

        </div>
      </div>
      <div class="col-span-1 bg-white border rounded-lg">
        <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
          <h2 class="font-semibold text-sm">
            Characters today
          </h2>
          <StatsBadge>
            0
          </StatsBadge>
        </div>
        <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

        </div>
      </div>
      <div class="col-span-1 bg-white border rounded-lg">
        <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
          <h2 class="font-semibold text-sm">
            Votes today
          </h2>
          <StatsBadge>
            0
          </StatsBadge>
        </div>
        <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

        </div>
      </div>
      <div class="col-span-1 bg-white border rounded-lg">
        <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
          <h2 class="font-semibold text-sm">
            Donations today
          </h2>
          <StatsBadge>
            0
          </StatsBadge>
        </div>
        <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

        </div>
      </div>
      <div class="col-span-1 bg-white border rounded-lg">
        <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
          <h2 class="font-semibold text-sm">
            Send Donate Points Log
          </h2>
          <StatsBadge>
            0
          </StatsBadge>
        </div>
        <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

        </div>
      </div>
      <div class="col-span-2 bg-white border rounded-lg">
        <div class="py-3 px-5 border-b border-dashed flex items-center justify-between">
          <h2 class="font-semibold text-sm">
            Trade Logs Today
          </h2>
          <StatsBadge>
            0
          </StatsBadge>
        </div>
        <div class="p-4 h-56 overflow-x-scroll divide-y divide-gray-200 divide-dashed">

        </div>
      </div>
    </div>
  </div>
</template>
