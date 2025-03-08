<script setup>
import { Link, router } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import Hero from './Layouts/Hero.vue';
import Products from '../User/Components/Products.vue';

defineProps({
    products: Array
});
</script>

<template>
    <UserLayouts>
        <Hero />
        <div class="relative min-h-screen bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">List of products</h2>
                <Products :products="products"></Products>
                <div class="flex justify-center mt-5">
                    <Link :href="route('products.index')"
                        class="bg-yellow-500 text-black font-extrabold text-lg px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-600 transition duration-300 animate-bounce">
                        View All Products
                    </Link>
                </div>
            </div>
        </div>
    </UserLayouts>
</template>
