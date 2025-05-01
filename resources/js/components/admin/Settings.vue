<!-- help generate template settings admin -->
<template>
    <AppLayout>
        <div>
          <h1>Settings</h1>
          <form >
            <div>
              <label for="siteName">Site Name:</label>
              <input type="text" id="siteName" />
            </div>
            <div>
              <label for="siteUrl">Site URL:</label>
              <input type="text"  id="siteUrl" />
            </div>
            <button type="submit">Save Settings</button>
          </form>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from '../layouts/AppLayout.vue';
export default {
  name: 'Settings',
    components: {
        AppLayout,
    },
};
</script>
