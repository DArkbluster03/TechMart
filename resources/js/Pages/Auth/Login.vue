<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

function submit() {
  form.post(route('login'));
}
</script>

<template>
  <AppLayout>
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
      <h2 class="text-xl font-bold mb-4">Login</h2>

      <div v-if="form.errors.email" class="text-red-600">{{ form.errors.email }}</div>
      <div v-if="form.errors.password" class="text-red-600">{{ form.errors.password }}</div>

      <form @submit.prevent="submit">
        <div class="mb-4">
          <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
          <input
            id="email"
            type="email"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            v-model="form.email"
            required
          />
        </div>

        <div class="mb-4">
          <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
          <input
            id="password"
            type="password"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            v-model="form.password"
            required
          />
        </div>

        <div class="mb-4 flex items-center">
          <input
            type="checkbox"
            v-model="form.remember"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
          />
          <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </div>

        <button
          type="submit"
          class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500"
          :disabled="form.processing"
        >
          Log in
        </button>
      </form>
    </div>
  </AppLayout>
</template>