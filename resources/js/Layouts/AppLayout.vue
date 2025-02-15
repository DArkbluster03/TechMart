<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const showingMenu = ref(false);
const dropdownRef = ref(null);

function toggleMenu() {
  showingMenu.value = !showingMenu.value;
}

function handleClickOutside(event) {
  if (!dropdownRef.value) return;

  if (!dropdownRef.value.contains(event.target)) {
    showingMenu.value = false;
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});
</script>

<template>
  <div class="min-h-screen bg-gray-100">
    <nav class="bg-white border-b border-gray-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
        <div>
          <a href="/" class="font-bold text-lg text-gray-800 hover:text-gray-900">
            TechMart
          </a>
        </div>

        <div class="flex items-center space-x-4">
          <template v-if="page.props.auth.user">
            <div class="relative" ref="dropdownRef">
              <button
                @click.stop="toggleMenu"
                class="inline-flex items-center text-gray-700 hover:text-gray-900 focus:outline-none"
              >
                {{ page.props.auth.user.name }}
                <svg
                  class="ml-1 h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 13.414l3.293-3.293a1 1 0 
                       011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 
                       010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
              <div
                v-if="showingMenu"
                class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-md z-50"
                @click.stop
              >
                <form
                  method="POST"
                  :action="route('logout')"
                  class="block w-full text-left"
                >
                  <input type="hidden" name="_token" :value="page.props.csrfToken" />
                  <button
                    type="submit"
                    class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                  >
                    Logout
                  </button>
                </form>
              </div>
            </div>
          </template>

          <template v-else>
            <a :href="route('login')" class="text-gray-700 hover:text-gray-900">
              Login
            </a>
            <a :href="route('register')" class="text-gray-700 hover:text-gray-900">
              Register
            </a>
          </template>
        </div>
      </div>
    </nav>

    <main class="p-6">
      <slot />
    </main>
  </div>
</template>