<template>
    <AppLayout>
        <div class="flex items-center justify-center h-screen bg-gray-100">
            <h1 class="text-4xl font-bold text-gray-800">Welcome to the Admin Panel</h1>
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
