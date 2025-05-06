<template>
    <AppLayout>
      <div class="flex flex-col items-center justify-center max-h-screen bg-gray-100 dark:bg-gray-900 py-8">
        <!-- Title Section -->
        <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-8">Welcome to the Admin Panel</h1>

        <!-- Statistics Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl">
          <!-- Website Views Card -->
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
            <div class="text-3xl text-indigo-600 dark:text-indigo-400 mb-4">
              <i class="fas fa-eye"></i> <!-- Icon -->
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Website Views</h2>
            <p class="text-xl text-gray-500 dark:text-gray-400">1,245</p> <!-- Static data, replace with dynamic data -->
          </div>

          <!-- Projects Card -->
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
            <div class="text-3xl text-green-600 dark:text-green-400 mb-4">
              <i class="fas fa-project-diagram"></i> <!-- Icon -->
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Projects</h2>
            <p class="text-xl text-gray-500 dark:text-gray-400">12</p> <!-- Static data, replace with dynamic data -->
          </div>

          <!-- Users Card -->
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
            <div class="text-3xl text-blue-600 dark:text-blue-400 mb-4">
              <i class="fas fa-users"></i> <!-- Icon -->
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Users</h2>
            <p class="text-xl text-gray-500 dark:text-gray-400">562</p> <!-- Static data, replace with dynamic data -->
          </div>

          <!-- Comments Card -->
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
            <div class="text-3xl text-yellow-600 dark:text-yellow-400 mb-4">
              <i class="fas fa-comments"></i> <!-- Icon -->
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Comments</h2>
            <p class="text-xl text-gray-500 dark:text-gray-400">345</p> <!-- Static data, replace with dynamic data -->
          </div>

          <!-- Other Stats Card (e.g., Revenue, Sales, etc.) -->
          <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
            <div class="text-3xl text-purple-600 dark:text-purple-400 mb-4">
              <i class="fas fa-dollar-sign"></i> <!-- Icon -->
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Revenue</h2>
            <p class="text-xl text-gray-500 dark:text-gray-400">$4,230</p> <!-- Static data, replace with dynamic data -->
          </div>
        </div>
      </div>
    </AppLayout>
  </template>

  <script>
  import AppLayout from '../layouts/AppLayout.vue';

  export default {
    name: 'Dashboard',
    components: {
      AppLayout,
    },
  };
  </script>
