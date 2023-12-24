<script>
export default {
    name: "Sidebar"
}
</script>

<template>
    <div class="bg-white rounded-lg shadow-md border border-gray-50 relative z-10">
        <div class="border-b border-gray-300 border-dashed py-2.5 px-4">
            <h2 class="font-semibold">
                Information
            </h2>
        </div>
        <div class="p-5 text-xs">
            <div class="divide divide-y-1">
                <div class="flex items-center justify-between px-2 py-2">
                    <div>Peak</div>
                    <div>0</div>
                </div>
                <div class="flex items-center justify-between px-2 py-2">
                    <div>Online</div>
                    <div>0</div>
                </div>
                <div class="flex items-center justify-between px-2 py-2">
                    <div>Status</div>
                    <div><span class="text-red-500">Offline</span></div>
                </div>
            </div>

            <span class="p-2"></span>

            <div class="divide divide-y-1">
                <div class="flex items-center justify-between px-2 py-2">
                    <div>EXP</div>
                    <div>{{ $page.props.exp }}x</div>
                </div>
                <div class="flex items-center justify-between px-2 py-2">
                    <div>PENYA</div>
                    <div>{{ $page.props.penya }}x</div>
                </div>
                <div class="flex items-center justify-between px-2 py-2">
                    <div>DROP</div>
                    <div>{{ $page.props.drop }}x</div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex justify-center gap-2">
        <a v-if="$page.props.social_media.discord" :href="$page.props.social_media.discord" target="_blank" class="-mt-3 hover:-mt-1 transition-all duration-300 cursor-pointer">
            <div class="h-10 w-10 rounded-full bg-blue-800 p-2 text-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" height="16" width="20" viewBox="0 0 640 512">
                    <path opacity="1" fill="#ffff" d="M524.5 69.8a1.5 1.5 0 0 0 -.8-.7A485.1 485.1 0 0 0 404.1 32a1.8 1.8 0 0 0 -1.9 .9 337.5 337.5 0 0 0 -14.9 30.6 447.8 447.8 0 0 0 -134.4 0 309.5 309.5 0 0 0 -15.1-30.6 1.9 1.9 0 0 0 -1.9-.9A483.7 483.7 0 0 0 116.1 69.1a1.7 1.7 0 0 0 -.8 .7C39.1 183.7 18.2 294.7 28.4 404.4a2 2 0 0 0 .8 1.4A487.7 487.7 0 0 0 176 479.9a1.9 1.9 0 0 0 2.1-.7A348.2 348.2 0 0 0 208.1 430.4a1.9 1.9 0 0 0 -1-2.6 321.2 321.2 0 0 1 -45.9-21.9 1.9 1.9 0 0 1 -.2-3.1c3.1-2.3 6.2-4.7 9.1-7.1a1.8 1.8 0 0 1 1.9-.3c96.2 43.9 200.4 43.9 295.5 0a1.8 1.8 0 0 1 1.9 .2c2.9 2.4 6 4.9 9.1 7.2a1.9 1.9 0 0 1 -.2 3.1 301.4 301.4 0 0 1 -45.9 21.8 1.9 1.9 0 0 0 -1 2.6 391.1 391.1 0 0 0 30 48.8 1.9 1.9 0 0 0 2.1 .7A486 486 0 0 0 610.7 405.7a1.9 1.9 0 0 0 .8-1.4C623.7 277.6 590.9 167.5 524.5 69.8zM222.5 337.6c-29 0-52.8-26.6-52.8-59.2S193.1 219.1 222.5 219.1c29.7 0 53.3 26.8 52.8 59.2C275.3 311 251.9 337.6 222.5 337.6zm195.4 0c-29 0-52.8-26.6-52.8-59.2S388.4 219.1 417.9 219.1c29.7 0 53.3 26.8 52.8 59.2C470.7 311 447.5 337.6 417.9 337.6z"/>
                </svg>
            </div>
        </a>
        <a v-if="$page.props.social_media.facebook" :href="$page.props.social_media.facebook" target="_blank" class="-mt-3 hover:-mt-1 transition-all duration-300 cursor-pointer">
            <div class="h-10 w-10 rounded-full bg-blue-600 p-2 text-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path fill="#ffff" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/>
                </svg>
            </div>
        </a>
        <a v-if="$page.props.social_media.instagram" :href="$page.props.social_media.instagram" target="_blank" class="-mt-3 hover:-mt-1 transition-all duration-300 cursor-pointer">
            <div class="h-10 w-10 rounded-full bg-pink-500 p-2 text-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                    <path fill="#ffff" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                </svg>
            </div>
        </a>
        <a v-if="$page.props.social_media.twitter" :href="$page.props.social_media.twitter" target="_blank" class="-mt-3 hover:-mt-1 transition-all duration-300 cursor-pointer">
            <div class="h-10 w-10 rounded-full bg-gray-900 p-2 text-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path fill="#ffff" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                </svg>
            </div>
        </a>
        <a v-if="$page.props.social_media.twitch" :href="$page.props.social_media.twitch" target="_blank" class="-mt-3 hover:-mt-1 transition-all duration-300 cursor-pointer">
            <div class="h-10 w-10 rounded-full bg-purple-600 p-2 text-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path fill="#ffff" d="M391.2 103.5H352.5v109.7h38.6zM285 103H246.4V212.8H285zM120.8 0 24.3 91.4V420.6H140.1V512l96.5-91.4h77.3L487.7 256V0zM449.1 237.8l-77.2 73.1H294.6l-67.6 64v-64H140.1V36.6H449.1z"/>
                </svg>
            </div>
        </a>
        <a v-if="$page.props.social_media.youtube" :href="$page.props.social_media.youtube" target="_blank" class="-mt-3 hover:-mt-1 transition-all duration-300 cursor-pointer">
            <div class="h-10 w-10 rounded-full bg-red-600 p-2 text-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                    <path fill="#ffff" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/>
                </svg>
            </div>
        </a>
    </div>
</template>

<style scoped>

</style>