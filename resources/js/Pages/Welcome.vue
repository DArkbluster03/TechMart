<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="relative min-h-screen bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <nav class="bg-white shadow-lg">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center space-x-2">
                        <img src="/images/techmart-logo.png" alt="TechMart Logo" class="h-12 w-auto">
                        <span class="font-extrabold text-yellow-500 text-xl">TechMart</span>
                    </div>
                    <div v-if="canLogin" class="hidden md:flex items-center space-x-3">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="py-2 px-3 text-gray-700 font-semibold hover:text-yellow-500 transition duration-300 border border-yellow-500 rounded-lg hover:bg-yellow-100"
                        >Dashboard</Link>
                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="py-2 px-3 text-gray-700 font-semibold hover:text-yellow-500 transition duration-300 border border-yellow-500 rounded-lg hover:bg-yellow-100"
                            >Log in</Link>
                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="py-2 px-3 text-gray-700 font-semibold hover:text-yellow-500 transition duration-300 border border-yellow-500 rounded-lg hover:bg-yellow-100"
                            >Register</Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>
        <div class="flex items-center justify-center h-screen bg-yellow-200">
            <div class="text-center p-8 rounded-lg animate-fade-in">
                <h1 class="text-6xl font-extrabold text-gray-800 mb-6 animate-fade-up">
                    <span class="bg-gradient-to-r from-yellow-500 to-orange-500 text-transparent bg-clip-text">Welcome to</span>
                    <span class="text-black drop-shadow-lg"> TechMart</span>
                </h1>
                <p class="text-2xl font-semibold text-gray-700 mb-8 italic animate-fade-up delay-100">Your one-stop destination for the latest <span class="text-yellow-600 font-bold">tech gadgets</span> and <span class="text-yellow-600 font-bold">accessories</span>.</p>
                <Link
                  :href="route('home')"
                    class="bg-yellow-500 text-black font-extrabold text-lg px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-600 transition duration-300 animate-bounce"
                >Shop Now</Link>
            </div>
        </div>
        <footer class="bg-white shadow-lg mt-12">
            <div class="max-w-6xl mx-auto px-4 py-6 flex justify-between items-center">
                <p class="text-gray-500">© 2025 TechMart. All rights reserved.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-blue-500">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-blue-500">Terms of Service</a>
                </div>
            </div>
        </footer>
    </div>
</template>

<style>
@keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fade-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fade-in 1s ease-out;
}

.animate-fade-up {
    animation: fade-up 1s ease-out;
}
</style>
