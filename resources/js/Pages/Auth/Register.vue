<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

function submit() {
  form.post(route('register')); 
}
</script>

<template>
  <AppLayout>
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
      <h2 class="text-xl font-bold mb-4">Register</h2>

      <div v-if="form.errors.name" class="text-red-600">{{ form.errors.name }}</div>
      <div v-if="form.errors.email" class="text-red-600">{{ form.errors.email }}</div>
      <div v-if="form.errors.password" class="text-red-600">{{ form.errors.password }}</div>

      <form @submit.prevent="submit">
        <div class="mb-4">
          <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
          <input
            id="name"
            type="text"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            v-model="form.name"
            required
          />
        </div>

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

        <div class="mb-4">
          <label for="password_confirmation" class="block font-medium text-sm text-gray-700">
            Confirm Password
          </label>
          <input
            id="password_confirmation"
            type="password"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            v-model="form.password_confirmation"
            required
          />
        </div>

        <button
          type="submit"
          class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500"
          :disabled="form.processing"
        >
          Register
        </button>
      </form>
    </div>
  </AppLayout>
</template>