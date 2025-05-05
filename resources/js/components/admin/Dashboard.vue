<template>
    <AppLayout>
        <div class="flex items-center justify-center max-h-screen bg-gray-100 dark:bg-gray-900">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200">Welcome to the Admin Panel</h1>
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
