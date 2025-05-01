
<template>
    <AppLayout>
        <div class="container mx-auto px-4 py-8">
      <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-semibold text-gray-800">Profile</h1>
        <p class="mt-4 text-gray-600">Update your profile information below.</p>

        <form class="mt-8 space-y-6" action="#" method="POST">
          <!-- Name -->
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" placeholder="Enter your name"
              class="mt-2 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Email -->
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" placeholder="Enter your email"
              class="mt-2 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Password -->
          <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" placeholder="Enter your password"
              class="mt-2 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Confirm Password -->
          <div class="mb-6">
            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" id="confirm_password" placeholder="Confirm your password"
              class="mt-2 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <!-- Submit Button -->
          <div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
              Update Profile
            </button>
          </div>
        </form>
      </div>
    </div>
    </AppLayout>
</template>
<script>
import AppLayout from '../Layouts/AppLayout.vue';
export default {
    name: 'Profile',
    components: {
        AppLayout,
    },
    data() {
        return {
            name: '',
            email: '',
            password: '',
            confirm_password: '',
        };
    },
    methods: {
        updateProfile() {
            // Logic to update the profile
        },
    },
};
</script>
