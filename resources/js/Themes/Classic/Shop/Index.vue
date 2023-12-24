<script>
import {
    ClockIcon,
    FolderIcon,
    CircleStackIcon,
    BanknotesIcon,
    QueueListIcon,
    Squares2X2Icon,
    XCircleIcon,
    CheckCircleIcon,
} from "@heroicons/vue/24/outline/index.js";
import {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
    Popover, PopoverButton, PopoverPanel
} from '@headlessui/vue'
import { XMarkIcon } from '@heroicons/vue/24/outline'
import { ChevronDownIcon, FunnelIcon, MinusIcon, PlusIcon } from '@heroicons/vue/20/solid'
import Paginate from "@/Components/Global/Paginate.vue";
import ItemCard from "@/Themes/Classic/Shop/Components/ItemCard.vue";
import CartItem from "@/Themes/Classic/Shop/Components/CartItem.vue";
import Classic from "@/Themes/Classic/Layout/Classic.vue";
export default {
    name: "Index",
    components: {
        Classic,
        CartItem,
        ItemCard,
        Paginate,
        FolderIcon, ClockIcon, CircleStackIcon, BanknotesIcon, QueueListIcon, Squares2X2Icon,
        ChevronDownIcon, FunnelIcon, MinusIcon, PlusIcon, XMarkIcon, XCircleIcon, CheckCircleIcon,
        Dialog,
        DialogPanel,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,Popover, PopoverButton, PopoverPanel,
    },
    props: ['categories', 'items', 'cartItems'],
    data() {
        return {
            showAsGrid: true,
            showAsList: false,
            notEnoughVotePointsMessage: '',
            notEnoughDonatePointsMessage: '',
            currencies: [
                {
                    id: 1,
                    name: 'Vote Points',
                    checked: false,
                },
                {
                    id: 2,
                    name: 'Donate Points',
                    checked: false,
                },
            ],
        }
    },
    methods: {
        toggleShowAsGrid() {
            this.showAsGrid = true;
            this.showAsList = false;
        },
        toggleShowAsList() {
            this.showAsGrid = false;
            this.showAsList = true;
        },
        resetFilter() {
            this.categories.forEach(category => {
                category.checked = false;
            });
            this.currencies.forEach(currency => {
                currency.checked = false;
            });
        },
    },
    computed: {
        filteredItems() {
            // Ausgewählte Kategorien IDs ermitteln
            const selectedCategoryIds = this.categories.filter(c => c.checked).map(c => c.id);

            // Ausgewählte Währungen IDs ermitteln
            const selectedCurrencyIds = this.currencies.filter(c => c.checked).map(c => c.id);

            return this.items.data.filter(item => {
                // Kategoriefilter
                const categoryMatch = selectedCategoryIds.length === 0 || item.categories.some(category => selectedCategoryIds.includes(category.id));

                // Währungsfilter
                let currencyMatch = true;
                if (selectedCurrencyIds.length > 0) {
                    currencyMatch = false;
                    if (selectedCurrencyIds.includes(1) && item.vote_points > 0) {
                        currencyMatch = true;
                    }
                    if (selectedCurrencyIds.includes(2) && item.donate_points > 0) {
                        currencyMatch = true;
                    }
                }

                return categoryMatch && currencyMatch;
            });
        },
        cartCosts() {
            let costs = {
                vote_points: 0,
                donate_points: 0
            };
            this.cartItems.forEach(item => {
                costs.vote_points += item.shop_item.vote_points * item.quantity;
                costs.donate_points += item.shop_item.donate_points * item.quantity;
            });

            if(this.$page.props.auth.user.votepoints < costs.vote_points) {
                this.notEnoughVotePointsMessage = `You need ${costs.vote_points - this.$page.props.auth.user.votepoints} more Vote Points.`;
            } else {
                this.notEnoughVotePointsMessage = '';
            }

            if(this.$page.props.auth.user.donatepoints < costs.donate_points) {
                this.notEnoughDonatePointsMessage = `You need ${costs.donate_points - this.$page.props.auth.user.donatepoints} more Donate Points.`;
            } else {
                this.notEnoughDonatePointsMessage = '';
            }

            return costs;
        },
    }

}
</script>

<template>
    <Classic :has-sidebar="false" title="Shop">

        <div class="grid grid-col-1 md:grid-cols-2 xl:grid-cols-5 grid-rows-1 gap-4">
            <div class="sm:col-span-5 md:col-span-1">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="mb-3 text-sm font-semibold flex justify-between items-center">
                        <h2>Welcome, {{ this.$page.props.auth.user.username }}!</h2>

                        <div class="max-w-sm px-4">
                            <Popover v-slot="{ open }" class="relative">
                                <PopoverButton
                                    class="group">
                                    <FunnelIcon class="h-5 w-5" />
                                </PopoverButton>

                                <transition
                                    enter-active-class="transition duration-200 ease-out"
                                    enter-from-class="translate-y-1 opacity-0"
                                    enter-to-class="translate-y-0 opacity-100"
                                    leave-active-class="transition duration-150 ease-in"
                                    leave-from-class="translate-y-0 opacity-100"
                                    leave-to-class="translate-y-1 opacity-0">
                                    <PopoverPanel class="absolute left-1/2 z-10 mt-3 w-56 -translate-x-1/2 transform px-4 sm:px-0 lg:max-w-3xl">
                                        <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black/5">
                                            <div class="relative bg-white p-6">
                                                <div class="my-5">
                                                    <h3 class="font-semibold text-sm mb-3">Currency</h3>

                                                    <div class="space-y-2">
                                                        <div class="relative flex items-start" v-for="currency in currencies">
                                                            <div class="flex h-6 items-center">
                                                                <input :id="'currency' + currency.id" v-model="currency.checked" aria-describedby="comments-description" :name="'currency' + currency.id" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600" />
                                                            </div>
                                                            <div class="ml-3 text-sm leading-6">
                                                                <label :for="'currency' + currency.id" class="font-medium text-gray-900">
                                                                    {{ currency.name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="my-5">
                                                    <h3 class="font-semibold text-sm mb-3">Category</h3>

                                                    <div class="space-y-2">
                                                        <div class="relative flex items-start" v-for="category in categories">
                                                            <div class="flex h-6 items-center">
                                                                <input :id="'category' + category.id" v-model="category.checked" aria-describedby="comments-description" :name="'category' + category.id" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600" />
                                                            </div>
                                                            <div class="ml-3 text-sm leading-6">
                                                                <label :for="'category' + category.id" class="font-medium text-gray-900">
                                                                    {{ category.name }}
                                                                </label>
                                                                <p id="comments-description" class="text-gray-500">
                                                                    {{ category.description }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 p-4 flex items-center justify-center">
                                                <button @click="resetFilter" type="button" class="rounded bg-red-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                                    Reset Filter
                                                </button>
                                            </div>
                                        </div>
                                    </PopoverPanel>
                                </transition>
                            </Popover>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="drop-shadow-md border rounded-lg p-3 flex items-center justify-center w-24 text-xs gap-2">
                            <CircleStackIcon class="h-4 w-4" />
                            {{ this.$page.props.auth.user.votepoints }}
                        </div>
                        <div class="drop-shadow-md border rounded-lg p-3 flex items-center justify-center w-24 text-xs gap-2">
                            <BanknotesIcon class="h-4 w-4" />
                            {{ this.$page.props.auth.user.donatepoints }}
                        </div>
                    </div>




                    <div class="my-5">
                        <h3 class="font-semibold text-sm mb-3">Cart</h3>

                        <div v-if="cartItems.length > 0">
                            <div v-for="item in cartItems" class="my-2 cursor-pointer">
                                <CartItem :item="item" />
                            </div>
                            <div class="text-xs text-center flex items-center gap-2 justify-end border-t py-3">
                                <div class="flex items-center gap-1">
                                    <CircleStackIcon class="h-4 w-4" /> {{ cartCosts.vote_points }}
                                </div>
                                <div class="flex items-center gap-1">
                                    <BanknotesIcon class="h-4 w-4" /> {{ cartCosts.donate_points }}
                                </div>
                            </div>

                            <div v-if="notEnoughVotePointsMessage || notEnoughDonatePointsMessage" class="text-xs text-center text-red-600">
                                <div v-if="notEnoughVotePointsMessage">{{ notEnoughVotePointsMessage }}</div>
                                <div v-if="notEnoughDonatePointsMessage">{{ notEnoughDonatePointsMessage }}</div>
                            </div>

                            <div class="flex items-center justify-center mt-4">
                                 <button
                                     :disabled="$page.props.auth.user.votepoints >= cartCosts.vote_points && $page.props.auth.user.donatepoints >= cartCosts.donate_points"
                                     type="button"
                                     :class="$page.props.auth.user.votepoints >= cartCosts.vote_points && $page.props.auth.user.donatepoints >= cartCosts.donate_points ? 'bg-blue-600 hover:bg-blue-500' : 'bg-gray-400 cursor-not-allowed hover:bg-gray-600'"
                                     class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                     Complete purchase
                                </button>
                            </div>
                        </div>
                        <div v-else>
                            <div class="text-sm text-gray-500">
                                Your cart is empty.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-4">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 h-96">
                    <div v-for="item in filteredItems">
                        <ItemCard :item="item" />
                    </div>
                </div>
                <div v-if="items.links.length > 3" class="mt-5 bg-white p-4 rounded-lg shadow-md flex items-center justify-center">
                    <Paginate :links="items.links" />
                </div>
            </div>
        </div>
    </Classic>
</template>

<style>
    ul {
        margin-left: 1rem;
        list-style: square;
    }
</style>