<script setup>
import UserLayouts from './Layouts/UserLayouts.vue';
import { ref, watch } from 'vue'
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
} from '@headlessui/vue'
import { XMarkIcon } from '@heroicons/vue/24/outline'
import { ChevronDownIcon, FunnelIcon, MinusIcon, PlusIcon, Squares2X2Icon } from '@heroicons/vue/20/solid'
import Products from '../User/Components/Products.vue'
import SecondaryButtonVue from '@/Components/SecondaryButton.vue';
import { router, useForm } from '@inertiajs/vue3';

// Sort options for the dropdown
const sortOptions = [
  { name: 'Most Popular', href: '#', current: true },
  { name: 'Best Rating', href: '#', current: false },
  { name: 'Newest', href: '#', current: false },
  { name: 'Price: Low to High', href: '#', current: false },
  { name: 'Price: High to Low', href: '#', current: false },
];

// Price filter form with default values
const filterPrices = useForm({
  prices: [0, 100000]
});
const priceFilter = () => {
  filterPrices.transform((data) => ({
    ...data,
    prices: {
      from: filterPrices.prices[0],
      to: filterPrices.prices[1],
    }
  })).get('products', {
    preserveState: true,
    replace: true,
  });
};

const mobileFiltersOpen = ref(false);
const props = defineProps({
  products: Array,
  brands: Array,
  categories: Array
});

// Filter brands and categories 
const selectedBrands = ref([]);
const selectedCategories = ref([]);

watch(selectedBrands, () => {
  updateFilteredProducts();
});
watch(selectedCategories, () => {
  updateFilteredProducts();
});
function updateFilteredProducts() {
  router.get('products', {
    brands: selectedBrands.value,
    categories: selectedCategories.value,
  }, {
    preserveState: true,
    replace: true,
  });
}

// Search functionality: reactive variable for the search term (by title)
const searchTerm = ref('');
function searchProducts() {
  router.get('products', {
    title: searchTerm.value,
    brands: selectedBrands.value,
    categories: selectedCategories.value,
  }, {
    preserveState: true,
    replace: true,
  });
}

// Reset function to clear all filters and load the initial state
function resetFilters() {
  searchTerm.value = '';
  selectedBrands.value = [];
  selectedCategories.value = [];
  filterPrices.prices = [0, 100000];

  // Reload the initial products list (no filters)
  router.get('products', {}, {
    preserveState: true,
    replace: true,
  });
}
</script>

<template>
  <UserLayouts>
    <div class="bg-white">
      <div>
        <!-- Mobile filter dialog -->
        <TransitionRoot as="template" :show="mobileFiltersOpen">
          <Dialog as="div" class="relative z-40 lg:hidden" @close="mobileFiltersOpen = false">
            <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
              enter-from="opacity-0" enter-to="opacity-100"
              leave="transition-opacity ease-linear duration-300" leave-from="opacity-100"
              leave-to="opacity-0">
              <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>
            <div class="fixed inset-0 z-40 flex">
              <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                enter-from="translate-x-full" enter-to="translate-x-0"
                leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                leave-to="translate-x-full">
                <DialogPanel
                  class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                  <div class="flex items-center justify-between px-4">
                    <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                    <button type="button"
                      class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400"
                      @click="mobileFiltersOpen = false">
                      <span class="sr-only">Close menu</span>
                      <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                    </button>
                  </div>
                  <!-- Mobile Filters (example: categories, etc.) -->
                  <form class="mt-4 border-t border-gray-200">
                    <!-- Example static list of sub-categories if needed -->
                    <h3 class="sr-only">Categories</h3>
                    <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                      <li v-for="category in categories" :key="category.id">
                        <a :href="`#category-${category.id}`" class="block px-2 py-3">{{ category.name }}</a>
                      </li>
                    </ul>
                    <!-- Additional filters can be placed here -->
                  </form>
                </DialogPanel>
              </TransitionChild>
            </div>
          </Dialog>
        </TransitionRoot>

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>
            <div class="flex items-center space-x-4">
              <!-- Sort Dropdown -->
              <Menu as="div" class="relative inline-block text-left">
                <div>
                  <MenuButton
                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                    Sort
                    <ChevronDownIcon
                      class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                      aria-hidden="true" />
                  </MenuButton>
                </div>
                <transition enter-active-class="transition ease-out duration-100"
                  enter-from-class="transform opacity-0 scale-95"
                  enter-to-class="transform opacity-100 scale-100"
                  leave-active-class="transition ease-in duration-75"
                  leave-from-class="transform opacity-100 scale-100"
                  leave-to-class="transform opacity-0 scale-95">
                  <MenuItems
                    class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1">
                      <MenuItem v-for="option in sortOptions" :key="option.name" v-slot="{ active }">
                        <a :href="option.href"
                           :class="[option.current ? 'font-medium text-gray-900' : 'text-gray-500', active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm']">
                          {{ option.name }}
                        </a>
                      </MenuItem>
                    </div>
                  </MenuItems>
                </transition>
              </Menu>

              <!-- Search Input, Search Button, and Reset Button -->
              <div class="flex items-center space-x-2">
                <input type="text" v-model="searchTerm" placeholder="Search products"
                  class="w-48 rounded-md border border-gray-300 p-2 text-sm focus:outline-none focus:border-primary-500" />
                <button @click="searchProducts"
                  class="rounded-md bg-blue-500 px-3 py-2 text-sm text-white hover:bg-blue-600">
                  Search
                </button>
                <button @click="resetFilters"
                  class="rounded-md bg-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-400">
                  Reset
                </button>
              </div>

              <!-- Other Buttons -->
              <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                <span class="sr-only">View grid</span>
                <Squares2X2Icon class="h-5 w-5" aria-hidden="true" />
              </button>
              <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden"
                      @click="mobileFiltersOpen = true">
                <span class="sr-only">Filters</span>
                <FunnelIcon class="h-5 w-5" aria-hidden="true" />
              </button>
            </div>
          </div>

          <section aria-labelledby="products-heading" class="pb-24 pt-6">
            <h2 id="products-heading" class="sr-only">Products</h2>
            <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
              <!-- Desktop Filters -->
              <form class="hidden lg:block">
                <h3 class="sr-only">Prices</h3>
                <!-- Price Filter -->
                <div class="flex items-center justify-between space-x-3">
                  <div class="basis-1/3">
                    <label for="filters-price-from"
                           class="mb-2 block text-sm font-medium text-gray-900">
                      From
                    </label>
                    <input type="number" id="filters-price-from" placeholder="Min price"
                           v-model="filterPrices.prices[0]"
                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500" />
                  </div>
                  <div class="basis-1/3">
                    <label for="filters-price-to"
                           class="mb-2 block text-sm font-medium text-gray-900">
                      To
                    </label>
                    <input type="number" id="filters-price-to" v-model="filterPrices.prices[1]"
                           placeholder="Max price"
                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500" />
                  </div>
                  <SecondaryButtonVue class="self-end" @click="priceFilter()">
                    Ok
                  </SecondaryButtonVue>
                </div>

                <!-- Brands Filter -->
                <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                  <h3 class="-my-3 flow-root">
                    <DisclosureButton
                      class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                      <span class="font-medium text-gray-900">Brands</span>
                      <span class="ml-6 flex items-center">
                        <PlusIcon v-if="!open" class="h-5 w-5" aria-hidden="true" />
                        <MinusIcon v-else class="h-5 w-5" aria-hidden="true" />
                      </span>
                    </DisclosureButton>
                  </h3>
                  <DisclosurePanel class="pt-6">
                    <div class="space-y-4">
                      <div v-for="brand in brands" :key="brand.id" class="flex items-center">
                        <input :id="`filter-${brand.id}`" :value="brand.id" type="checkbox"
                               v-model="selectedBrands"
                               class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                        <label :for="`filter-${brand.id}`" class="ml-3 text-sm text-gray-600">
                          {{ brand.name }}
                        </label>
                      </div>
                    </div>
                  </DisclosurePanel>
                </Disclosure>

                <!-- Categories Filter -->
                <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
                  <h3 class="-my-3 flow-root">
                    <DisclosureButton
                      class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                      <span class="font-medium text-gray-900">Categories</span>
                      <span class="ml-6 flex items-center">
                        <PlusIcon v-if="!open" class="h-5 w-5" aria-hidden="true" />
                        <MinusIcon v-else class="h-5 w-5" aria-hidden="true" />
                      </span>
                    </DisclosureButton>
                  </h3>
                  <DisclosurePanel class="pt-6">
                    <div class="space-y-4">
                      <div v-for="category in categories" :key="category.id" class="flex items-center">
                        <input :id="`filter-${category.id}`" :value="category.id" type="checkbox"
                               v-model="selectedCategories"
                               class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                        <label :for="`filter-${category.id}`" class="ml-3 text-sm text-gray-600">
                          {{ category.name }}
                        </label>
                      </div>
                    </div>
                  </DisclosurePanel>
                </Disclosure>
              </form>

              <!-- Product Grid -->
              <div class="lg:col-span-3">
                <Products :products="products.data"></Products>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>
  </UserLayouts>
</template>
